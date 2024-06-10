<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php foreach ($products as $product): ?>
    <div>
        <h3><?php echo $product->getName(); ?></h3>
        <p><?php echo $product->getPrice(); ?></p>
    </div>
<?php endforeach; ?>

<a href="/entry/products/new">Add</a>
<a href="/entry/products/update">Update or Delete</a>
</body>
</html>