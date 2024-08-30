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
?>

<!--=============================================
  =            Hero slider Area         =
  =============================================-->

  <div class="hero-slider-container mb-35">
    <!--=======  Slider area  =======-->

    <div class="hero-slider-one">
      <!--=======  hero slider item  =======-->

      <div class="hero-slider-item slider-bg-1">
        <div class="slider-content d-flex flex-column justify-content-center align-items-center">
         
        </div>
      </div>

      <!--=======  End of hero slider item  =======-->


      <!--=======  Hero slider item  =======-->

      <div class="hero-slider-item slider-bg-2">
        <div class="slider-content d-flex flex-column justify-content-center align-items-center">
          
        </div>
      </div>

      
      <!--=======  End of Hero slider item  =======-->

    </div>

    <!--=======  End of Slider area  =======-->

  </div>

  <!--=====  End of Hero slider Area  ======-->



  

<div class="double-banner-section mb-35">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 mb-xs-35">
          <!--=======  single banner  =======-->

          <div class="single-banner" width="570" height="297">
            <a href="">
              <img  src="photos/img0.jpg" class="img-fluid" alt="">
            </a>
          </div>
         

          <!--=======  End of single banner  =======-->
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <!--=======  single banner  =======-->

          <div class="single-banner" width="570" height="297">
            <a href="">
              <img  src="photos/img2.jpg" alt="">
            </a>
          </div>

          
          <!--=======  End of single banner  =======-->
        </div>
      </div>
    </div>
  </div>
  <div class="shop-product-wrap grid row no-gutters mb-35 container">

            <?php 

echo '<br><center><h1> Shop Now!!! </h1></center><br>';


              $qry1="SELECT * FROM tbl_product WHERE p_status=2 ORDER BY p_id DESC";
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
                      <img src="'.$result1['p_img'].'" height="350px" alt="">
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