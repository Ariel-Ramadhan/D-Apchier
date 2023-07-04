<?php 
    session_start();
    if(isset($_SESSION['admin_username'])){
        header("location: acc.php");
    }
    include("conn.php");
    $username = "";
    $password = "";
    $err = "";
    if(isset($_POST['submit'])){
        $username = $_POST['uname'];
        $password = $_POST['pass'];
        if ($username == '' or $password == ''){
            $err .= "<b> > Masukan password dan username</b>";
        }
        if (empty($err)){
            $query1 = "SELECT * FROM akun WHERE usname = '$username'";
            $sql1 = mysqli_query($conn, $query1);
            $r1 = mysqli_fetch_array($sql1);

            if($r1['paswd'] != md5($password)){
                $err .= "<b> > Akun anda tidak ditemukan!!</b>";
            }
        }
        if(empty($err)){
            $login_id = $r1['login_id'];
            $query1 = "SELECT * FROM admin_acc WHERE login_id = '$login_id'";
            $sql1 = mysqli_query($conn, $query1);
            while($r1 = mysqli_fetch_array($sql1)){
                $akses[] = $r1['akses_id'];
            }
            if (empty($akses)){
                $_SESSION['admin_username'] = $username;
                header("location: index.php");
                exit();
            }
        }
        if (empty($err)){
            $_SESSION['admin_username'] = $username;
            $_SESSION['admin_akses'] = $akses;
            header("location: acc_admin.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
    <form  action="" method="POST">
        <div class="loreg">   
            <h1 style="color: white; text-align: center;">Login</h1>  
            <!-- username -->
            <label for="uname"><b style="color: white;">Username</b></label>
            <input type="text" value="<?php echo $username ?>" placeholder=" Enter Username" name="uname">
            <!-- password -->
            <label for="pass"><b style="color: white;">Password</b></label>
            <input type="password" placeholder=" Enter Password" name="pass">
            <?php
                if($err){
                    echo "<b>$err</b>";
                }
            ?>

            <button type="submit" class="inbtn" name="submit">Login</button>
            <button type="button" class="cancelbtn"><a href="index.php">Cancel</a></button>
            <span class="reg" style="color: white;">Don't have an <a href="register.php" style="color: white;">account?</a></span>
        </div>
    </form>
</body>
</html>