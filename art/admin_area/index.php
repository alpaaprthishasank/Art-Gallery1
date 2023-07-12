<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
<!--font awesome link---->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .admin_image{
    width: 100px;
    object-fit: contain;
}
.footer{
    position: absolute;
    bottom: 0;
}
    </style>
</head>
<body>
<div class="container-fluid">
    <!--first child--->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../Images/logo.jpg" alt="" class="logo">
            <nav class="navbar navbar-expand-lg ">
             <ul class="navbar-nav">
                <li class="nav-item">
                   <a href="" class="nav-link" >Welcome Guest</a>
                </li>
             </ul>
            </nav>
        </div>
    </nav> 
    <!---second child--->
    <div class="bg-light">
    <h3 class="text-center p-2">Manage details</h3>
</div>
<!----third child--->
<div class="row">
    <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
        <div class="p-3">
            <a href="#"><img src="../Images/pine.jpeg" alt="" class="admin_image" ></a>
             <p class="text-light text-center">Admin Name</p>
        </div>
        <div class="button text-center">
            <button><a href="insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
            <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
            <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">View Brands</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">All orders</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">All payments</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">List users</a></button>
            <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>

        </div>
    </div>
</div>

<!--fourth child--->
<div class="container my-3">
    <?php
    if(isset($_GET['insert_categories'])){
        include('insert_categories.php');
    }

    if(isset($_GET['insert_brands'])){
        include('insert_brands.php');
    }
    ?>
</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>