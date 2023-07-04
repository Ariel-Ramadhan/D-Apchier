<?php
    include './conn.php';

    $query = "SELECT * FROM produk;";
    $sql = mysqli_query($conn, $query);

    // $result = mysqli_fetch_array($sql);
    
    $nama = htmlspecialchars($_GET['product']);
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE judul='$nama'");
    $produk = mysqli_fetch_array($queryProduk);

    // var_dump($result);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $produk['judul'] ?></title>
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
            <a href="about.html"><strong>About</strong></a>
            <a href="./index.php"><strong>Home</strong></a>
            <!-- <a href="#">Figure</a> -->
        </div>
    </div>
        <!-- Content -->
    <form action="">
        <div class="content">
            <img src="image/<?php echo $produk['gambar'] ?>" alt="*" width="600px" height="600px" style="border-radius: 6px;float: left;">
            <h1><?php echo $produk['judul'] ?></h1>
            <h4><?php echo $produk['manufaktur'] ?><hr style="margin-top: 15px;margin-bottom: 10px;position: relative;margin-right: 10%;"></h4>
            <h2>$ <?php echo $produk['harga'] ?> <!--<button type="submit" class="btn-fav"><i class="fa-solid fa-heart fa-2x"></i></button> <button type="submit" class="btn-cart">Add to Cart</button>--></h2>
            <p><?php echo $produk['deskripsi'] ?><hr style="float: right; width: 41%; margin-top: 15px;margin-bottom:15px;margin-right: 1.5%;"></p>
            <h3>Size : <small><?php echo $produk['size'] ?></small></h3>
            <h3>Material : <small><?php echo $produk['material'] ?></small></h3>
            <h3>Manufacturer : <small><?php echo $produk['manufaktur'] ?></small></h3>
        </div>
    </form>
        <!-- Footer -->
        <div class="footer">
            <h1>Ariel Ramadhan</h1>
            <h4>A11.2022.14297 - 4107</h4>
            <div class="medsos">
                <h3>Interact with Me</h3>
                <ul>
                    <li><a href="https://id-id.facebook.com/ariel.ramadhan.127648" target="_blank"><i class="fa-brands fa-square-facebook fa-3x"></i></a></li>
                    <li><a href="https://www.instagram.com/arlllll01" target="_blank"><i class="fa-brands fa-square-instagram fa-3x"></i></a></li>
                    <li><a href="https://github.com/staz1080" target="_blank"><i class="fa-brands fa-square-github fa-3x"></i></a></li>
                 </ul>
                 <div class="phone">
                    <p><i class="fa-solid fa-phone"></i>&ensp; 08122226168</p>
                 </div>
            </div>
        </div>
</body>
</html>