<?php 

include "config.php"; 

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
            header("Location: info.php");
        }
        else
        {
            echo "Buba";
        }
        
    }
    else
    {

        $erroMsg = "Login error ! ";         
    }
}

?>

<!DOCTYPE html>
<html>    
    <head>        
        <meta charset = "utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
         <link rel = "stylesheet" type = "text/css" href = "style.css" />
        <title></title>
    </head>
    <body>

        <div class="login">
            <h1> Login </h1>
            <form method="post" action="">
                <input type="text" name="usr" placeholder="username" required="required" />
                <input type="password" name="pass" placeholder="password" required="required" />
                <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Login</button>                
                <button class="btn btn-primary btn-block btn-large" onclick="location.href='register.php';">Register</button>
            </form>
            <b><br><?php echo $erroMsg; ?></b></b>

        </div>
    </body>
</html>