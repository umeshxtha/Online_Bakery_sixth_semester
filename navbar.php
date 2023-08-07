<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img class="main_logo" src="images/logo.png" alt="hello_world">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
            
              <li class="nav-item">
                <a class="nav-link " href="#">About us</a>
              </li>
            </ul>
           <!-- <a href="/login.html">
           <button class=" btn btn-primary log-in-btn">
            <p>
                LogIn
            </p>
        </button></a>
            <a href="/register.html">
                <button class=" btn btn-primary sign-up-btn">
                    <p>
                        Register
                    </p>
                </button>
            </a> -->
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

                                echo ' <a href="#" class="btn" style="background-color:#12034d; color:white
                                ;" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>';
                                echo ' <a href="#" class="btn " style="background-color:#12034d; color:white
                                ;" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>';
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

            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </nav>

      


    </div>