const dropZone = document.getElementById('dropZone');
const fileInput = document.getElementById('fileInput');
const controls = document.getElementById('controls');
const qualitySlider = document.getElementById('qualitySlider');
const qualityValue = document.getElementById('qualityValue');
const formatToggle = document.getElementById('formatToggle');
const resultsSection = document.getElementById('resultsSection');
const downloadAllSection = document.getElementById('downloadAllSection');
const downloadAllBtn = document.getElementById('downloadAllBtn');
const resetBtn = document.getElementById('resetBtn');
const totalSavedEl = document.getElementById('totalSaved');
const avgPercentEl = document.getElementById('avgPercent');
const fileCountEl = document.getElementById('fileCount');
const toast = document.getElementById('toast');

let items = []; // { id, file, img, originalSize, compressedBlob, compressedSize, url }
let currentFormat = 'image/jpeg';
let idCounter = 0;

// ---------- Helpers ----------
function formatBytes(bytes) {
  if (bytes < 1024) return bytes + ' B';
  if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
  return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
}

function extForFormat(format) {
  if (format === 'image/png') return 'png';
  if (format === 'image/webp') return 'webp';
  return 'jpg';
}

function showToast(msg) {
  toast.textContent = msg;
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 2200);
}

// ---------- Loading files ----------
function handleFiles(fileList) {
  const files = Array.from(fileList).filter(f => f.type.startsWith('image/'));
  if (files.length === 0) return;

  files.forEach(file => {
    const id = idCounter++;
    const reader = new FileReader();
    reader.onload = (e) => {
      const img = new Image();
      img.onload = () => {
        items.push({
          id,
          file,
          img,
          originalSize: file.size,
          compressedBlob: null,
          compressedSize: 0,
          url: null
        });
        controls.classList.remove('hidden');
        resultsSection.classList.remove('hidden');
        downloadAllSection.classList.remove('hidden');
        compressItem(id);
      };
      img.src = e.target.result;
    };
    reader.readAsDataURL(file);
  });
}

// ---------- Compression ----------
function compressItem(id) {
  const item = items.find(i => i.id === id);
  if (!item) return;

  const quality = qualitySlider.value / 100;
  const canvas = document.createElement('canvas');
  canvas.width = item.img.width;
  canvas.height = item.img.height;
  const ctx = canvas.getContext('2d');

  // PNG has no transparency loss concern here since we draw on transparent canvas by default
  if (currentFormat === 'image/jpeg') {
    ctx.fillStyle = '#FFFFFF';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
  }
  ctx.drawImage(item.img, 0, 0);

  canvas.toBlob((blob) => {
    if (!blob) return;
    if (item.url) URL.revokeObjectURL(item.url);
    item.compressedBlob = blob;
    item.compressedSize = blob.size;
    item.url = URL.createObjectURL(blob);
    renderResults();
  }, currentFormat, currentFormat === 'image/png' ? undefined : quality);
}

function compressAll() {
  items.forEach(item => compressItem(item.id));
}

// ---------- Rendering ----------
function renderResults() {
  resultsSection.innerHTML = '';

  let totalOriginal = 0;
  let totalCompressed = 0;
  let percentSum = 0;
  let readyCount = 0;

  items.forEach(item => {
    const card = document.createElement('div');
    card.className = 'result-card';

    const thumb = document.createElement('img');
    thumb.className = 'result-thumb';
    thumb.src = item.img.src;

    const info = document.createElement('div');
    info.className = 'result-info';

    const name = document.createElement('div');
    name.className = 'result-name';
    name.textContent = item.file.name;

    const sizes = document.createElement('div');
    sizes.className = 'result-sizes';

    if (item.compressedSize > 0) {
      const saved = item.originalSize - item.compressedSize;
      const percent = ((saved / item.originalSize) * 100).toFixed(0);

      sizes.innerHTML = `${formatBytes(item.originalSize)} <span class="arrow">→</span> <span class="new-size">${formatBytes(item.compressedSize)}</span>`;

      const badge = document.createElement('div');
      badge.className = 'result-badge';
      badge.textContent = saved > 0 ? `↓ ${percent}% smaller` : 'No reduction';

      info.appendChild(name);
      info.appendChild(sizes);
      info.appendChild(badge);

      totalOriginal += item.originalSize;
      totalCompressed += item.compressedSize;
      percentSum += parseFloat(percent);
      readyCount++;
    } else {
      sizes.textContent = `${formatBytes(item.originalSize)} — compressing…`;
      info.appendChild(name);
      info.appendChild(sizes);
    }

    const download = document.createElement('a');
    download.className = 'result-download';
    download.title = 'Download';
    download.innerHTML = '↓';
    if (item.url) {
      download.href = item.url;
      download.download = `compressed-${item.file.name.replace(/\.[^/.]+$/, '')}.${extForFormat(currentFormat)}`;
    } else {
      download.style.opacity = '0.4';
      download.style.pointerEvents = 'none';
    }

    card.appendChild(thumb);
    card.appendChild(info);
    card.appendChild(download);
    resultsSection.appendChild(card);
  });

  fileCountEl.textContent = items.length;
  totalSavedEl.textContent = formatBytes(Math.max(0, totalOriginal - totalCompressed));
  avgPercentEl.textContent = readyCount > 0 ? Math.round(percentSum / readyCount) + '%' : '0%';
}

// ---------- Events: drop zone ----------
dropZone.addEventListener('click', () => fileInput.click());

dropZone.addEventListener('dragover', (e) => {
  e.preventDefault();
  dropZone.classList.add('dragover');
});

dropZone.addEventListener('dragleave', () => {
  dropZone.classList.remove('dragover');
});

dropZone.addEventListener('drop', (e) => {
  e.preventDefault();
  dropZone.classList.remove('dragover');
  handleFiles(e.dataTransfer.files);
});

fileInput.addEventListener('change', (e) => {
  handleFiles(e.target.files);
});

// ---------- Events: quality ----------
qualitySlider.addEventListener('input', () => {
  qualityValue.textContent = qualitySlider.value;
  compressAll();
});

// ---------- Events: format toggle ----------
formatToggle.addEventListener('click', (e) => {
  const btn = e.target.closest('.format-btn');
  if (!btn) return;
  document.querySelectorAll('.format-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  currentFormat = btn.dataset.format;
  compressAll();
});

// ---------- Events: download all ----------
downloadAllBtn.addEventListener('click', () => {
  items.forEach((item, i) => {
    if (!item.url) return;
    setTimeout(() => {
      const a = document.createElement('a');
      a.href = item.url;
      a.download = `compressed-${item.file.name.replace(/\.[^/.]+$/, '')}.${extForFormat(currentFormat)}`;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
    }, i * 250);
  });
  showToast(`Downloading ${items.length} image${items.length > 1 ? 's' : ''}…`);
});

// ---------- Events: reset ----------
resetBtn.addEventListener('click', () => {
  items.forEach(item => { if (item.url) URL.revokeObjectURL(item.url); });
  items = [];
  fileInput.value = '';
  controls.classList.add('hidden');
  resultsSection.classList.add('hidden');
  downloadAllSection.classList.add('hidden');
  resultsSection.innerHTML = '';
});