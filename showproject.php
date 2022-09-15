<?php
require_once('inc/db-connection.php');
require_once('inc/header.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
}elseif (!isset($_GET['id'])){
    header("location: index.php");
}

$query = "SELECT * FROM projects WHERE id = $id ";
$run_query = mysqli_query($conn , $query);
$project = mysqli_fetch_assoc($run_query);

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="images/<?php echo $project['img']?>">

        </div>
        <div class="col-md-6">
            <h1><?php echo $project['name']?></h1>
            <p><?php echo $project['description']?></p>
            <strong>Website</strong> : <a href="<?php echo $project['url']?>"><?php echo $project['url']?></a> 
            <br>
            <strong>Github</strong> : <a href="<?php echo $project['repo']?>"><?php echo $project['repo']?></a>
            <br>
            <strong>Created at</strong> : <?php echo $project['created_at']?>
        </div>
    </div>
</div>

<?php
require_once('inc/footer.php');
?>