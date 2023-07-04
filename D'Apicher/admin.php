<!DOCTYPE html>
<?php
    include 'conn.php';

    $id_produk = '';
    $judul = '';
    $harga = '';
    $manuf = '';
    $size = '';
    $material = '';
    $desk = '';

    if(isset($_GET['edit'])){
        $id_produk = $_GET['edit'];

        $query = "SELECT * FROM produk WHERE id_product = '$id_produk';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_array($sql);

        $judul = $result['judul'];
        $harga = $result['harga'];
        $manuf = $result['manufaktur'];
        $size = $result['size'];
        $material = $result['material'];
        $desk = $result['deskripsi'];

        // var_dump($result);
        // die();

    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">          
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Khand' rel='stylesheet'>
    <link rel="Icon" href="image/logov2.png">
</head>
<body>
       <!-- Navbar -->
    <div class="navbar">    
        <a href="./adminpage.php"><img src="image/logov.gif" alt="logo" width="9.9%" class="logo"></a>
        <a href="./adminpage.php"><img src="image/logofont.png" alt="logo" width="9.9%" class="logofont"></a>
        <div class="menuNav">
            <a href="./adminpage.php"><strong>Home</strong></a>
        </div>
    </div>

    <div class="content">
        <form method="POST" action="process.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_produk ?>" name="id_produk">
            <div class="tampfoto">
                <div class="inpt">
                    <input <?php if(!isset($_GET['edit'])){ echo "required"; } ?> type="file" name="gambar" id="gambar" class="cusfoto" accept="image/*" >
                </div>
            </div>
            <div class="tampinp">
                <label for="judul"><b> Title</b></label>
                <div class="inp">
                    <input required type="text" name="judul" id="judul" placeholder="Char only" value="<?php echo $judul; ?>">
                </div>
            </div>
            <div class="tampinp">
                <label for="harga"><b> Price</b></label>
                <div class="inp">
                    <input required type="text" name="harga" id="harga" placeholder="Enter here" value="<?php echo $harga; ?>">
                </div>
            </div>
            <div class="tampinp">
                <label for="manuf"><b> Manufacturer</b></label>
                <div class="inp">
                    <input required type="text" name="manuf" id="manuf" placeholder="Enter here" value="<?php echo $manuf; ?>">
                </div>
            </div>
            <div class="tampinp">
                <label for="size"><b> Size</b></label>
                <div class="inp">
                    <input required type="text" name="size" id="size" placeholder="Enter here" value="<?php echo $size; ?>">
                </div>
            </div>
            <div class="tampinp">
                <label for="material"><b> Material</b></label>
                <div class="inp">
                    <input required type="text" name="material" id="material" placeholder="Enter here" value="<?php echo $material; ?>">
                </div>
            </div>
            <div class="tampinp">
                <label for="desc"><b> Description</b></label>
                <div class="inp">
                    <textarea required name="desc" id="desc" cols="59" rows="5" style="border-radius: 5px; padding: 5px 5px;" placeholder="Don't put in ( ' )"><?php echo $desk; ?></textarea>
                </div>
            </div>
            <div class="tampinp">
                <?php
                    if(isset($_GET['edit'])){
                ?>
                <button type="submit" name="aksi" value="editdt" class="btnadns">
                    Save
                </button>
                <?php
                    } else {
                ?>
                <button type="submit" name="aksi" value="add" class="btnadns">
                    Add
                </button>
                <?php
                    }
                ?>
                <button type="button" class="btnadnc">
                    <a href="adminpage.php">Cancel</a>
                </button>
            </div>
        </form>
    </div>
</body>
</html>