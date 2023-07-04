<?php
    session_start();
    include './conn.php';
    // if($conn){
    //     echo "koneksi berhasil";
    // }
    $query = "SELECT * FROM produk;";
    $sql = mysqli_query($conn, $query);

    
    
    // var_dump($result);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>D'Apchier- Home</title>
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Khand' rel='stylesheet'>
        <link rel="Icon" href="image/logov2.png">
    </head>
    <body>

    <div id="top"></div>
        <!-- Navbar -->
    <div class="navbar">    
        <a href="#top"><img src="image/logov.gif" alt="logo" width="9.9%" class="logo"></a>
        <a href="#top"><img src="image/logofont.png" alt="logo" width="9.9%" class="logofont"></a>
        <div class="menuNav">
            <?php
            if (isset($_SESSION['admin_username'])){
                echo '<a href="./admin.php"><i class="fa-solid fa-plus"></i></a>';
            }
            if (!isset($_SESSION['admin_username'])){
                echo '<a href="./login.php"><strong>Login</strong></i></a>';
            } else {
                echo '<a href="./acc_admin.php"><i class="fa-solid fa-user-large"></i>&nbsp ' . $_SESSION["admin_username"] . '</a>';
            }
            
            ?>
            <a href="#top"><strong>Home</strong></a>
            
        </div>
    </div>
    
    <!-- Banner -->
    <!-- <img src="image/Banner-remake.gif" alt="Banner" width="100%" height="350px"> -->

    <!-- Gambar Gerak -->
    <div class="slider">

        <div class="slide">
            <img src="image/gager1.png" alt="">
            <div class="caption"><b>Shibuya Scramble Figure 1/7 Denji - Chainsaw Man</b></div>
        </div>
        <div class="slide">
            <img src="image/makimacm5.jpg" alt="">
            <div class="caption"><b>Shibuya Scramble PVC Figure 1/7 Makima - Chainsaw Man</b></div>
        </div>
        
        
        
        <a class="prev"><b><</b></a>
        <a class="next"><b>></b></a>
    </div>

    <script>
        const images = document.querySelectorAll(".slide"),prev = document.querySelector(".prev"),next = document.querySelector(".next");

        let current = 0;

        function changeimage() {
            images.forEach(img => {
                img.classList.remove("show");
                img.style.display = "none";
            });

            images[current].classList.add("show");
            images[current].style.display = "block";
        }

        //calling first time
        changeimage();

        //slider next proses
        next.addEventListener("click", function () {
            current++;

            if(current > images.length - 1){
                current = 0;
            } else if (current < 0){
                current = images.length - 1;
            }

            changeimage();
        });


        //slider prev proses
        prev.addEventListener("click", function () {
            current--;

            if(current > images.length - 1){
                current = 0;
            } else if (current < 0){
                current = images.length - 1;
            }

            changeimage();            
        });

        // auto change images
        setInterval( () => {
            next.click();
        }, 5000);
    </script>



<!-- Menu -->
<div class="menu">
    <a href="#recent">Recent</a>
    <!-- <a href="#popular">Popular</a> -->
    <a href="#news">New's</a>
    
    <hr style="width: 600%;margin-top: 10px;margin-bottom: 20px;">
</div>

<!-- Recent -->
<div id="recent">
        <h1>Recent</h1>
    </div>
        <div class="recent">
            <form action="">
                <?php
                    while($produk = mysqli_fetch_array($sql)){
                ?>
                    <div class="card">
                        <a href="content2.php?product=<?php echo $produk['judul'] ?>"><img src="image/<?php echo $produk['gambar'] ?>" alt="*" height="300px" width="100%" class="iconG"></a>
                        <h2><a href="content2.php?product=<?php echo $produk['judul'] ?>"><?php echo $produk['judul']; ?></a></h2>
                        <h4 style="margin-top: 10px;color: #63c5da;">$ <?php echo $produk['harga'] ?></h4>
                        <a href="admin.php?edit=<?php echo $produk['id_product'] ?>" type="button" class="btn-edit"><i class="fa-sharp fa-solid fa-pen-to-square"></i></a>
                        <a href="process.php?delete=<?php echo $produk['id_product'] ?>" type="button" class="btn-delete" onClick="return confirm('yakin ?')">
                            <i class="fa-sharp fa-solid fa-trash"></i>
                        </a>
                    </div>
                <?php
                    }
                ?>
            </form>
        </div>

    <!-- Popular -->
    <!-- <div id="popular">
        <h1>Popular</h1>
    </div>
    <div class="popular">
        <div class="card">
            <a href="content2.php"><img src="image/makimacm.jpg" alt="Makima" height="300px" width="100%" class="iconG"></a>
            <h2><a href="content2.php">PVC Figure 1/7 Makima - Chainsaw Man</a></h2>
            <h4 style="margin-top: 10px;color: #63c5da;">IDR 3,570,000</h4>
        </div>
        <div class="card">
            <a href="content.php"><img src="image/denjicm.jpg" alt="Denji" height="300px" width="100%" class="iconG"></a>
            <h2><a href="content.php">Shibuya Scramble Figure 1/7 Denji-Chainsaw Man</a></h2>
            <h4 style="margin-bottom: auto;color: #63c5da;">IDR 5,850,000</h4>
        </div>
    </div> -->
    
    <!-- News -->
    <div id="news">
    <h1>New's</h1>
</div>
    <div class="news">
        <div class="imagenews"><img src="https://static1.cbrimages.com/wordpress/wp-content/uploads/2022/08/chainsaw-man-figure-sideshow.jpg" alt="news" height="200px" width="400px"></div>
        <h2>Chainsaw Man Figurine Captures the Devil Hunter's Every Gory Detail</h2>
        <p>A gore-covered and bloody figure of Chainsaw Man's protagonist,<br>Denji, is available for preorder ahead of the anime adaptation's upcoming release.</p>
        <a href="admin_news.php">Read it!</a>
    </div>

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
