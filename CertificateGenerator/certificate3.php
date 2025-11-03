<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <!-- html2canvas for downloading as image -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <style>
        body {
            background-color: #f8f8f8;
            font-family: "Times New Roman", serif;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
        }

        .certificate {
            background-image: url("cer_border3.jpeg");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 1350px;
            height: 700px;            
	    margin: 40px auto;
            border: 4px solid #d4af37;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.25);
            padding: 30px 50px;
        }

        .header {
            width: 100%;
            text-align: center;
        }

        .header img {
            vertical-align: middle;
        }

        .header-title {
            font-size: 26px;
            color: darkred;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .sub-header {
            font-size: 16px;
            color: #333;
        }

        .divider {
            width: 60%;
            margin: 5px auto;
            border-top: 2px solid #555;
        }

        .title-row {
            margin-top: 10px;
        }

        .certificate-title {
            color: orange;
            font-size: 40px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .content {
            font-size: 20px;
            line-height: 1.8;
            color: #000;
            text-align: center;
            margin: 40px 60px 30px 60px;
        }

        .footer {
            margin-top: 40px;
            width: 100%;
        }

        .footer td {
            vertical-align: top;
            text-align: center;
        }

        .date {
            font-size: 20px;
            text-align: left;
            padding-left: 50px;
        }

        .sign {
            text-align: center;
            font-size: 20px;
        }

        .sign img {
            width: 90px;
            height: 55px;
        }

        .principal-name {
            font-size: 22px;
            font-weight: bold;
            color: purple;
        }

        .college {
            font-size: 18px;
        }

        .stamp img {
            transform: translateY(-10px);
        }

        /* Download button styling */
        .btn-download {
            display: inline-block;
            background-color: #00b894;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            margin: 20px auto 0 auto;
        }

        .btn-download:hover {
            background-color: #00997a;
            transform: scale(1.05);
        }

        .button-container {
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Download Button -->
    <div class="button-container">
        <button class="btn-download" id="downloadBtn">Download Certificate</button>
    </div>

    <!-- Certificate Area -->
    <div id="certificateArea" class="certificate">
        <!-- HEADER -->
        <table class="header"><br><br><br><br><br>
            <tr>
                <td style="width:20%;">
                    <img src="Screenshot 2024-06-09 182734.png" width="120" height="100" style="margin-left:30px;">
                </td>
                <td style="width:60%;">
                    <div class="header-title">GOVERNMENT POLYTECHNIC, AHMEDNAGAR</div>
                    <div class="divider"></div>
                    <div class="sub-header">Burudgaon Road, Ahmednagar (M.S.)</div>
                </td>
                <td style="width:20%;">
                    <img src="Screenshot 2024-06-09 181718.png" width="120" height="100" style="margin-right:30px;">
                </td>
            </tr>
        </table>

        <!-- TITLE -->
        <table class="title-row" align="center">
            <tr>
                <td><img src="Screenshot 2024-06-09 153743.png" width="50" height="50"></td>
                <td style="padding:0 25px;">
                    <div class="certificate-title">CERTIFICATE</div>
                </td>
                <td><img src="Screenshot 2024-06-09 153743.png" width="50" height="50"></td>
            </tr>
        </table>

        <!-- BODY CONTENT -->
        <div class="content">
            This certificate is awarded to Mr./Miss./Mrs.
            <b><?php echo $_GET['name']; ?></b> of <b>Second Year <?php echo $_GET['branch']; ?></b>
            for obtaining <b><?php echo $_GET['position']; ?></b> position in
            <b><?php echo $_GET['wname']; ?></b> Paper Presentation / Poster Presentation /
            Model Exhibition held during academic year 2024-2025.
        </div>

        <!-- FOOTER -->
        <table class="footer" width="100%">
            <tr>
                <td class="date" style="width:30%;"><br><br>
                    Date: <b><?php echo $_GET['date']; ?></b>
                </td>

                <td class="stamp" style="width:30%;">
                    <img src="Screenshot 2024-06-09 181141.png" width="180" height="130">
                </td>

                <td class="sign" style="width:30%;">
                    <img src="Screenshot 2024-06-09 201316.png"><br>
                    <div class="principal-name">Principal</div>
                    <div class="college">
                        Government Polytechnic<br>Ahmednagar
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <!-- Script for download -->
    <script>
        document.getElementById("downloadBtn").addEventListener("click", function () {
            const certificate = document.getElementById("certificateArea");
            html2canvas(certificate, { scale: 3 }).then(canvas => {
                const link = document.createElement("a");
                link.download = "Certificate_<?php echo $_GET['name']; ?>.jpg";
                link.href = canvas.toDataURL("image/jpeg", 1.0);
                link.click();
            });
        });
    </script>
</body>
</html>
