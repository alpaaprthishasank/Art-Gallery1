

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
    <style>
        .cart_img{
    width:50px;
    height:50px;
}
    </style>

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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
       
      </ul>
      
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

<!---fourth cild--->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-center ">
            <thead>
                <tr>
                    <th>Product title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Remove</th>
                    <th colspan="2">Operations</th>
                </tr>
            </thead>
            <tbody>
                <!------>
                <?php
                 global $con;
                 $get_ip_add=getIPAddress();
                 $total=0;
               $cart_query="Select * from `cart` where ip_address='$get_ip_add' ";
               $result=mysqli_query($con,$cart_query);
               while($row=mysqli_fetch_array($result)){
                 $product_id=$row['product_id'];
                 $select_products="Select * from `products` where product_id='$product_id'";
                 $result_products=mysqli_query($con,$select_products);
                 while($row_product_price=mysqli_fetch_array($result_products)){
                   $product_price=array($row_product_price['product_price']);
                   $price_table=$row_product_price['product_price'];
                   $product_title=$row_product_price['product_title'];
                   $product_image1=$row_product_price['product_image1'];
                   $product_values=array_sum($product_price);
                  // $total+=$product_values;
                
       ?>         
                <tr>
                    <td><?php echo $product_title?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" id="" class="form-input w-50"></td>
                    <?php
                    global $con;
                    $get_ip_add=getIPAddress();
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['qty'];
                      $update_cart="update `cart` set quantity=$quantities where ip_address='$get_ip_add' ";
                      $result_products_quantity=mysqli_query($con,$update_cart);
                      $total_price=$price_table*$quantities;
                      $total+=$total_price;
                    }
                    ?>
                     <td><?php echo $price_table?></td>
                     <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id?>" ></td>
                     <td>
                      <!---  <button class="bg-info px-3 py-2 boarder-0 mx-3">Update</button>---->
                      <input type="submit" value="Update cart" class="bg-info px-3 py-2 boarder-0 mx-3" name="update_cart" >
                       <!--- <button class="bg-info px-3 py-2 boarder-0 mx-3">Remove</button>--->
                       <input type="submit" value="Remove cart" class="bg-info px-3 py-2 boarder-0 mx-3" name="remove_cart" >

                     </td>
                </tr>
         <?php   }
               
            }  ?>
            </tbody>
        </table>
        <div class="d-flex mb-3">
            <h4 class="px-3">Subtotal :<strong class="text-info"><?php echo $total ?></strong></h4>
            <a href="./index.php"><button class="bg-info px-3 py-2 boarder-0 mx-3">Continue shopping</button></a>
            <a href=""><button class="bg-secondary p-3 py-2 boarder-3">Check out</button></a>

        </div>
    </div>
</div>
<!--function to remove item--->
<?php
function remove_cart(){
  global $con;
  if(isset($_POST['remove_cart'])){
     foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
     }
  }
}
echo $remove_item=remove_cart();
?>
</form>
<div class="bg-info p-3 text-center">
  <p>All rights reserved Designed by Shasank-2023</p>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>