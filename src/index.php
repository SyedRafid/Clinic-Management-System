
<?php
include_once('cms/include/config.php');
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='index.php'</script>";
} 
?>
<!doctype html>
<html lang="en">

<head>
    <link rel="icon" href="assets/images/icon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Doctor Sirajul Islam Clinic </title>
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawsom-all.min.css">
     <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="icon" href="assets/images/icon.png">
</head>

    <body>

    
      <header id="menu-jk">
        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3  col-sm-12" style="color:#000;font-weight:bold; font-size:42px; margin-top: 1% !important;">CMS
                       <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li></li> 
                        </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block appoint">
                        <a class="btn btn-success" href="cms/login.php">Login</a>
                        <a class="btn btn-success" href="cms/registration.php">Sign Up</a>
                    </div>
                </div>

            </div>
        </div>
    </header>
    

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            </ol>
              
                <div class="carousel-item active">
                    <img class="d-block w-100" src="assets/images/kola.png" alt="Third slide">
                      <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">Welcome to</h5>
                        <h5 class="animated bounceInDown">Doctor Sirajul Islam Clinic</h5>    
                    </div>
                </div>
    </div>


    <section id="logins" class="our-blog container-fluid">        
    </section>  



    <section id="services" class="key-features department">
        <div class="container">
            <div class="inner-title">
                <h2>Our Key Features</h2>
                <p>Take a look at some of our key features</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-heartbeat"></i>
                        <h5>Cardiology</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-ribbon"></i>
                        <h5>Orthopaedic</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                       <i class="fab fa-monero"></i>
                        <h5>Neurologist</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-capsules"></i>
                        <h5>Pharma Pipeline</h5>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <h5>Pharma Team</h5>
                    </div>
                </div>



                <div class="col-lg-4 col-md-6">
                    <div class="single-key">
                        <i class="far fa-thumbs-up"></i>
                        <h5>High Quality treatments</h5>

                    </div>
                </div>
            </div>






        </div>

    </section>
    
    
        
    <section id="about_us" class="about-us">
        <div class="row no-margin text-center">
        <div class="col-sm">
        <h3>About Our Clinic</h3>
        </div>
        <p>At Doctor Sirajul Islam Clinic, we are committed to providing high-quality healthcare services to the community of Bangladesh. With a strong focus on patient care, we strive to deliver personalized and comprehensive medical solutions to meet the diverse healthcare needs of our patients. Our clinic is dedicated to combining the latest advancements in medical technology with a compassionate and patient-centered approach.
             Established with the aim of improving healthcare accessibility and enhancing patient outcomes, our clinic offers a wide range of medical services across various specialties. Our team consists of experienced and skilled healthcare professionals, including doctors, nurses, technicians, and support staff, who are dedicated to delivering exceptional care to our patients. Our clinic is equipped with state-of-the-art facilities and modern medical equipment to ensure accurate diagnoses, effective treatments, and optimal patient care.
              We maintain stringent quality standards and follow evidence-based practices to deliver the highest level of medical care. Patient safety and comfort are of utmost importance to us, and we strive to create a welcoming and reassuring environment for all our patients. We believe that by working together with the community, we can create a healthier and happier society. We are proud to be a part of the healthcare landscape in Bangladesh and contribute to the betterment of healthcare services in the country. Our mission is to make 
              a positive impact on the lives of our patients by providing them with comprehensive, compassionate, and accessible healthcare. </p>
        </div>
    </section>    
    <br>
   
    <section id="contact_us" class="contact-us-single">
        <div class="row no-margin">

            <div  class="col-sm-12 cop-ck">
                <form method="post">
                <h2 >Contact Form</h2>
                    <div class="row cf-ro">
                        <div  class="col-sm-3"><label>Enter Name :</label></div>
                        <div class="col-sm-8"><input type="text" placeholder="Enter Name" name="fullname" class="form-control input-sm" required ></div>
                    </div>
                    <div  class="row cf-ro">
                        <div  class="col-sm-3"><label>Email Address :</label></div>
                        <div class="col-sm-8"><input type="text" name="emailid" placeholder="Enter Email Address" class="form-control input-sm"  required></div>
                    </div>
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label>Mobile Number:</label></div>
                        <div class="col-sm-8"><input type="text" name="mobileno" placeholder="Enter Mobile Number" class="form-control input-sm" required ></div>
                    </div>
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label>Enter  Message:</label></div>
                        <div class="col-sm-8">
                          <textarea rows="5" placeholder="Enter Your Message" class="form-control input-sm" name="description" required></textarea>
                        </div>
                    </div>
                     <div  class="row cf-ro">
                        <div  class="col-sm-3"><label></label></div>
                        <div class="col-sm-8">
                         <button class="btn btn-success btn-sm" type="submit" name="submit">Send Message</button>
                        </div>
                </div>
            </form>
            </div>
     
        </div>
    </section>
    <br>
    <br>


    <footer class="footer">
            <div class="text-left">
         © 2003-2023 Doctor Sirajul Islam Clinic All rights reserved.
            </div>
            <br>
        </div>
    </footer>
   
    
    </body>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="assets/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>

<script src="assets/js/script.js"></script>



</html>