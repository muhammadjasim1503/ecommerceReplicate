<?php
session_start();
include "categories_class.php";

$categories = new Categories();

$display = $categories->displayCategory();
$message = '';

if (isset($_GET["success"])) {
    $message = '

 <div class="alert alert-success alert-dismissible fade show" role="alert">
 Item Added into Cart
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 ';
}

if (isset($_GET["remove"])) {
    $message = '
 
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
 Item removed from Cart
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 ';
}
if (isset($_GET["clearall"])) {
    $message = '
 
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
 Your Shopping Cart has been clear...
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
 ';
}

?>
<!-- <a class="dropdown-item" href="logoutadmin.php">Long Out</a> -->

<?php
//  if(isset($_SESSION['License']) && !empty($_SESSION['License'])){
?>
<!-- <div class="alert alert-success text-center"> -->
<?php
// echo $_SESSION['License'];
?>
<!-- </div> -->
<?php
// }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>E-Commerce</title>
    <style>
        .img-s {
            opacity: 0;
            transition: 0.3s;
        }

        .card:hover .img-s {
            opacity: 1;
        }
    </style>
</head>

<body>
    <header class="section-header">

        <section class="header-main border-bottom py-2">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-4">
                        <a href="user_page.php" class="brand-wrap">
                            <img class="logo" src="image/logo.png">
                        </a> <!-- brand-wrap.// -->
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <form action="#" class="search  ms-5">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" id="search_button" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form> <!-- search-wrap .end// -->
                    </div> <!-- col.// -->
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="widgets-wrap float-md-right">
                            <div class="widget-header  mr-3">
                                
                            </div>
                            <div class="widget-header icontext">
                                <a href="#" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
                                <div class="text">
                                    <span class="text-muted">Welcome!</span>
                                    <div> 
                                        <a href="#">Sign in</a> |  
                                        <a href="#"> Register</a>
                                    </div>
                                </div>
                            </div>

                        </div> 
                        <!-- widgets-wrap.// -->
                    </div> <!-- col.// -->
                </div> <!-- row.// -->
            </div> <!-- container.// -->
        </section> <!-- header-main .// -->
    </header>

    <main class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-lg-3  p-3">
                    
                </div>
                <div class="col-sm-12 col-md-7 col-lg-9  p-3">
                    <div class="container  mb-5">
                        <div class="row">
                            <div class="col-md-7 offset-md-3">
                                <div class="d-flex">
                                    <hr class="my-auto flex-grow-1">
                                    <div class="px-3 text-uppercase fs-2">ALL CATEGORIES</div>
                                    <hr class="my-auto flex-grow-1">
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="container">
                        <div class="row filter_data">
                            <?php
                            if (isset($display) && !empty($display)) {
                                foreach ($display as $row) {
                            ?>

                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
    <script>
        load_data();
        function load_data(query) {
            $.ajax({
                url: "fetch_categories.php",
                method: "POST",
                data: {
                    query: query
                },
                success: function(data) {
                    $('.filter_data').html(data);
                }
            });
        }

        $('#search_button').keyup(function() {
            var search = $(this).val();

            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });

    </script>

</body>

</html>