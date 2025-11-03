<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
    <!-- Include html2canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <style>
        body {
            background: #f5f5f5;
            font-family: "Times New Roman", serif;
        }

        .certificate {
            background-repeat: no-repeat;
            background-size: 100% 100%;
            width: 1400px;
            height: 800px;
            margin: 40px auto;
            border: 3px solid #b8860b;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.25);
            padding: 10px;
        }

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
            margin-bottom: 25px;
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

    <!-- Certificate Area -->
    <center>
        <div id="certificateArea">
            <table class="certificate" background="cer_border2.png">
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td style="width:57%">
                                    <img src="Screenshot 2024-06-11 210250.png" width="110px" height="200px" style="transform:translate(70px,20px);">
                                </td>
                                <td style="width:53%">
                                    <center><img src="Screenshot 2024-06-09 151039.png" width="370" height="50"></center>
                                    <h1 align="center">
                                        <font color="brown" size="5px">OF PARTICIPATION</font>
                                    </h1>
                                </td>
                            </tr>
                        </table>

                        <center>
                            <font size="5px" color="purple"><b>THIS CERTIFICATE IS PROUDLY PRESENTED TO</b></font>
                        </center><br>

                        <center>
                            <table>
                                <tr>
                                    <td><img src="Screenshot 2024-06-09 153743.png" width="30px" height="30px"></td>
                                    <td><center><font color="orange" size="5px"><b>PARTICIPATION IN ACTIVITIES</b></font></center></td>
                                    <td><img src="Screenshot 2024-06-09 153743.png" width="30px" height="30px"></td>
                                </tr>
                            </table>
                        </center>

                        <p>
                            <font size="4px"><center>
                                This certificate is awarded to Mr./Miss./Mrs.
                                <b><?php echo $_GET['name']; ?></b> of <b>Second</b> Year 
                                <b><?php echo $_GET['branch']; ?></b> for obtaining <br>
                                <b><?php echo $_GET['position']; ?></b> position in 
                                <b><?php echo $_GET['wname']; ?></b> Paper Presentation / Poster Presentation / 
                                Model Exhibition held during academic year 2024-2025.<br><br>
                                Date: <b><?php echo $_GET['date']; ?></b>
                            </center></font>
                        </p>

                        <font size="5px">
                            <center>
                                <img src="Screenshot 2024-06-09 201316.png" width="70px" height="40px"><br>
                                <font color="purple">Principal</font><br>
                                <font size="4px">Government Polytechnic<br>Ahmednagar</font>
                            </center>
                        </font>
                    </td>
                </tr>
            </table>
        </div>
    </center>

    <!-- Script to download as image -->
    <script>
        document.getElementById("downloadBtn").addEventListener("click", function() {
            const certificate = document.getElementById("certificateArea");
            html2canvas(certificate, { scale: 3 }).then(canvas => {
                const link = document.createElement("a");
                link.download = "Certificate_<?php echo $_GET['name']; ?>.jpg";
                link.href = canvas.toDataURL("image/jpeg");
                link.click();
            });
        });
    </script>
</body>
</html>
