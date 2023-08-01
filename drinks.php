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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/6db0076f7d.js" crossorigin="anonymous"></script>
    <title>Drinks</title>
</head>

<body>
    <div class="container-fluid ">
        <div class="row wel">
            <div class="col-lg-3 nav-col">
                <div> <a href="index.php"><img src="images/logo.jpg" alt=""></a></div>
            </div>
            <div class="col-lg-5">
                <div class="">
                   <p class="wel-p"> <b> Welcome to online food order</b></p>
                </div>
            </div>
            <div class="col-lg-3  nav-col">
                <div>

                    <!--login & register module -->
                    <div>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#registerModal">Register</a>
                        <!-- Button trigger modal -->
                        <!-- login Modal -->
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label> username</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- register Modal -->
                        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="registerModalLabel">User registeration</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="mb-3">
                                                <label> First Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label> Last Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label> username</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="Email" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>password</label>
                                                <input type="password" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1">
                <div >
                   <span class="add-to-cart"> <i class="fa-solid fa-cart-shopping" ></i></span>
                                </div>
            </div>
        </div>
    </div>



    <!-- Food Item list start-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 nav-bar-col-main">
                <div class="navbar-col-2">
                    <div>
                        <h3 class="navbar-col-heading">Drinks</h3>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
    <div class="container">

        <span>
            <h4 class="content-title">Best Item in town</h4>
        </span>
        <div class="row">
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/chi-biryani.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Traul Momo</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/traul-momo.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Traul Momo</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/roti-ricecomboset.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Traul Momo</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/kimchifriedrice.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Traul Momo</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--food item  list ends here-->
    
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/mart5.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Chicken Khana Set</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/mart6.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Mutton Khana Set</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/mart3.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Veg Khana Set</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/mart4.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Roti Mutton set</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/drink1.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Chicken Khana Set</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>
                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/drink2.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Mutton Khana Set</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>

                        </div>
                        <div class="price">
                            <h5>Rs:350/-</h5>
                            <button class="add-btn">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/drink3.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Veg Khana Set</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>
                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="food-cart">
                    <div class="menu-item">
                        <img src="images/drink4.jpg" alt="" class="image-item-list" />
                    </div>
                    <div class="menu-des">
                        <h4>Roti Mutton set</h4>
                        <div class="dish-info">
                            <span class="dish-inf">dinner</span>
                            <span class="dish-inf">Launch</span>
                            <span class="dish-inf">Breakfast</span>
                        </div>

                    </div>
                    <div class="price">
                        <h5>Rs:350/-</h5>
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </div>
        </div>

        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-3">

                    <div class="food-cart">
                        <div class="menu-item">
                            <img src="images/bakery1.jpg" alt="" class="image-item-list" />
                        </div>
                        <div class="menu-des">
                            <h4>Chicken Khana Set</h4>
                            <div class="dish-info">
                                <span class="dish-inf">dinner</span>
                                <span class="dish-inf">Launch</span>
                                <span class="dish-inf">Breakfast</span>
                            </div>

                        </div>
                        <br>
                        <div class="price">
                            <h5>Rs:350/-</h5>
                            <button class="add-btn">Add</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="food-cart">
                        <div class="menu-item">
                            <img src="images/bakery2.jpg" alt="" class="image-item-list" />
                        </div>
                        <div class="menu-des">
                            <h4>Chicken Khana Set</h4>
                            <div class="dish-info">
                                <span class="dish-inf">dinner</span>
                                <span class="dish-inf">Launch</span>
                                <span class="dish-inf">Breakfast</span>
                            </div>

                        </div>
                        <br>
                        <div class="price">
                            <h5>Rs:350/-</h5>
                            <button class="add-btn">Add</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="food-cart">
                        <div class="menu-item">
                            <img src="images/bakery3.jpg" alt="" class="image-item-list" />
                        </div>
                        <div class="menu-des">
                            <h4>Chicken Khana Set</h4>
                            <div class="dish-info">
                                <span class="dish-inf">dinner</span>
                                <span class="dish-inf">Launch</span>
                                <span class="dish-inf">Breakfast</span>
                            </div>

                        </div>
                        <br>
                        <div class="price">
                            <h5>Rs:350/-</h5>
                            <button class="add-btn">Add</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">

                    <div class="food-cart">
                        <div class="menu-item">
                            <img src="images/bakery4.jpg" alt="" class="image-item-list" />
                        </div>
                        <div class="menu-des">
                            <h4>Chicken Khana Set</h4>
                            <div class="dish-info">
                                <span class="dish-inf">dinner</span>
                                <span class="dish-inf">Launch</span>
                                <span class="dish-inf">Breakfast</span>
                            </div>

                        </div>
                        <br>
                        <div class="price">
                            <h5>Rs:350/-</h5>
                            <button class="add-btn">Add</button>
                        </div>
                    </div>
                </div>
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








</body>

</html>