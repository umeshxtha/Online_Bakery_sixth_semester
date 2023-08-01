<?php
session_start();

require_once 'class/order.php';
$san = New Order;
$data = $san->selectOrder();

if(isset($_POST['update'])){
    $san->updateOrder($_POST['orderstatus'], $_GET['eid']);
    header("location:order.php");
}

if(isset($_GET['eid'])){
    $dt = $san->selectSingleOrders($_GET['eid']);
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/cms_css.css" />
    <title>Order</title>
</head>

<body>

    <div class="container">

        <?php include 'header.php'; ?>

        <div class="row">
            <?php include 'nav.php'; ?>

            <section class="col-md-9">
                <form method="post">
                    <div class="mb-3 mt-3">

                        <input type="text" placeholder="Name" class="form-control  " name="name" value="<?php if(isset($_GET['eid'])){ echo $dt[0]['firstname']; } ?>">
                    </div>
                    <div class="mb-3">

                        <select class="form-select form-control" aria-label="Default select example" name="orderstatus">
                            <option selected>Order Status</option>
                            <option value="Order Placed" <?php if(isset($_GET['eid']) && $data[0]['order_status'] == 'Order Placed'){ echo 'selected'; } ?>>Order Placed</option>
                            <option value="Confirmed" <?php if(isset($_GET['eid']) && $data[0]['order_status'] == 'Confirmed'){ echo 'selected'; } ?>>Confirmed</option>
                            <option value="Cancel" <?php if(isset($_GET['eid']) && $data[0]['order_status'] == 'Cancel'){ echo 'selected'; } ?>>Cancel</option>
                           
                        </select>
                    </div>
                    <div class="mb-3">

                        <input type="text" placeholder="Product Name" class="form-control mb-3" name="category" value="<?php if(isset($_GET['eid'])){ echo $dt[0]['category']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="number" placeholder="Price" class="form-control mb-3" name="price" value="<?php if(isset($_GET['eid'])){ echo $dt[0]['Price']; } ?>">
                    </div>
                    


                    <div>
                      
                        <input type="submit" name="update" value="Update" class="btn btn-danger">
                    </div>
                </form>

                <div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-dark mt-3" id="myTable">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>User Name</th>
                                    <th>Product Name</th>
                                    <th>Order status</th>
                                    <th>Order Quantity</th>
                                    <th>Total Amount</th>
                                    <th>Edit</th>
                                  
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($data as $dt) {
                                    echo "<tr>
                        <td>" . $dt['id'] . "</td>
                        <td>" . $dt['firstname'] . "</td>
                        <td>" . $dt['category'] . "</td>
						<td>" . $dt['order_status'] . "</td>
						<td>1</td>
						<td>" . $dt['Price'] . "</td>
						
						<td><a href='order.php?eid=" . $dt['id'] . "' class='btn btn-primary'>Edit</a></td>
					
					</tr>";
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'footer.php'; ?>

    </div>



</body>

</html>