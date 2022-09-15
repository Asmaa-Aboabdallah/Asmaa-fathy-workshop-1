<?php

require_once('inc/db-connection.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    echo $id;

    $query = "SELECT img FROM projects WHERE id= $id";
    $run_query = mysqli_query($conn,$query);
    $result = mysqli_fetch_assoc($run_query);
    $imgName =$result['img'];
    $file_to_delete = "images/$imgName";
    unlink($file_to_delete);

    $query = "DELETE FROM projects WHERE id=$id";
    $run_query = mysqli_query($conn,$query);

    header("location: index.php");
}


?>