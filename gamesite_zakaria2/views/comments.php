<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
</head>

<body>
    <h2>Comments</h2>
    <?php foreach ($comments as $comment) : ?>
        <p><?php echo $comment->getContent(); ?></p>
        <p>Posted by: <?php echo $comment->getUserId(); ?></p>
        <p>Posted at: <?php echo $comment->getCreatedAt(); ?></p>
    <?php endforeach; ?>
</body>

</html>