<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        body {
            background: #f3f4f6;
            font-family: "Times New Roman", serif;
        }

        table.certificate {
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 1400px;
            height: 800px;
            margin: 30px auto;
            border: 3px solid #b8860b;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }

        h1 {
            color: brown;
            font-size: 28px;
        }

        .btn-download {
            display: inline-block;
            background-color: #00b894;
            color: white;
            font-size: 18px;
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .btn-download:hover {
            background-color: #00997a;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<!-- Download button -->
<center>
    <button class="btn-download" id="downloadBtn">Download Certificate</button>
</center>

<!-- Certificate area -->
<center>
    <div id="certificateArea">
        <table class="certificate" background="Screenshot 2024-06-11 204521.png">
            <tr><td><br>
                <center><img src="Screenshot 2024-06-09 182734.png" width="120" height="100"></center>
                <h1 align="center"><u>GOVERNMENT POLYTECHNIC AHMEDNAGAR</u></h1>
                <center>__________________________</center>
                <center><font size="4px">Burudgaon Road, Ahmednagar (M.S.)</font></center>

                <center>
                    <table>
                        <tr>
                            <td><img src="Screenshot 2024-06-09 152909.png" width="50" height="50"></td>
                            <td><center><font color="red" size="6px">CERTIFICATE</font></center></td>
                            <td><img src="Screenshot 2024-06-09 152909.png" width="50" height="50"></td>
                        </tr>
                    </table>
                </center>

                <p align="center">
                    <font size="4px">
                        This certificate is awarded to Mr./Miss./Mrs.
                        <b><?php echo $_GET['name']; ?></b> of <b>Second</b> Year 
                        <b><?php echo $_GET['branch']; ?></b> for obtaining 
                        <b><?php echo $_GET['position']; ?></b> position in 
                        <b><?php echo $_GET['wname']; ?></b> Paper Presentation<br>/Poster Presentation/Model Exhibition held during academic year 2024–2025.<br><br>
                        Date: <b><?php echo $_GET['date']; ?></b>
                    </font>
                </p>

                <center>
                    <font size="4px">
                        <img src="Screenshot 2024-06-09 201316.png" width="80" height="50"><br>
                        <font color="purple">Principal</font><br>
                        Government Polytechnic<br>Ahmednagar
                    </font>
                </center>
            </td></tr>
        </table>
    </div>
</center>

<!-- Script for download -->
<script>
    document.getElementById("downloadBtn").addEventListener("click", function() {
        const certificate = document.getElementById("certificateArea");
        html2canvas(certificate).then(canvas => {
            const link = document.createElement("a");
            link.download = "Certificate_<?php echo $_GET['name']; ?>.jpg";
            link.href = canvas.toDataURL("image/jpeg");
            link.click();
        });
    });
</script>

</body>
</html>
