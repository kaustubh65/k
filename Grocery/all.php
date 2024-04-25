<?php
 $db_name = 'mysql:host=localhost;dbname=grocery';
 $user_name = 'root';
 $user_password = '';

 $conn = new PDO($db_name, $user_name, $user_password);

    $select_users = $conn->prepare("SELECT * FROM `grocery_products`");
    $select_users->execute();
    $rows = $select_users->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $row) {
        $productName = $row["product_name"];
        $category = $row["category"];
        $price = $row["price"];
        $quantity = $row["quantity_in_stock"];
    
        echo "Product name : $productName <br>";
        echo "Category: $category <br>";
        echo "Price: $price <br>";
        echo "Quantity: $quantity <br>";
        echo "<br>";
        echo "<br>";
       } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="styel.css"/> -->
    <title>Registration form</title>
    <style>
      .button {
        background-color: #4a90e2;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
      }

      .button :hover {
        background-color: #357abd; /* Slightly darker blue on hover */
      }
    </style>
  </head>
  <body>
    <button class="button"><a href="addProduct.php">Add product</a></button>
  </body>
</html>