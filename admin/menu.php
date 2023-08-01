<?php
session_start();

require_once 'class/menu.php';

$san = New menu;
$data = $san->selectMenu();
if(isset($_GET['eid']))
  {
    $selected = $san->selectSingleMenu($_GET['eid']);
  }
if(isset($_GET['did']))
  {
    $san->deleteMenu($_GET['did']);
    header("Location: menu.php");
  }
  if(isset($_POST['btn-update']))
  {

    $san->updateMenu($_POST['name'],$_POST['category'], $_POST['price'], $_POST['image'], $_POST['ingridents'], $_POST['status'], $_GET['eid']);
    header("Location: menu.php");
  }
if (isset($_POST['btn-add'])){
    $name=$_POST['name'];
    $category=$_POST['category'];
    $price=$_POST['price'];


    $time = date('Y-m-d_h-i-s');
    $file = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tn = $_FILES['file']['tmp_name'];
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $file_name = $time.'.'. $ext;
    move_uploaded_file($file_tn, 'media/'. $file_name);

    $ingridents=$_POST['ingridents'];
    $status=$_POST['status'];
    $san->setValue($name,$category,$price, $file_name, $ingridents,$status);
    if($san->registerMenu()){
        echo '<script>
        alert("data not added")
        </script>';
    }
    else{
        echo '<script>
        alert("data  added")
        </script>';
        header('location: menu.php');
    }
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
    <title>Menu</title>
</head>

<body>

    <div class="container">

        <?php include 'header.php'; ?>

        <div class="row">
            <?php include 'nav.php'; ?>

            <section class="col-md-9">
                <form method="post" enctype="multipart/form-data">

                    <div class="mb-3 mt-3">

                        <input type="text" placeholder="Name" class="form-control  " name="name" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['Name']; } ?>">
                    </div>
                  
                    <div class="mb-3">

                        <select class="form-select" aria-label="Default select example" name="category" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['category']; } ?>">
                                <option selected>Category</option>
                                 <option value="1">cookedfood</option>
                                    <option value="2">Bakery</option>
    
                        </select>
                    </div>
                    <div class="mb-3">

                        <input type="number" placeholder="Price" class="form-control" name="price" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['Price']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="file" placeholder="Image" class="form-control mb-3" name="file" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['Image']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="text" placeholder="Ingridents" class="form-control mb-3" name="ingridents" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['Ingridents']; } ?>">
                    </div>
                    <div class="mb-3">

                        <select class="form-select" aria-label="Default select example" name="status" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['Status']; } ?>">
                            <option selected>Status</option>
                            <option value="1">Available</option>
                            <option value="2">Not Available</option>
                          
                        </select>
                    </div>
                 


                    <div>
                        <input type="submit" name="btn-add" value="ADD" class="btn btn-danger  ">
                        <input type="submit" name="btn-update" value="Update" class="btn btn-danger">
                    </div>
                </form>

                <div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-dark  mt-3" id="myTable">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Name</th>
                                    <th>category</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Ingridents</th>
                                    <th>status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($data as $dt) {
                                    echo "<tr>
						<td>" . $dt['id'] . "</td>
						<td>" . $dt['Name'] . "</td>
						<td>" . $dt['category'] . "</td>
						<td>" . $dt['Price'] . "</td>
						<td> <img src='media/" . $dt['Image'] . "' style='height:100px; width:100px;'></td>
						<td>" . $dt['Ingridents'] . "</td>
						<td>" . $dt['Status'] . "</td>
						<td><a href='menu.php?eid=" . $dt['id'] . "' class='btn btn-primary'>Edit</a></td>
						<td><a href='menu.php?did=" . $dt['id'] . "' class='btn btn-danger' onclick='return confirm(&quot;Are you sure?&quot;)'>Delete</a></td>
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