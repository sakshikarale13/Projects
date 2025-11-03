<!DOCTYPE html>
<html>
<head>
    <title>Certificate Generator</title>
    <style>
        body {
            background: linear-gradient(135deg, #f3e7e9, #e3eeff);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        table {
            background-color: #fff8e7;
            border: 3px solid #ffa500;
            border-radius: 15px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
            width: 700px;
            padding: 30px;
        }

        h1 {
            color: #6a0dad;
            font-family: "Times New Roman", serif;
            font-size: 42px;
            text-align: center;
            margin-bottom: 30px;
            text-shadow: 1px 1px 3px #b79df0;
        }

        label {
            font-size: 18px;
            color: #333;
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }

        input[type="text"], input[type="date"] {
            width: 60%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="text"]:focus, input[type="date"]:focus {
            border-color: #6a0dad;
            outline: none;
            box-shadow: 0px 0px 5px #b57edc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="submit"] {
            background-color: #00cc66;
            color: white;
            font-weight: bold;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            padding: 10px 25px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #00994d;
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <form action="Selectcertificate1.php">
        <table>
            <tr>
                <td>
                    <h1>Certificate Generator</h1>
                    <div class="form-group">
                        <label for="name">Enter Name:</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="branch">Branch:</label>
                        <input type="text" id="branch" name="branch">
                    </div>
                    <div class="form-group">
                        <label for="position">Position:</label>
                        <input type="text" id="position" name="position">
                    </div>
                    <div class="form-group">
                        <label for="wname">Workshop Name:</label>
                        <input type="text" id="wname" name="wname">
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date">
                    </div>
                    <center>
                        <input type="submit" value="Generate">
                    </center>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
