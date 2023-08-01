<?php
session_start();

require_once 'class/User.php';
$san = new User;
$data = $san->selectUser();
if(isset($_GET['eid']))
  {
    $selected = $san->selectSingleUser($_GET['eid']);
  }
if(isset($_GET['did']))
  {
    $san->deleteUser($_GET['did']);
    header("Location: usertable.php");
  }
if(isset($_POST['btn-update']))
  {
    
    $san->updateUser($_POST['firstname'], $_POST['Lastname'], $_POST['username'], $_POST['email'],$_POST['contact'] ,$_POST['password'],$_POST['status'],$_POST['type'], $_GET['eid']);
    header("Location: usertable.php");
  }

if (isset($_POST['btn-add'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['Lastname'];
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $type = $_POST['type'];

    $san->setValue($firstname, $lastname, $username, $contact, $email, $password, $status, $type);
    if ($san->registerUser()) {
        echo '<script>
    alert("data not added")
    </script>';
    } else {
        echo '<script>
    alert("data  added")
    </script>';
        header('location: usertable.php');
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
    <title>User</title>
</head>

<body>

    <div class="container">

        <?php include 'header.php'; ?>

        <div class="row">
            <?php include 'nav.php'; ?>

            <section class="col-md-9">
                <form method="post">
                    <div class="mb-3 mt-3">

                        <input type="text" placeholder="First Name" class="form-control  " name="firstname" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['firstname']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="text" placeholder="Last Name" class="form-control" name="Lastname" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['lastname']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="text" placeholder="User name" class="form-control" name="username" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['username']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="email" placeholder="Email" class="form-control mb-3" name="email" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['email']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="number" placeholder="Contact" class="form-control mb-3" name="contact" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['contact']; } ?>">
                    </div>
                    <div class="mb-3">

                        <input type="password" placeholder="Password" class="form-control mb-3" name="password" value="<?php if(isset($_GET['eid'])){ echo $selected[0]['password']; } ?>">
                    </div>

                    <div class="mb-3">

                        <select class="form-select" aria-label="Default select example" name="status" >
                            <option selected>Select Status</option>
                            <option value="offline" <?php if(isset($_GET['eid']) && $selected[0]['status'] == 'offline'){ echo 'selected'; } ?>>offline</option>
                            <option value="online" <?php if(isset($_GET['eid']) && $selected[0]['status'] == 'online'){ echo 'selected'; } ?>>online</option>

                        </select>
                    </div>
                    <div class="mb-3">

                        <select class="form-select" aria-label="Default select example" name="type" >
                            <option selected>Type</option>
                            <option value="admin" <?php if(isset($_GET['eid']) && $selected[0]['type'] == 'admin'){ echo 'selected'; } ?>>Admin</option>
                            <option value="user" <?php if(isset($_GET['eid']) && $selected[0]['type'] == 'user'){ echo 'selected'; } ?>>User</option>

                        </select>
                    </div>


                    <div>
                        <!-- <input type="submit" name="btn-add" value="ADD" class="btn btn-danger  "> -->
                        <input type="submit" name="btn-update" value="Update" class="btn btn-danger">
                    </div>
                </form>

                <div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-dark mt-3" id="myTable">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>password</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Edit</th>
                                    <!-- <th>Delete</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($data as $dt) {
                                    echo "<tr>
						<td>" . $dt['ID'] . "</td>
						<td>" . $dt['firstname'] . "</td>
						<td>" . $dt['lastname'] . "</td>
						<td>" . $dt['username'] . "</td>
						<td>" . $dt['contact'] . "</td>
						<td>" . $dt['email'] . "</td>
						<td>" . $dt['password'] . "</td>
						<td>" . $dt['status'] . "</td>
						<td>" . $dt['type'] . "</td>
						<td><a href='usertable.php?eid=" . $dt['ID'] . "' class='btn btn-primary'>Edit</a></td>
						
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