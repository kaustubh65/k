<!-- CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT NOT NULL,
    category VARCHAR(50) NOT NULL
); -->
// FOR SQL

<?php
$db_name = 'mysql:host=localhost;dbname=grocery';
$user_name = 'root';
$user_password = '';

$conn = new PDO($db_name, $user_name, $user_password);

if (isset($_POST["submit"])) {
    $productName = $_POST["productName"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $category = $_POST["category"];

    $insert_user = $conn->prepare("INSERT INTO `grocery_products`(product_name, category, price, quantity_in_stock) VALUES(?,?,?,?)");
    $insert_user->execute([$productName, $category, $price, $quantity]);
    header('location:all.php');
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
      /* style.css content */
      body {
        font-family: Arial, sans-serif; /* Setting a base font for the page */
        background-color: #f8f8f8; /* Light grey background for the whole page */
        margin: 0;
        padding-left: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 400px;
      }

      .container {
        background: #fff;
        padding: 20px 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        background-color: blanchedalmond;
      }

      label {
        margin-bottom: 5px;
        font-weight: 800;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"],
      input[type="select"] {
        width: 100%; /* Full width of their container */
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }

      input[type="text"]:focus,
      input[type="email"]:focus,
      input[type="password"]:focus {
        border-color: #4a90e2; /* Blue border for focus */
        outline: none;
      }

      input[type="submit"] {
        background-color: #4a90e2;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 20px;
        width: 100%;
      }

      input[type="submit"]:hover {
        background-color: #357abd; /* Slightly darker blue on hover */
      }

      .category {
        width: 100%; /* Full width of their container */
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <form id="form" action="" method="POST">
        <label>Product Name:</label>
        <input
          type="text"
          name="productName"
          placeholder="enter your first name"
          required
        />
        <br />
        <label>Price:</label>
        <input
          type="number"
          name="price"
          placeholder="enter the price"
          required
        />
        <br />
        <label>Quantity in stock:</label>
        <input
          type="number"
          name="quantity"
          placeholder="enter quantity"
          required
        />
        <br />

        <div class="category">
          <select name="category" required>
            <option>select a category</option>
            <option value="Vegetable">Vegetable</option>
            <option value="Fruit">Fruit</option>
            <option value="Pulses">Pulses</option>
          </select>
        </div>
        <input class="button" type="submit" value="Add Product" name="submit" class="btn">
      </form>
    </div>
  </body>
</html>
