<!doctype php>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Unique CSS  -->
    <link  href = "unique-css.css" rel="stylesheet" type="text/css">
    <title>Library Management System</title>
  </head>
  <body>
    <?php

    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $current_user = parse_url($fullUrl, PHP_URL_QUERY);

    // connect to db
    $conn = mysqli_connect('database-1-4620.c9fxeyiderap.us-east-1.rds.amazonaws.com','admin','database','' ) or die('Error connecting to MySQL server.');

    // select database
    mysqli_select_db($conn, "librarymanagementsystem");

    // Fiction books and info
    $fiction_query = "SELECT title, author, price, rating, book_image FROM Books WHERE genre='Fiction' LIMIT 9";
    $fiction_result = mysqli_query($conn, $fiction_query);
    $fiction_resultCheck = mysqli_num_rows($fiction_result);
    $fiction_data = array();

    if ($fiction_resultCheck > 0) {
      // grab info
      while ($row = mysqli_fetch_assoc($fiction_result)) {
        array_push($fiction_data, $row);
      }
    }
    else {
      printf("Error is %s.\n", mysqli_error($conn));
    }

    // Nonfiction books and info
    $nonfic_query = "SELECT title, author, price, rating, book_image FROM Books WHERE genre='Nonfiction' LIMIT 9";
    $nonfic_result = mysqli_query($conn, $nonfic_query);
    $nonfic_resultCheck = mysqli_num_rows($nonfic_result);
    $nonfic_data = array();

    if ($nonfic_resultCheck > 0) {
      // grab info
      while ($row = mysqli_fetch_assoc($nonfic_result)) {
        array_push($nonfic_data, $row);
      }
    }
    else {
      printf("Error is %s.\n", mysqli_error($conn));
    }

    // Syfy books and info
    $syfy_query = "SELECT title, author, price, rating, book_image FROM Books WHERE genre='Syfy' LIMIT 9";
    $syfy_result = mysqli_query($conn, $syfy_query);
    $syfy_resultCheck = mysqli_num_rows($syfy_result);
    $syfy_data = array();

    if ($syfy_resultCheck > 0) {
      // grab info
      while ($row = mysqli_fetch_assoc($syfy_result)) {
        array_push($syfy_data, $row);
      }
    }
    else {
      printf("Error is %s.\n", mysqli_error($conn));
    }

    // Biography books and info
    $bio_query = "SELECT title, author, price, rating, book_image FROM Books WHERE genre='Biography' LIMIT 9";
    $bio_result = mysqli_query($conn, $bio_query);
    $bio_resultCheck = mysqli_num_rows($bio_result);
    $bio_data = array();

    if ($bio_resultCheck > 0) {
      // grab info
      while ($row = mysqli_fetch_assoc($bio_result)) {
        array_push($bio_data, $row);
      }
    }
    else {
      printf("Error is %s.\n", mysqli_error($conn));
    }

    // Mystery books and info
    $myst_query = "SELECT title, author, price, rating, book_image FROM Books WHERE genre='Mystery' LIMIT 9";
    $myst_result = mysqli_query($conn, $myst_query);
    $myst_resultCheck = mysqli_num_rows($myst_result);
    $myst_data = array();

    if ($myst_resultCheck > 0) {
      // grab info
      while ($row = mysqli_fetch_assoc($myst_result)) {
        array_push($myst_data, $row);
      }
    }
    else {
      printf("Error is %s.\n", mysqli_error($conn));
    }


    ?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <h1 class="navbar-brand" " href="#">T. C. Library</h1>
      <h1 class="navbar-brand" href="#" style="text-align: center; font-style: bold">Hello, <?php echo $current_user ?></h1>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <! --BELOW: No actual fuction except to keep spacing -->
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#"></a>
          </li>
        </ul>
        <! -- ABOVE: No actual fuction except to keep spacing -->
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <header class="index-header">
      <br>
      <h1 style="text-align: center">Welcome to<br>T. C. Library</h1>
      <h2 class="Recommended" style="text-align: center">Our Top Must Reads</h2>


    </header>
<main>
  <h1 style="text-align: center;">Fiction</h1>
  <!-- Fiction Carousel  -->
  <div id="fiction-carousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#fiction-carousel" data-slide-to="0" class="active"></li>
      <li data-target="#fiction-carousel" data-slide-to="1" class=""></li>
      <li data-target="#fiction-carousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active"><!-- Slide 1 -->
        <div class="container">
          <div class="carousel-caption">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $fiction_data[0]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[0]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[0]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[0]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[0]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $fiction_data[1]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[1]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[1]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[1]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[1]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $fiction_data[2]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[2]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[2]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[2]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[2]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
            </div><!-- End of row -->
          </div>
        </div>
      </div>  <!-- Slide 1 -->
      <div class="carousel-item"><!-- Slide 2 -->
        <div class="container">
          <div class="carousel-caption">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $fiction_data[3]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[3]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[3]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[3]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[3]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $fiction_data[4]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[4]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[4]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[4]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[4]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $fiction_data[5]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[5]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[5]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[5]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[5]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
            </div><!-- End of row -->
          </div>
        </div>
      </div>  <!-- Slide 2 -->
      <div class="carousel-item"><!-- Slide 3 -->
        <div class="container">
          <div class="carousel-caption">
            <div class="row">
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $fiction_data[6]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[6]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[6]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[6]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[6]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $fiction_data[7]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[7]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[7]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[7]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[7]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
              <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                  <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $fiction_data[8]['book_image']?>>
                  <div class="card-body">
                    <p class="card-text" style="text-align:left;"><b>Title:<?php echo $fiction_data[8]['title'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Author:<?php echo $fiction_data[8]['author'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $fiction_data[8]['price'];?></b></p>
                    <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $fiction_data[8]['rating'];?></b></p>
                  </div>
                </div>
              </div><!--End of col-md-4-->
            </div><!-- End of row -->
          </div>
        </div>
      </div>  <!-- Slide 3 -->
    <a class="carousel-control-prev" href="#fiction-carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#fiction-carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  </div>
<!-- End of Fiction Carousel -->


<h1 style="text-align: center;">Nonfiction</h1>
<!-- Nonfiction Carousel  -->
<div id="nonfiction-carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#nonfiction-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#nonfiction-carousel" data-slide-to="1" class=""></li>
    <li data-target="#nonfiction-carousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active"><!-- Slide 1 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $nonfic_data[0]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[0]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[0]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[0]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[0]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $nonfic_data[1]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[1]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[1]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[1]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[1]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $nonfic_data[2]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[2]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[2]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[2]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[2]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 1 -->
    <div class="carousel-item"><!-- Slide 2 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $nonfic_data[3]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[3]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[3]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[3]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[3]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $nonfic_data[4]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[4]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[4]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[4]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[4]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $nonfic_data[5]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[5]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[5]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[5]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[5]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 2 -->
    <div class="carousel-item"><!-- Slide 3 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $nonfic_data[6]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[6]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[6]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[6]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[6]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $nonfic_data[7]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[7]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[7]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[7]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[7]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $nonfic_data[8]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $nonfic_data[8]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $nonfic_data[8]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $nonfic_data[8]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $nonfic_data[8]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 3 -->
  <a class="carousel-control-prev" href="#nonfiction-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#nonfiction-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<!-- End of Nonfiction Carousel -->

<h1 style="text-align: center;">Syfy</h1>
<!-- Syfy Carousel  -->
<div id="syfy-carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#syfy-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#syfy-carousel" data-slide-to="1" class=""></li>
    <li data-target="#syfy-carousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active"><!-- Slide 1 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $syfy_data[0]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[0]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[0]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[0]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[0]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $syfy_data[1]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[1]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[1]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[1]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[1]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $syfy_data[2]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[2]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[2]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[2]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[2]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 1 -->
    <div class="carousel-item"><!-- Slide 2 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $syfy_data[3]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[3]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[3]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[3]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[3]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $syfy_data[4]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[4]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[4]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[4]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[4]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $syfy_data[5]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[5]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[5]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[5]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[5]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 2 -->
    <div class="carousel-item"><!-- Slide 3 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $syfy_data[6]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[6]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[6]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[6]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[6]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $syfy_data[7]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[7]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[7]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[7]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[7]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $syfy_data[8]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $syfy_data[8]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $syfy_data[8]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $syfy_data[8]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $syfy_data[8]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 3 -->
  <a class="carousel-control-prev" href="#syfy-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#syfy-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<!-- End of Syfy Carousel -->

<h1 style="text-align: center;">Biographies</h1>
<!-- Biographies Carousel  -->
<div id="biographies-carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#biographies-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#biographies-carousel" data-slide-to="1" class=""></li>
    <li data-target="#biographies-carousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active"><!-- Slide 1 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $bio_data[0]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[0]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[0]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[0]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[0]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $bio_data[1]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[1]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[1]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[1]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[1]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $bio_data[2]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[2]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[2]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[2]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[2]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 1 -->
    <div class="carousel-item"><!-- Slide 2 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $bio_data[3]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[3]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[3]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[3]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[3]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $bio_data[4]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[4]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[4]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[4]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[4]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $bio_data[5]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[5]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[5]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[5]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[5]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 2 -->
    <div class="carousel-item"><!-- Slide 3 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $bio_data[6]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[6]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[6]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[6]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[6]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $bio_data[7]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[7]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[7]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[7]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[7]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $bio_data[8]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $bio_data[8]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $bio_data[8]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $bio_data[8]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $bio_data[8]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 3 -->
  <a class="carousel-control-prev" href="#biographies-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#biographies-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<!-- End of Biographies Carousel -->

<h1 style="text-align: center;">Mystery</h1>
<!-- Mystery Carousel  -->
<div id="mystery-carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#mystery-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#mystery-carousel" data-slide-to="1" class=""></li>
    <li data-target="#mystery-carousel" data-slide-to="2" class=""></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active"><!-- Slide 1 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $myst_data[0]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[0]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[0]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[0]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[0]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $myst_data[1]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[1]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[1]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[1]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[1]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $myst_data[2]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[2]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[2]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[2]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[2]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 1 -->
    <div class="carousel-item"><!-- Slide 2 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $myst_data[3]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[3]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[3]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[3]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[3]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $myst_data[4]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[4]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[4]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[4]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[4]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $myst_data[5]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[5]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[5]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[5]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[5]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 2 -->
    <div class="carousel-item"><!-- Slide 3 -->
      <div class="container">
        <div class="carousel-caption">
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tkamb.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block" src=<?php echo $myst_data[6]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[6]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[6]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[6]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[6]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\toaoi.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $myst_data[7]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[7]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[7]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[7]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[7]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="pictures\fiction\tlkoe.jpg" style="margin-left: auto; margin-right: auto; height: 225px; width: 80%; display: block;" src=<?php echo $myst_data[8]['book_image']?>>
                <div class="card-body">
                  <p class="card-text" style="text-align:left;"><b>Title:<?php echo $myst_data[8]['title'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Author:<?php echo $myst_data[8]['author'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Price: $<?php echo $myst_data[8]['price'];?></b></p>
                  <p class="card-text" style="text-align:left;"><b>Rating:<?php echo $myst_data[8]['rating'];?></b></p>
                </div>
              </div>
            </div><!--End of col-md-4-->
          </div><!-- End of row -->
        </div>
      </div>
    </div>  <!-- Slide 3 -->
  <a class="carousel-control-prev" href="#mystery-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#mystery-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>
<!-- End of Mystery Carousel -->

  </main>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper)
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
-->
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS     -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  </body>
</html>
