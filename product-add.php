<?php

    include_once "classes/Type.php";
    include_once "classes/Product.php";
    include_once "classes/Db.php";

    if(isset($_POST['type'])){

        $attribute = (new TypeController)->show(new $_POST['type'], $_POST);
        
        
        
        $prod = new Product();

        $prod->addProduct($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['type'], $attribute);

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
    
    <nav class="product-nav">
        <div class="product-nav-left">
            <p class="product-nav-title">Add Product</p>
        </div>
        <div class="product-nav-right">
            <a href="index.php" class="product-nav-anchor"><button class="product-nav-button">Cancel</button></a>
        </div>
    </nav>

    <form id="product_form" class="product-form" action="" method="post">
        <div class="product-form-div">
            <label class="product-form-label">SKU</label>
            <input id="sku" class="product-form-input" name="sku" type="number" required>
            <label class="product-form-label">Name</label>
            <input id="name" class="product-form-input" name="name" type="text" required>
            <label class="product-form-label">Price</label>
            <input id="price" class="product-form-input" name="price" required type="number" step="0.01">
            <label class="product-form-label">Product Type</label>
            <select id="productType" class="product-form-select" name="type" required onchange="showDiv()">
                <option value="" disabled selected>Select One</option>
                <option value="Dvd">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>

            <div id="DVD" style="display: none">
                <label class="product-form-label">Size (mb)</label>
                <input id="size" class="product-form-input" name="size" type="number" step="0.01">
            </div>

            <div id="Book" style="display: none">
                <label class="product-form-label">Weight (kg)</label>
                <input id="weight" class="product-form-input" name="weight" type="number" step="0.01">
            </div>

            <div id="Furniture" style="display: none">
                <label class="product-form-label">Height (cm)</label>
                <input id="height" class="product-form-input" name="height" type="number" step="0.01">
                <label class="product-form-label">Width (cm)</label>
                <input id="width" class="product-form-input" name="width" type="number" step="0.01">
                <label class="product-form-label">Length (cm)</label>
                <input id="length" class="product-form-input" name="length" type="number" step="0.01">
            </div>

            <input class="product-form-submit" type="submit" value="Add Product">
        </div>
    </form>

    <script>

        let selectedValue = "";

        function showDiv(){

            selectedValue = document.getElementById("productType").value;

            var dvd = document.getElementById("DVD");
            var book = document.getElementById("Book");
            var furniture = document.getElementById("Furniture");

            var size = document.getElementById("size");

            var weight = document.getElementById("weight");

            var height = document.getElementById("height");
            var width = document.getElementById("width");
            var length = document.getElementById("length");

            if(selectedValue == "Dvd"){
                dvd.style.display = "block";
                book.style.display = "none";
                furniture.style.display = "none";
                size.setAttribute("required", true);
                weight.removeAttribute("required");
                height.removeAttribute("required");
                width.removeAttribute("required");
                length.removeAttribute("required");
            } else if (selectedValue == "Book"){
                dvd.style.display = "none";
                book.style.display = "block";
                furniture.style.display = "none";
                size.removeAttribute("required");
                weight.setAttribute("required", true);
                height.removeAttribute("required");
                width.removeAttribute("required");
                length.removeAttribute("required");
            } else if (selectedValue == "Furniture"){
                dvd.style.display = "none";
                book.style.display = "none";
                furniture.style.display = "block";
                size.removeAttribute("required");
                weight.removeAttribute("required");
                height.setAttribute("required", true);
                width.setAttribute("required", true);
                length.setAttribute("required", true);
            }
        };

    </script>

</body>
</html>