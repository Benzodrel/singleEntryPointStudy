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
        <form action="/entry/products/update" method="POST">
            <label for="id">Id:</label><br>
            <input type="text" id="id" name="id" value="<?php echo $product->getId(); ?>" readonly><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $product->getName(); ?>"><br>
            <label for="price">Price:</label><br>
            <input type="text" id="price" name="price" value="<?php echo $product->getPrice(); ?>"><br><br>
            <input type="submit" value="Update">
        </form>

        <form method="post" action="/entry/products/delete">
            <button type="submit" name="id" value="<?php echo $product->getId(); ?>">Delete</button>
        </form>

    </div>
<?php endforeach; ?>

<a href="/entry/products">Index</a>
</body>
</html>