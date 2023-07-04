<?php
    include './conn.php';

    if (isset($_POST['submit'])){
        $uname = $_POST['uname'];
        $pw = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $newpw = md5($pw);

        $sql = "INSERT INTO `akun` (`usname`, `paswd`) VALUES ('$uname', '$newpw')";
        $query = "SELECT * FROM akun WHERE usname = '$uname'";
        $duplicate = mysqli_query($conn, $query);
    
        if (mysqli_num_rows($duplicate) > 0){
            echo "<script>alert('Username has already taken')</script>";
        } elseif ($pw != $cpass){
            echo "<script>alert('Password does not match')</script>";
        } else {
            if (mysqli_query($conn, $sql)){
                header('Location: ./login.php');
                echo "<script>alert('Register Success')</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">   
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Khand' rel='stylesheet'>
    <link rel="Icon" href="image/logov2.png">
</head>
<body>
      <!-- Navbar -->
    <div class="navbar">    
        <a href="./index.php"><img src="image/logov.gif" alt="logo" width="9.9%" class="logo"></a>
        <a href="./index.php"><img src="image/logofont.png" alt="logo" width="9.9%" class="logofont"></a>
        <div class="menuNav">
            <a href="./index.php"><strong>Home</strong></a>
            <a href="about.html"><strong>About</strong></a>
        </div>
    </div>

    <form action="" method="POST">
        <div class="loreg">   
            <h1 style="color: white; text-align: center;">Register</h1>  
            <label for="uname"><b style="color: white;">Username</b></label>
            <input required type="text" placeholder=" Enter Username" name="uname">
            <label for="pass"><b style="color: white;">Password</b></label>
            <input required type="password" placeholder=" Enter Password" name="pass">
            <label for="cpass"><b style="color: white;">Confirm Password</b></label>
            <input required type="password" placeholder=" Confirm Password" name="cpass">
            <button type="submit" name="submit" class="regbtn">Register</button>
            <button type="button" class="cancelbtn"><a href="login.php">Cancel</a></button>
        </div>
    </form>
</body>
</html>