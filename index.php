<?php
session_start();
if(isset($_GET['msg']))
{
  echo '<script>alert("'. $_GET['msg'] .'") </script>';
}

if (isset($_POST['register'])) {
    require_once 'admin/class/User.php';
    $user = new User();
    $firstname = $_POST['firstname'];
    if (!preg_match ("/^[a-z A-Z]*$/", $firstname) ) 
      {  
        header('location:index.php?msg= Firstname must be in letters'); 
      }
      else
      {
        $lastname = $_POST['lastname'];
        if (!preg_match ("/^[a-z A-Z]*$/", $lastname) ) 
        {  
            header('location:index.php?msg= Lastname must be in letters'); 
        }
        else
        {
            $user->setValue($firstname, $lastname, $_POST['username'], $_POST['email'], $_POST['contact'], $_POST['password'], 1, 'user');
            if ($user->registerUser()) {
                echo '<script>alert("Registered successfully")</script>';
            }
        }
    }
}

if (isset($_POST['login'])) {
    require_once 'admin/class/User.php';
    $user = new User();
    $data = $user->login($_POST['username'], $_POST['password']);

    if (count($data) > 0) {
        $_SESSION['username'] = $data[0]['username'];
        $_SESSION['usertype'] = $data[0]['type'];
        $_SESSION['uid'] = $data[0]['ID'];
    } else {
        echo '<script>alert("Wrong Credentials")</script>';
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('location: index.php');
}
require 'admin/class/menu.php';
$ck = new Menu();
$data = $ck->selectCookedfood();
$bk = new Menu();
$dat = $bk->selectBakery();


if (isset($_POST['order'])) {
    require_once 'admin/class/order.php';
    $st = 'Order Placed';
    $order = new Order;
    $order->setValue($_SESSION['uid'], $_POST['pid'], $st, $_POST['Price']);
    if ($order->registerOrder()) {
        echo '<script>alert("Order Failed")</script>';
    } else {
        echo '<script>alert("Order Successful")</script>';
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6db0076f7d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6db0076f7d.js" crossorigin="anonymous"></script>
    <title> index </title>
</head>

<body>
    <div class="container-fluid ">
        <div class="row wel">
            <div class="col-lg-3 nav-col">
                <div> <a href="index.php"><img src="images/logo.jpg" alt=""></a></div>
            </div>
            <div class="col-lg-6">
                <div class="">
                    <p class="wel-p"> <b> Welcome to online food order</b></p>
                </div>
            </div>
            <div class="col-lg-3  nav-col">
                <div>

                    <!--login & register module -->
                    <div>
                        <form method="post">
                            <?php

                            if (isset($_SESSION['usertype'])) {
                                if ($_SESSION['usertype'] == 'user') {
                                    echo '<a href="#" class="btn btn-danger " data-bs-toggle="modal" data-bs-target="#orderModal">My Order</a>';
                                    echo '<input type="submit" class="btn btn-danger" value="Log Out" name="logout"/>';
                                } else if ($_SESSION['usertype'] == 'admin') {
                                    echo '<a href="admin/dashboard.php" class="btn btn-danger">Dashboard</a>';
                                    echo '<input type="submit" class="btn btn-danger" value="Log Out" name="logout"/>';
                                }
                            } else {

                                echo ' <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>';
                                echo ' <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>';
                            }

                            ?>

                        </form>
                        <!-- login Modal -->
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label>Username</label>
                                                <input type="text" class="form-control" name="username">
                                            </div>
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="login" name="login">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- register Modal -->
                        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="registerModalLabel">User registeration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label> First Name</label>
                                                <input type="text" class="form-control" name="firstname">
                                            </div>
                                            <div class="mb-3">
                                                <label> Last Name</label>
                                                <input type="text" class="form-control" name="lastname">
                                            </div>
                                            <div class="mb-3">
                                                <label> Username</label>
                                                <input type="text" class="form-control" name="username">
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email">
                                            </div>
                                            <div class="mb-3">
                                                <label>Contact</label>
                                                <input type="number" class="form-control" name="contact">
                                            </div>
                                            <div class="mb-3">
                                                <label>password</label>
                                                <input type="password" class="form-control" name="password" id="psw">
                                            </div>
                                            <div class="mb-3">
                                                <label>Confirm password</label>
                                                <input type="password" class="form-control" name="cpassword" id="pswrd">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-primary" value="register" name="register">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    </div>

    <!-- Button trigger modal -->



    <!-- Food Item list start-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 nav-bar-col-main">
                <div class="navbar-col">
                    <div>
                        <h3 class="navbar-col-heading"><a href="">cooked food</a> </h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4"></div>
        </div>
    </div>
    <div class="container">

        <span>
            <h4 class="content-title">Best Item in town</h4>
        </span>
        <div class="row">
            <?php
            foreach ($data as $dt) {
            ?>

                <div class="col-lg-3">
                    <div class="food-cart">
                        <div class="menu-item">
                            <img src="admin/media/<?php echo $dt['Image']; ?>" alt="" class="image-item-list" />
                        </div>
                        <div class="menu-des">
                            <h4><?php echo $dt['Name'] ?></h4>
                            <form action="" method="post">
                                <input type="hidden" name="pid" value="<?php echo $dt['id'] ?>">

                                <div class="dish-info">
                                    <span class="dish-inf">dinner</span>
                                    <span class="dish-inf">Launch</span>
                                    <span class="dish-inf">Breakfast</span>
                                </div>

                        </div>
                        <div class="price">

                            <input type="number" name="Price" value="<?php echo $dt['Price'] ?>" readonly>
                            <?php
                            if(isset($_SESSION['username']))
                            {
                                echo '<button type="submit" class="add-btn" name="order">Add</button>';
                            }
                            else
                            {
                                echo ' <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal">Add</a>';
                            }
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>



        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4 nav-bar-col-main">
                    <div class="navbar-col-3">
                        <div>
                            <h3 class="navbar-col-heading">Bakery</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                foreach ($dat as $dt) {
                ?>

                    <div class="col-lg-3">
                        <div class="food-cart">
                            <div class="menu-item">
                                <img src="admin/media/<?php echo $dt['Image']; ?>" alt="" class="image-item-list" />
                            </div>
                            <div class="menu-des">
                                <h4><?php echo $dt['Name'] ?></h4>
                                <form action="" method="post">
                                    <input type="hidden" name="pid" value="<?php echo $dt['id'] ?>">

                                    <div class="dish-info">
                                        <span class="dish-inf">dinner</span>
                                        <span class="dish-inf">Launch</span>
                                        <span class="dish-inf">Breakfast</span>
                                    </div>

                            </div>
                            <div class="price">

                                <input type="number" name="Price" value="<?php echo $dt['Price'] ?>" readonly>

                                <?php
                                if(isset($_SESSION['username']))
                                {
                                    echo '<button type="submit" class="add-btn" name="order">Add</button>';
                                }
                                else
                                {
                                    echo ' <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal">Add</a>';
                                }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>




            </div>
        </div>
        <!-- footer -->
        <div class="footer-main">
            <div class="container-fluid footer-content ">


                <div class="row">
                    <div class="col-lg-4">
                        <div>
                            <h4>About us</h4>
                            <p>
                            </p>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div>
                            <h4>services</h4>
                        </div>
                        <div>
                            <p>Deliver Proper food</p>
                            <p>Deliver all over the kathmandu</p>
                            <p>location:Nayabazar, Kathmandu</p>
                        </div>
                        <div class="col-lg-12 footer-icon-social">

                            <span class="social-media-icon"><i class="fa-brands fa-facebook"></i></span>
                            <span class="social-media-icon"><i class="fa-brands fa-instagram"></i></span>
                            <span class="social-media-icon"><i class="fa-brands fa-twitter"></i></span>
                            <span class="social-media-icon"><i class="fa-brands fa-snapchat"></i></span>
                            <div>
                                <h3>social media connect</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 ">
                        <div class="footer-description">
                            <ul>
                                <li>
                                    <h4>store</h4>
                                </li>
                                <li>
                                    <p> <span class="footer-icon"><i class="fa-solid fa-location-dot"></i></span>Endure
                                    </p>
                                </li>
                                <li>
                                    <p><span class="footer-icon"><i class="fa-solid fa-phone"></i></span>
                                        011400500
                                    </p>
                                </li>
                                <li>
                                    <h4>we accept</h4>
                                    <p><span class="footer-icon"><i class="fa-solid fa-credit-card"></i></span>
                                        esewa</p>
                                    <p> <span class="footer-icon"> <i class="fa-brands fa-alipay"></i></span>
                                        Khalti</p>
                                </li>
                                <li>
                                    <p>
                                        <span class="footer-icon"> <i class="fa-brands fa-alipay"></i></span>
                                        fonepay
                                    </p>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            function pass_match() {
                var psw = document.getElementById('psw').value;
                var rpsw = document.getElementById('pswrd').value;

                if (psw !== rpsw) {
                    document.getElementById('pswrd').style.border = '1px solid red';
                    document.getElementById('psw').style.border = '1px solid red';
                } else {
                    document.getElementById('pswrd').style.border = '1px solid navy';
                    document.getElementById('psw').style.border = '1px solid navy';
                }
            }
        </script>


        <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">my Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Food</th>
                                    <th>user id</th>
                                    <th>menu id</th>
                                    <th>order status</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require_once 'admin/class/order.php';
                                $place = new Order;

                                $a = $place->selectSingleOrder($_SESSION['uid']);
                                $b = $place->countOrder($_SESSION['uid']);

                                for ($i = 0; $i < $b[0]['count']; $i++) {
                                    echo "<tr>
                                               
                                                    <td >" . $a[$i]['id'] . "</td>
                                                    <td >" . $a[$i]['Name'] . "</td>
                                                    <td>" . $a[$i]['user_id'] . "</td>
                                                    <td>" . $a[$i]['menu_id'] . "</td>
                                                    <td>" . $a[$i]['order status'] . "</td>
                                                    <td>" . $a[$i]['Price'] . "</td>
                                                </tr>";
                                }
                                ?>

                            </tbody>
                        </table>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>

                    </div>


</body>

</html>