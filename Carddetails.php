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