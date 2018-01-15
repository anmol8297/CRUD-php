<?php
    require('config/config.php');
    require('config/db.php');

    $query = 'SELECT * FROM posts ORDER BY created_at DESC';

    $result = mysqli_query($conn, $query);

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    mysqli_close($conn);
?>
<?php include('inc/header.php'); ?>
    <div class="container">
        <h1>Posts</h1>
            <?php foreach($posts as $post) { ?>
                <div class="card" style="padding : 10px">
                    <h3 class="card-title"><?php echo $post['title']; ?></h3>
                    <small>Created_On: <?php echo $post['created_at']; ?><br>by-- <?php echo $post['author']; ?></small>
                    <hr>
                    <p class="card-text"><?php echo $post['body']; ?></p>
                    <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Read More</a>
                </div>
                <br>
            <?php } ?>
<?php include('inc/footer.php'); ?>
