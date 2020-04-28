<?php 

include "config.php"; 

$errMsg = null;

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
{
    $usr = $_POST["usr"];
    $pass = $_POST["pass"];
    

    $sql = "SELECT * FROM Users WHERE username='$usr'";
    $result = $db->query($sql);

    if($result->num_rows > 0)
    {
        $temp = $result->fetch_assoc();
        $passFromDB = $temp["password"];

        echo $pass;
        if(password_verify($pass , $passFromDB))
        {
            header("Location: main.php");
        }
        else
        {
            #echo "Buba";
            $errMsg = "Wrong username or password ! ";
        }
        
    }
    else
    {

        $errMsg = "Wrong username or password ! ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
	.login-form {
		width: 340px;
    	margin: 170px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
<body>
<div class="login-form">
    <form action="index.php" method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" name="usr">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="pass">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="submit">Log in</button>
        </div>        
    </form>
    <p class="text-center"><a href="register.php">Create an Account</a></p>
    <?php 
        if($errMsg != null)
        {
            echo "<div class='alert alert-warning alert-dismissible show'>";
            echo "<strong>Warning!</strong> $errMsg ";
            echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
            echo "</div>";
        }
	?>
</div>
</body>

</html>                                		                            