<?php
    session_start();
    include('../includes/dbconn.php');
    if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $password = $password;
    $stmt=$mysqli->prepare("SELECT username,email,password,id FROM admin WHERE (userName=?|| email=?) and password=? ");
		$stmt->bind_param('sss',$username,$username,$password);
		$stmt->execute();
		$stmt -> bind_result($username,$username,$password,$id);
		$rs=$stmt->fetch();
		$_SESSION['id']=$id;
		$uip=$_SERVER['REMOTE_ADDR'];
		$ldate=date('d/m/Y h:i:s', time());
		if($rs){
			header("location:dashboard.php");
				} else {
					echo "<script>alert('Invalid Username/Email or password');</script>";
				}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .auth-box {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .modal-bg-img {
            height: 100vh;
            background-size: cover;
            background-position: center;
        }

        .bg-white {
            background-color: #fff;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .text-center {
            text-align: center;
        }

        .mt-5 {
            margin-top: 5px;
        }

        .text-danger {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="auth-box bg-white">
            <h2 class="text-center">Admin Login</h2>
            
            <form method="POST">
                <div class="form-group">
                    <input class="form-control" name="username" type="text" placeholder="Email or Username" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="password" type="password" placeholder="Password" required>
                </div>
                <div class="text-center">
                    <button type="submit" name="login" class="btn btn-danger">Login</button>
                </div>
                <div class="text-center mt-5">
                    <a href="../index.php" class="text-danger">Go Back</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
