<?php

    include "classes/Product.php";

    
    $prod = new Product();
    $products = $prod->getProducts();
    
    if(isset($_POST['delete'])){
        $skus = $_POST['delete'];

        foreach($skus as $sku){
            $prod->delete($sku);
        }

        header("location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="body">
    
    <nav class="nav">

        <div class="nav-left">
            <h1 class="nav-title">Product List</h1>
        </div>

        <div class="nav-right">
            <a href="product-add.php" class="nav-anchor"><button class="nav-button nav-add-prod">ADD</button></a>
            <form action="" method="post">
            <a href="#" class="nav-anchor"><button class="nav-button nav-del-prod" id="delete-product-btn">MASS DELETE</button></a>
        </div>

    </nav>

    <div class="body-div">
    <?php
        foreach($products as $product){
            ?>
            <div class="product-box">
                <input type="checkbox" class="delete-checkbox" name="delete[]" value="<?php echo $product['sku'] ?>">
                <p class="product-box-text"><?php echo $product['sku'] ?></p>
                <p class="product-box-text"><?php echo $product['name'] ?></p>
                <p class="product-box-text"><?php echo "$".$product['price'] ?></p>
                <p class="product-box-text"><?php echo $product['attribute'] ?></p>
            </div>
            <?php
        }
        ?>
    </div>
    </form>

</body>
</html>