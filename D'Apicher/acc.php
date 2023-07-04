<!DOCTYPE html>
<html>  
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D'Apchier- My Account</title>
    <link rel="stylesheet" href="./style.css">
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
            <!-- <a href="feed.php"><strong>Feedback</strong></a> -->
            <!-- <a href="#">Figure</a> -->
        </div>
    </div>

    <!-- About Me -->
    <div class="about">
        <img src="image/blue moon vampire.gif" alt="Me" width="300px" height="300px">
        <h1>My Account</h1>
        <h5>Username</h5>
        <?php
            session_start();

            echo '<h1>' . $_SESSION["admin_username"] . '</h1>';
        ?>
        <h5>LogOut</h5>
        <form action="./logout.php" method="POST">
            <button type="submit" name="submit" class="outbtn"><i class="fa-sharp fa-solid fa-right-from-bracket fa-2x"></i></button>
        </form>
    </div>
</body>
</html>