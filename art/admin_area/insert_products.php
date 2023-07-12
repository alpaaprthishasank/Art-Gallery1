<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keywords=$_POST['product_keywords'];
    $category_id=$_POST['product_categories'];
    $brand_id=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    //acessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

//accessing img temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];
    //checking empty conditons
if($product_title!='' or $description!='' or $product_keywords!='' or $category_id!='' or $brand_id!='' or $product_price!='' or $product_image1!='' or $product_image2!='' or $product_image3!=''){
   
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image1,"./product_images/$product_image2");
    move_uploaded_file($temp_image1,"./product_images/$product_image3");
//insert query
$insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status)
 values('$product_title','$description','$product_keywords','$category_id', '$brand_id','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
$result_query=mysqli_query($con,$insert_products);
if($result_query){
    echo "<script>alert('successfully insert')</script>";
}
else{
    echo "<script>alert('please fill all the available fields')</script>";
    exit();
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Insert products-Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
<!--font awesome link---->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body class=bg-light>
    <div class='container mt-3'>
        <h1 class="text-center">Insert Products</h1>
        <!--title--->
        <form action="" method="post" enctype="multipart/form-data">
           <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
           </div>
        
<!--descriptiom--->
           <div class="form-outline mb-4 w-50 m-auto">
            <label for="" class="form-label">Product description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
           </div>
       

<!--key words--->
           <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">product_keywords</label>
            <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product_keywords" autocomplete="off" required="required">
           </div>
        

        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_categories" id="" class="form-select" >
                <option value="">Select a Category</option>
                <?php
                $select_query="Select *from `categories`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                         $category_title=$row['category_title'];
                          $category_id=$row['$category_id'];
                          echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
        </div>

        

        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class="form-select" >
                <option value="">Select a Brand</option>
                <?php
                $select_query="Select *from `brands`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                         $brand_title=$row['brand_title'];
                          $brand_id=$row['$brand_id'];
                          echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
        </div>
<!---Image 1--->
        <div class="form-outline mb-4 w-50 m-auto">
<label for="product_image1" class="form-label" >Product image1
</label>        
<input type="file" name="product_image1" id="product_image1" class="form-control" required="required">     
 </div>

 <!---Image 2--->
 <div class="form-outline mb-4 w-50 m-auto">
<label for="product_image2" class="form-label" >Product Image2
</label>        
<input type="file" name="product_image2" id="product_image2" class="form-control" required="required">     
 </div>

 <!---Image 3--->
 <div class="form-outline mb-4 w-50 m-auto">
<label for="product_image3" class="form-label" >Product Image3
</label>        
<input type="file" name="product_image3" id="product_image2" class="form-control" required="required">     
 </div>

 
<!--price--->
<div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">product_price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product_price" autocomplete="off" required="required">
           </div>
        
       
<!--price--->
<div class="form-outline mb-4 w-50 m-auto">
<input type="submit" name="insert_product" class="btn btn-info" value="Insert Products">
</div>
        

</form>
</div> 
</body>
</html> 