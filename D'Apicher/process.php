<?php
    include 'function.php';

    //add

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $success = add_data($_POST, $_FILES);

            if($success){
                header("location: adminpage.php");
            } else {
                echo $success;
            }

            // edit

        } else if($_POST['aksi'] == "editdt"){

            $success = edit_data($_POST, $_FILES);

            if($success){
                header("location: adminpage.php");
            } else {
                echo $success;
            }
        }
    }

    //delete

    if(isset($_GET['delete'])){

        $success = delete_data($_GET);

        if($success){
            header("location: adminpage.php");
        } else {
            echo $success;
        }
    }
?>