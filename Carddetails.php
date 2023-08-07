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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6db0076f7d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6db0076f7d.js" crossorigin="anonymous"></script>
    <title>cooked food</title>
</head>

<body>
<?php include 'navbar.php'; ?>
    
    <div class="card_details_back">
        <h2 class="centered-text">
            Products Details
        </h2>
    </div>
  

    <!-- Card Details -->

  <div class="product-container container">
   <div class="row">
   <div class="col-md-6">
    <div class="product-image">
        <img src="images/1.jpg" alt="Bakery Item">
      </div>
   </div>
   <div class="col-md-6">

    <div class="product-details">
        <h3 class="item-name">Delicious Cake</h3>
        <p class="item-price">$15.99</p>
        <form class="order-form">
          <label for="weight">Weight (in pounds):</label>
          <select id="weight" name="weight">
            <option value="0.5">0.5 lb</option>
            <option value="1">1 lb</option>
            <option value="2">2 lb</option>
            <!-- Add more weight options as needed -->
          </select>
  
          <label for="delivery-date">Delivery Date:</label>
          <input type="date" id="delivery-date" name="delivery-date" required>
  
          <label for="delivery-time">Delivery Time:</label>
          <input type="time" id="delivery-time" name="delivery-time" required>
  
          <label for="message">Message on Cake:</label>
          <input type="text" id="message" name="message" placeholder="Enter your message">
  
          <div class="row">
            <div class="col-md-6 ">
                <button type="submit" class="add-to-cart w-100">Add to Cart</button>

            </div>
            <div class="col-md-6">
                <button type="submit" class="buy-now w-100">Buy Now</button>

            </div>
          </div>
        </form>
      </div>
   </div>
   </div>
    
  </div>
    <!-- footer -->
    <?php include 'footer.php'; ?>
</body>

</html>