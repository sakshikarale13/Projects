<!DOCTYPE html>
<html>
<head>
    <title>Select Certificate</title>
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #dbeafe);
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        table.main-table {
            border: 3px solid #ffa500;
            background-color: #fffef2;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            width: 80%;
            margin: 50px auto;
            padding: 20px;
        }

        h1 {
            color: green;
            font-family: "Times New Roman", serif;
            font-size: 40px;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px #a3cfa3;
        }

        .certificate-option {
            display: inline-block;
            margin: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .certificate-option img {
            width: 350px;
            height: 250px;
            border-radius: 10px;
            border: 3px solid transparent;
            transition: 0.3s;
        }

        .certificate-option:hover img {
            transform: scale(1.05);
            box-shadow: 0px 5px 15px rgba(0, 128, 0, 0.3);
            border-color: #32cd32;
        }

        .certificate-option input[type="radio"] {
            margin-top: 10px;
            accent-color: #28a745;
            transform: scale(1.3);
        }

        input[type="submit"] {
            background-color: #00cc66;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            padding: 12px 35px;
            margin-top: 30px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"]:hover {
            background-color: #00994d;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<form>
    <table class="main-table">
        <tr>
            <td>
                <h1>SELECT CERTIFICATE</h1>

                <div class="certificate-option">
                    <img src="Screenshot 2024-06-12 143342.png" alt="Certificate 1">
                    <div><input type="radio" name="certificate" value="certificate1"> Certificate 1</div>
                </div>

                <div class="certificate-option">
                    <img src="Screenshot 2024-06-12 143532.png" alt="Certificate 2">
                    <div><input type="radio" name="certificate" value="certificate2"> Certificate 2</div>
                </div>

                <div class="certificate-option">
                    <img src="Screenshot 2024-06-12 143715.png" alt="Certificate 3">
                    <div><input type="radio" name="certificate" value="certificate3"> Certificate 3</div>
                </div>

                <br><br>
                <input type="submit" name="submit" value="Next">
            </td>
        </tr>
    </table>

    <!-- Hidden Fields -->
    <input type="hidden" value="<?php echo $_GET['name']; ?>" name="name">
    <input type="hidden" value="<?php echo $_GET['branch']; ?>" name="branch">
    <input type="hidden" value="<?php echo $_GET['position']; ?>" name="position">
    <input type="hidden" value="<?php echo $_GET['wname']; ?>" name="wname">
    <input type="hidden" value="<?php echo $_GET['date']; ?>" name="date">
</form>

<?php 
    if(isset($_GET['submit'])) { 
        $result = $_GET['certificate'];
        $name = $_GET['name'];
        $branch = $_GET['branch'];
        $position = $_GET['position'];
        $wname = $_GET['wname'];
        $date = $_GET['date'];

        if($result == 'certificate1') {
            header('Location:certificate1.php?name='.$name.'&wname='.$wname.'&branch='.$branch.'&position='.$position.'&date='.$date);
        }
        if($result == 'certificate2') {
            header('Location:certificate2.php?name='.$name.'&wname='.$wname.'&branch='.$branch.'&position='.$position.'&date='.$date);
        }
        if($result == 'certificate3') {
            header('Location:certificate3.php?name='.$name.'&wname='.$wname.'&branch='.$branch.'&position='.$position.'&date='.$date);
        }			
    }
?>
</body>
</html>
