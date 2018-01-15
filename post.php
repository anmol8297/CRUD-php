<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['delete'])) {
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);        

    $query = "DELETE FROM posts WHERE id = {$delete_id}";

        if(mysqli_query($conn, $query)) {
            header('Location: ' . ROOT_URL . '');
        } else {
            echo 'ERROR: ' . mysqli_error($conn);
        }
    }
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = 'SELECT * FROM posts WHERE id = ' . $id;

    $result = mysqli_query($conn, $query);

    $post = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    mysqli_close($conn);
?>
<?php include('inc/header.php'); ?>
    <div class="container">
        <a href="<?php echo ROOT_URL; ?>" class="btn btn-info">Back</a>
        <h1><?php echo $post['title']; ?></h1>
        <div class="card" style="padding : 10px">
            <small>Created_On: <?php echo $post['created_at']; ?><br>by-- <?php echo $post['author']; ?></small>
            <hr>
            <p><?php echo $post['body']; ?></p>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="mx-auto" style="padding : 10px">
                <input type="hidden" name="delete_id" value="<?php echo $post['id']; ?>">
                <a href="<?php echo ROOT_URL; ?>edit-post.php?id=<?php echo $post['id'] ?>" class="btn btn-primary mx-auto">Edit</a>
                <input type="submit" value="delete" name="delete" class="btn btn-danger mx-auto">
            </form>
        </div>
    </div>  
<?php include('inc/footer.php'); ?>
