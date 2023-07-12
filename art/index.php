
<?php
include('includes/connect.php');
include('./functions/common_function.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Hello, world!</h1>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <img src="./Images/logo.jpg" alt=""  class="logo">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup><?php
          cart_item() ?></sup>
</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price :<?php total_cart_price() ?></a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
        <!--<button class="btn btn-outline-success" type="submit">Search</button>-->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product" >
      </form>
    </div>
  </div>
</nav>
<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
 <ul class="navbar-nav me-auto">
 <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
<li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
</ul>
</nav>

<!--Third child-->
<div class="bg-light">
  <h3 class="text-center">Hidden store</h3>
  <p class="text-center">Communications is at the heart of e-commerrce and community</p>
</div>

<!--Fourth child--->

<div class="row px-1">
  <div class="col-md-10">
<!---products--->
<div class="row">
  <!--fetching products-->
<?php
/*
$select_query="Select * from `products`";
$result_query=mysqli_query($con,$select_query);
//$row=mysqli_fetch_assoc($result_query);
//echo $row['product_title'];
while($row=mysqli_fetch_assoc($result_query)){
$product_id=$row['product_id'];
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$product_keywords=$row['product_keywords'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_image3=$row['product_image3'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
echo "<div class='col-md-4 mb-2'>
<div class='card'>
  <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <a href=#' class='btn btn-info'>Add to cart</a>
    <a href='#' class='btn btn-secondary'>View more</a>

  </div>
</div>
</div>";
}*/
getproducts();
getuniquecat();
getuniquebrand();
$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip;  
cart();
?>


<!--row end-->
</div>
<!--column end -->
  </div>


  <div class="col-md-2 bg-secondary p-0">
  <!--sidenav-->
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href='#'class="nav-link text-light">Delivery Brands</a>
    </li>
<?php
/*
$select_brands="Select *from `brands`";
$result_brands=mysqli_query($con,$select_brands);
//$row_data=mysqli_fetch_assoc($result_brands);
//echo $row_data['brand_title'];
while($row_data=mysqli_fetch_assoc($result_brands)){
  $brand_title=$row_data['brand_title'];
  $brand_id=$row_data['brand_id'];
  //echo $brand_title;
  echo "<li class='nav-item '>
  <a href='index.php?brand=$brand_id'class='nav-link text-light'>'$brand_title'</a>
</li>";
}*/
getbrands();
?>
  </ul>
  <ul class="navbar-nav me-auto text-center">
    <li class="nav-item bg-info">
      <a href='#'class="nav-link text-light">Categories</a>
    </li>

<?php
/*
$select_brands="Select *from `categories`";
$result_brands=mysqli_query($con,$select_brands);
//$row_data=mysqli_fetch_assoc($result_brands);
//echo $row_data['brand_title'];
while($row_data=mysqli_fetch_assoc($result_brands)){
  $category_title=$row_data['category_title'];
  $category_id=$row_data['category_id'];
  //echo $brand_title;
  echo "<li class='nav-item '>
  <a href='index.php?category=category_id'class='nav-link text-light'>'$category_title'</a>
</li>";
}*/
getcat();
?>
   
  </ul>
</div>
</div>


<div class="bg-info p-3 text-center">
  <p>All rights reserved Designed by Shasank-2023</p>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>