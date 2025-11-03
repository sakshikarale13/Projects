
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 30%;
            margin: 0 auto;
            margin-top: 100px;
            padding: 20px;
            border: 3px solid orange;
            background-color: beige;
            border-radius: 10px;
        }
        h1 {
            text-align: center;
            color: green;
            font-size: 36px;
            font-family: 'Times New Roman', Times, serif;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="button"] {
            width: 100%;
            background-color: lime;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="button"]:hover {
            background-color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login Page</h1>
        <form method="POST">
            <label for="username">Enter Name:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Enter Password:</label>
            <input type="password" id="password" name="password" required><br><br>
			<span id="errormsg"></span><br>
            <input type="button" name="submit" id="submit" value="Login" onclick="doLogin();">
        </form>
    </div>
	
	<script>
		function doLogin()
		{
			var username=document.getElementById("username").value;
			var password=document.getElementById("password").value;

			if(username=='admin' && password=='admin')
			{
				document.getElementById("errormsg").innerHTML="<span style='color:green'>Successful Login</span>";
				window.location.href='generator.php';
			}
			else
			{
				document.getElementById("errormsg").innerHTML="<span style='color:red'>Invalid Login</span>";
			}
		}

	</script>
</body>

		
</html>

