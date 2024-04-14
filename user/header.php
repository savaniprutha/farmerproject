<header>
    <div class="main_header">
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="language_currency">
                            &nbsp;
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 col-sm-3 col-3">
                        <div class="logo">
                            <a href="index.php"><img src="../admin/uploads/logo/image.png" height="100" width="100"
                                    alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-6 col-sm-7 col-8">
                        <div class="header_right_info">
                            <div class="search_container mobail_s_none">
                                <form action="productlist.php">

                                    <div class="search_box">
                                        <input placeholder="Search product..." name="search" type="text"
                                            style="border:2px solid #198754;border-radius:60px">
                                        <button type="submit" name="submit"><span
                                                class="lnr lnr-magnifier"></span></button>
                                        <!-- <input placeholder="Search product..." name="search" type="text">
                                    <button type="submit" name="submit"><span class="lnr lnr-magnifier"></span></button> -->
                                    </div>
                                </form>
                            </div>
                            <div class="header_account_area">
                                <div class="header_account_list register">
                                    <ul>
                                        <?php
                                            if(isset($_SESSION['isuserlogin']))
                                            { ?>
                                        <li><a href="#">Welcome, <?php echo $_SESSION['name']; ?></a></li>


                                        <?php  } else {
                                            ?>

                                        <li><a href="login.php">Register</a></li>
                                        <li><span>/</span></li>
                                        <li><a href="login.php">Login</a></li>
                                        <?php } ?>

                                    </ul>
                                </div>
                                <?php
                                            if(isset($_SESSION['isuserlogin']))
                                            { 
                                                 $userid=$_SESSION['userid'];

                                                $result = mysqli_query($conn,"select * from cart as c left join products as p on p.product_id=c.product_id where c.farmers_id='$userid'") or die(mysqli_error($conn));
                                                ?>
                                <div class="header_account_list  mini_cart_wrapper">
                                    <a href="javascript:void(0)"><span class="lnr lnr-cart"></span><span
                                            class="item_count"><?php echo mysqli_num_rows($result); ?></span></a>
                                    <!--mini cart-->
                                    <div class="mini_cart">
                                        <div class="cart_gallery">
                                            <div class="cart_close">
                                                <div class="cart_text">
                                                    <h3>cart</h3>
                                                </div>
                                                <div class="mini_cart_close">
                                                    <a href="javascript:void(0)"><i class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <?php
                                                $total=0;
                                                while($row=mysqli_fetch_assoc($result))
                                                {

                                                    $total = $total + ($row["qty"]*$row["price"]);
                                                ?>
                                            <div class="cart_item">
                                                <div class="cart_img">
                                                    <a href="#"><img style="height: 70px; width: 70px; "
                                                            src="../user/assets/img/product/<?php echo $row["img1"]; ?>"
                                                            alt=""></a>
                                                </div>
                                                <div class="cart_info">
                                                    <a href="#"><?php echo $row["product_name"]; ?></a>
                                                    <p><?php echo $row["qty"]; ?> x <span> ₹
                                                            <?php echo $row["price"]; ?> </span></p>
                                                </div>
                                                <div class="cart_remove">
                                                    <a href="index.php?cartid=<?php echo $row["cartid"]; ?>"><i
                                                            class="icon-x"></i></a>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                        <div class="mini_cart_table">
                                            <div class="cart_table_border">

                                                <div class="cart_total mt-10">
                                                    <span>total:</span>
                                                    <span class="price">₹ <?php echo $total; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mini_cart_footer">
                                            <div class="cart_button">
                                                <a href="cart.php"><i class="fa fa-shopping-cart"></i> View cart</a>
                                            </div>
                                            <div class="cart_button">
                                                <a href="checkout.php"><i class="fa fa-sign-in"></i> Checkout</a>
                                            </div>

                                        </div>
                                    </div>
                                    <!--mini cart end-->
                                </div>
                                <?php }

                               if(isset($_GET["cartid"]))
                               {
                                $cartid=$_GET["cartid"];
                                 $result = mysqli_query($conn,"delete from cart where cartid='$cartid'") or die(mysqli_error($conn));
                                  echo "<script>window.location='index.php';</script>";
                               }

                                ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 mobail_s_block">
                        <div class="search_container">
                            <form action="#">
                                <div class="search_box">

                                    <input placeholder="Search product..." name="search" type="text">
                                    <button type="submit" name="submit"><span class="lnr lnr-magnifier"></span></button>


                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="categories_menu">
                            <div class="categories_title">
                                <h2 class="categori_toggle">All Cattegories</h2>
                            </div>
                            <div class="categories_menu_toggle">
                                <ul>
                                    <?php
                      $result = mysqli_query($conn,"select *,(select count(*) from products where cat_id=category.category_id) as totalproducts from category") or die(mysqli_error($conn));
                      while($row=mysqli_fetch_assoc($result))
                      {
                      ?>
                                    <li><a
                                            href="productlist.php?catid=<?php echo $row["category_id"]; ?>"><?php echo $row["category_name"]; ?></a>
                                    </li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!--main menu start-->
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="productlist.php">shop</a></li>
                                    <li><a href="questionlist.php">Questions</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                    <li><a href="videolist.php">Video</a></li>

                                    <?php
                                        
                                            if(isset($_SESSION['isuserlogin']))
                                            { ?>
                                    <li><a href="#">My Account <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub_menu pages">
                                            <li><a href="myaccount.php">My Orders</a></li>
                                            <li><a href="myquestion.php">My Questions</a></li>
                                            <li><a href="askquestion.php">Ask Questons</a></li>
                                            <li><a href="changepassword.php">Change Password</a></li>
                                            <li><a href="logout.php">Log Out</a></li>
                                        </ul>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                        <!--main menu end-->
                    </div>
                    <div class="col-lg-3">
                        <div class="call-support">
                            <p><a href="Mobile No : 8347818110">83478 18110</a> Customer Support</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>