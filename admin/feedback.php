<?php
session_start();
require_once 'class/feedback.php';
$san = New feedback;
$data = $san->selectfeedback();

if(isset($_GET['eid']))
  {
    $selected = $san->selectSinglefeedback($_GET['eid']);
  }
  if(isset($_GET['did']))
  {
    $san->deletefeedback($_GET['did']);
    header("Location: feedback.php");
  }
  if(isset($_POST['btn-update']))
  {
  
    $san->updatefeedback($_POST['date'], $_POST['name'], $_POST['email'], $_POST['message'], $_GET['eid']);
    header("Location: feedback.php");
  }



if (isset($_POST['btn-add'])){
$date=$_POST['date'];
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$san->setValue($date,$name, $email, $message);
if($san->registerfeedback()){
    echo '<script>
    alert("data not added")
    </script>';
}
else{
    echo '<script>
    alert("data  added")
    </script>';
    header('location: feedback.php');
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
    <title>Feedback</title>
</head>

<body>

    <div class="container">

        <?php include 'header.php'; ?>

        <div class="row">
            <?php include 'nav.php'; ?>

            <section class="col-md-9">
                <form method="post">
                    <div class="mb-3 mt-3">

                        <input type="date" placeholder="date" class="form-control  " name="date" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['Date']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="text" placeholder="Name" class="form-control" name="name" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['Name']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="email" placeholder="email" class="form-control mb-3" name="email" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['Email']; } ?>">
                    </div>
                    <div class="mb-3">

                        <textarea class="form-control" placeholder="enter your message" id="" cols="30" rows="10" name="message" ><?php if(isset($_GET['eid'])){ echo $selected[0]['Subject']; } ?></textarea>
                    </div>


                    <div>
                        <input type="submit" name="btn-add" value="ADD" class="btn btn-danger  " >
                        <input type="submit" name="btn-update" value="Update" class="btn btn-danger">
                    </div>
                </form>

                <div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-dark mt-3" id="myTable">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($data as $dt) {
                                    echo "<tr>
						<td>" . $dt['id'] . "</td>
						<td>" . $dt['Date'] . "</td>
						<td>" . $dt['Name'] . "</td>
						<td>" . $dt['Email'] . "</td>
						<td>" . $dt['Subject'] . "</td>
						<td><a href='feedback.php?eid=" . $dt['id'] . "' class='btn btn-primary'>Edit</a></td>
						<td><a href='feedback.php?did=" . $dt['id'] . "' class='btn btn-danger' onclick='return confirm(&quot;Are you sure?&quot;)'>Delete</a></td>
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