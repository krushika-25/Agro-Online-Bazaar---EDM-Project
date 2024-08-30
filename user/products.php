<?php
	session_start();
    if(!isset($_SESSION['log']))
    {
        include 'header.php';
    }
    else
    {
      include 'header1.php';
    }
    if(!(isset($_GET["catid"])))
      echo "<script>window.location = './'</script>";
    else
      $catid = $_GET["catid"];

?>


  <!--=============================================
    =            breadcrumb area         =
    =============================================-->

  <div class="breadcrumb-area mb-50">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="breadcrumb-container">
            <ul>
              <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
              <li class="active">Shop</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--=====  End of breadcrumb area  ======-->
<!--=============================================
  =            Shop page container         =
  =============================================-->

  <div class="shop-page-container mb-50">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mb-sm-35 mb-xs-35">

          <!--=======  shop page banner  =======-->

          <!-- <div class="shop-page-banner mb-35">
            <a href="shop-left-sidebar.html">
              <img width="870" height="331" src="assets/images/banners/shop-banner.webp" class="img-fluid" alt="">
            </a>
          </div> -->

          <!--=======  End of shop page banner  =======-->

          <!--=======  Shop header  =======-->

          <div class="shop-header mb-35">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-12 d-flex align-items-center">
                <!--=======  view mode  =======-->

                <!-- <div class="view-mode-icons mb-xs-10"> -->
                  <!-- <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a> -->
                  <!-- <a href="#" data-target="list"><i class="fa fa-list"></i></a> -->
                <!-- </div> -->

                <!--=======  End of view mode  =======-->

              </div>
              <!-- <div
                class="col-lg-8 col-md-8 col-sm-12 d-flex flex-column flex-sm-row justify-content-between align-items-left align-items-sm-center">
                =======  Sort by dropdown  =======

                <div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
                  <p class="mr-10">Sort By: </p>
                  <select name="sort-by" id="sort-by" class="nice-select">
                    <option value="0">Sort By Popularity</option>
                    <option value="0">Sort By Average Rating</option>
                    <option value="0">Sort By Newness</option>
                    <option value="0">Sort By Price: Low to High</option>
                    <option value="0">Sort By Price: High to Low</option>
                  </select>
                </div>

                =======  End of Sort by dropdown  =======

                <p class="result-show-message">Showing 1–12 of 41 results</p>
              </div> -->
            </div>
          </div>

          <!--=======  End of Shop header  =======-->

          <!--=======  Grid list view  =======-->

          <div class="shop-product-wrap grid row no-gutters mb-35">
            <?php 

              $qry1="SELECT * FROM tbl_product WHERE p_status=2 AND cat_id=$catid";
              $run1=mysqli_query($con,$qry1);
              while ($result1=mysqli_fetch_array($run1)) 
                {
                    $catid = $result1['cat_id'];
                    $qry0="SELECT * FROM tbl_cat WHERE cat_id = $catid";
                    $run0=mysqli_fetch_array(mysqli_query($con,$qry0));
                                      // $result1=($run1)
                    echo '<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                <!--=======  Grid view product  =======-->

                <div class="gf-product shop-grid-view-product">
                  <div class="image">
                    <a href="#">
                      <img width="350" height="350" src="'.$result1['p_img'].'" class="img-fluid" alt="">
                    </a>
                    <div class="product-hover-icons">
                       <form method="post" action="">
                        <input type="hidden" name="pid" value='.$result1['p_id'].' />
                        <button type="submit"> <span class="icon_cart_alt"></span></button>
                      </form>
                        
                    </div>
                  </div>
                  <div class="product-content">
                    <div class="product-categories">
                      '.$run0['cat_name'].'
                    </div>
                    <h3 class="product-title"><a href="#">'.$result1['p_name'].'</a></h3>
                    <div class="price-box"><span class="discounted-price">Rs. '.$result1['p_price'].'</span>
                    <div class="price-box"><span class="discounted-description">Rs. '.$result1['description'].'</span>
                    </div>
                  </div>
                 </div>
                </div>

                <!--=======  End of Grid view product  =======-->
              </div>';
                }
            ?>
              
          </div>

          <!--=======  Pagination container  =======-->

       <!--     <div class="pagination-container">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  =======  pagination-content  =======

                  <div class="pagination-content text-center">
                    <ul>
                      <li><a class="active" href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                  </div>

                  =======  End of pagination-content  =======
                </div>
              </div>
            </div>
          </div>  -->

          <!--=======  End of Pagination container  =======-->

        </div>
      </div>
    </div>
  </div>

  <!--=====  End of Shop page container  ======-->

<?php
  include "footer.php";
  if (isset($_POST['pid']) && $_POST['pid']!="")
  {
    $pid = $_POST['pid'];
    $result = mysqli_query($con,"SELECT * FROM `tbl_product` WHERE `p_id`='$pid'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['p_name'];
    $pid = $row['p_id'];
    $price = $row['p_price'];
    $image = $row['p_img'];
    $sid = $row['l_id'];
    $cartArray = array(
      $pid=>array(
      'name'=>$name,
      'pid'=>$pid,
      'price'=>$price,
      'quantity'=>1,
      'image'=>$image,
      'seller'=>$sid)
    );

    if(empty($_SESSION["shopping_cart"])) {
      $_SESSION["shopping_cart"] = $cartArray;
      echo "<script> alert('Product is added to your cart!'); </script>";
      echo "<script>window.location.href='cart.php'; </script>";
    }else{
      $array_keys = array_keys($_SESSION["shopping_cart"]);
      if(in_array($pid,$array_keys)) {
        echo "<script> alert('Product is already added to your cart!'); </script>";
        echo "<script>window.location.href='cart.php'; </script>";
      } else {
      $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
      echo "<script> alert('Product is added to your cart!'); </script>";
      echo "<script>window.location.href='cart.php'; </script>";
      }

      }
  }
?>