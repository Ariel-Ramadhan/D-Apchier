<?php
    include 'conn.php';

    //add

    function add_data($data, $files){
        $judul = $data['judul'];
        $split = explode('.', $files['gambar']['name']);
        $extension = $split[count($split)-1];
        
        $gambar = $judul.'.'.$extension;

        $harga = $data['harga'];
        $manufaktur = $data['manuf'];
        $size = $data['size'];
        $material = $data['material'];
        $deskripsi = $data['desc'];

        $dir = "image/";
        $tempFile = $files['gambar']['tmp_name'];

        move_uploaded_file($tempFile, $dir.$gambar);

        $query = "INSERT INTO produk VALUES(null, '$gambar', '$judul', '$harga', '$manufaktur', '$size', '$material', '$deskripsi')"; 
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    //edit

    function edit_data($data, $files){
        $id_produk = $data['id_produk'];
        $judul = $data['judul'];
        $harga = $data['harga'];
        $manufaktur = $data['manuf'];
        $size = $data['size'];
        $material = $data['material'];
        $deskripsi = $data['desc'];

        $queryShow = "SELECT * FROM produk WHERE id_product = $id_produk;";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $hgambar = mysqli_fetch_array($sqlShow);

        if($files['gambar']['name'] == ""){
            $photo = $hgambar['gambar'];
        } else {
            $split = explode('.', $files['gambar']['name']);
            $extension = $split[count($split)-1];
            $photo = $hgambar['judul'].'.'.$extension;
            unlink("image/".$hgambar['judul']);
            move_uploaded_file($files['gambar']['tmp_name'], 'image/'.$photo);
        }

        $query = "UPDATE produk SET judul= '$judul', harga= '$harga', manufaktur= '$manufaktur', size= '$size', material= '$material', deskripsi= '$deskripsi', gambar= '$photo' WHERE id_product= '$id_produk';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    //delete

    function delete_data($data){
        $id_produk = $data['delete'];

        $queryShow = "SELECT * FROM produk WHERE id_product = $id_produk;";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $hgambar = mysqli_fetch_array($sqlShow);

        unlink("image/".$hgambar['gambar']);

        $query = "DELETE FROM produk WHERE id_product = '$id_produk';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }
?>