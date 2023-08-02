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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6db0076f7d.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" /> -->
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6db0076f7d.js" crossorigin="anonymous"></script>
    <title> index </title>
</head>

<body>
   
<?php include 'navbar.php'; ?>
   

    



    <!-- Food Item list start-->

  
    <div class="container">

        <!-- <span>
            <h4 class="content-title">Best Item in town</h4>
        </span> -->
        <div class="row">
            <?php
            foreach ($data as $dt) {
            ?>

                <div class="col-lg-3">
                    <div class="food-cart card">
                        <div class="menu-item">
                           <a href="Carddetails.php">
                           <img src="admin/media/<?php echo $dt['Image']; ?>" alt="" class="image-item-list" />
                           </a>
                        </div>
                        <div class="menu-des">
                            <h4><?php echo $dt['Name'] ?></h4>
                            <form action="" method="post">
                                <input type="hidden" name="pid" value="<?php echo $dt['id'] ?>">

                            

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
                <!-- <div class="col-lg-4 nav-bar-col-main">
                    <div class="navbar-col-3">
                        <div>
                            <h3 class="navbar-col-heading">Bakery</h3>
                        </div>
                    </div>
                </div> -->
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
                              <a href="Carddetails.php">
                              <img src="admin/media/<?php echo $dt['Image']; ?>" alt="" class="image-item-list" />
                              </a>
                            </div>
                            <div class="menu-des">
                                <h4><?php echo $dt['Name'] ?></h4>
                                <form action="" method="post">
                                    <input type="hidden" name="pid" value="<?php echo $dt['id'] ?>">

                                  

                            </div>
                            <div class="price">
                                <h3><?php echo $dt['Price'] ?></h3>
                                <?php
                                // if(isset($_SESSION['username']))
                                // {
                                //     echo '<button type="submit" class="add-btn" name="order">Add</button>';
                                // }
                                // else
                                // {
                                //     echo ' <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#loginModal">Add</a>';
                                // }
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>




            </div>
        </div>
    </div>
        <!-- footer -->
        <?php include 'footer.php'; ?>


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