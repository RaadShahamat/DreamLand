<?php
// Initialize the session
  session_start();
  include "config.php";
  include "utils.php";
   

?>
<?php
if (!isset($_COOKIE['visits'])) $_COOKIE['visits'] = 0;
$visits = $_COOKIE['visits'] + 1;
setcookie('visits',$visits,time()+3600*24*365);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Inconsolata:wght@700&family=Indie+Flower&family=Merriweather:ital,wght@1,300&family=Montserrat:wght@900&family=Sacramento&family=Space+Mono&family=Ubuntu&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <title>Document</title>
  </head>
  <body>
    <section id="Home" class="top">
      <div class="top-content">
        <div class="naving">
          <div class="heading">
            <header>
              <h1><i class="fa-solid fa-d"></i>reamLand</h1>
              <ul>
                <li><a href="#About">Home</a></li>
                <li><a href="#Service">Service</a></li>
                <!-- <li><a href="#Project">Project</a></li> -->
                <li class="dropdown">
                  <a onclick="ion()" class="dropbtn">Projects</a>
                <ul id="myDropdown" class="dropdown-content">
                  <a  href="projects.php?status=Ongoing">Ongoing</a>
                  <a href="projects.php?status=Ready">Ready</a>
                  <a name="Upcoming" href="projects.php?status=Upcoming">Upcoming</a>
              </ul>
          
              </li>
                <li><a href="#Contact">Contact</a></li>
                
                  <?php 
                    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                      echo"
                        <li><a href='welcome.php' class='user'>$_SESSION[username]</a><li>
                        <li><a href='logout.php' class='triggerLogin'>Logout</a></li>
                      ";
                    }
                    else{
                      echo "
                        <li><a href='login.php' class='triggerLogin'>Login</a></li>
                        <li><a href='registration.php' class='triggerLogin'>Register</a></li>
                      ";
                    }
                  ?>
                
        
              </ul>
              <!-- <a href="#About">Home</a>
            <a href="#Service">Service</a>
            <a href="#Project">Project</a>
            <a href="#Contact">Contact</a>
            <a href="/login.php" class="logIn">LogIn</a>
            <a href="/login.php">SignUp</a> -->
            </header>
            <button><i class="fa-solid fa-bars"></i></button>
          </div>
        </div>

        <div class="sub-heading">
          <h3>Choose your dream property</h3>
        </div>

        <div class="caption">
          <h1></h1>
        </div>
        <ul class="vertical-link">
          <li class="home-link">
            <a href="#About">Home</a>
          </li>
          <li class="service-link">
            <a href="#Service">Service</a>
          </li>
          <li class="project-link">
            <a href="#Project">Project</a>
          </li>
          <li class="contact-link">
            <a href="#Contact">Contact</a>
          </li>
          <?php 
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
              echo"
              <li><a href='#'>$_SESSION[username]</a></li>
              <li><a href='logout.php' class='triggerLogin'>Logout</a></li>
               ";
               }
            else{
              echo "
                <li><a href='login.php' class='triggerLogin'>Login</a></li>
                <li><a href='registration.php' class='triggerLogin'>Register</a></li>
                ";
                }
          ?>
          
          </li>
        </ul>
      </div>
    </section>
    <div class="holding-section">
      <section id="About">
        <div class="about-content">
          <h1>Welcome to DREAMLAND</h1>
          <div class="body-wrap">
            <div class="body" id="aboutBody">
              <div class="about-body">
                <img src="images/cover.jpg" alt="" class="about-image" />
                <p>
                  DreamLand is a Professional eCommerce Platform. DreamLand
                  builds eco-friendly residential and commercial landmarks in
                  Bangladesh with exceptional architectural precision. Thus,
                  excelling in the real estate sector which is attributable to
                  the company's ability to comprehend and create extraordinary
                  landmarks. And since inception, DreamLand is ascending toward
                  creating unique addresses and bringing back greenery &
                  tranquility into the residential areas for the people.
                </p>
              </div>
              <div class="about-body">
                <img src="images/banani.jpg" alt="" class="image about-image" />
                <div class="secondary">
                  <h3>Our latest <strong>ongoing</strong> project...</h3>
                  <p>
                    <strong>Project Cost: 20 crore taka</strong> <br />
                    <br />
                    <strong> Residential Building Plan - 2400 SQ FT</strong>
                    (There are two units in the area of 2400 sq ft first-floor
                    plan. The name of the two units is A and B. "A" unit stays
                    on the north side and the "B" unit stays on the south side.)
                    <br />
                    <br />
                    <strong>Location: Banani, Dhaka</strong>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      <section id="Service">
        <div class="service-content">
          <div class="container">
            <div class="card">
              <div class="imgBx">
                <img src="images/homeloan.jpg" />
              </div>

              <div class="contentBx">
                <h2>HomeLoan</h2>

                <div class="content">
                  <p>
                    Anything you can envision, you shall have it! With a home
                    loan, you can buy the perfect house.
                  </p>
                </div>
                <a href="homeloan.php"
                  >Show More<i
                    class="fa-solid fa-arrow-right"
                    style="padding-left: 10px"
                  ></i
                ></a>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="card">
              <div class="imgBx">
                <img src="images/landowner.jpg" />
              </div>

              <div class="contentBx">
                <h2>Landowner</h2>

                <div class="content">
                  <p>
                    We provide you with a home that complements your esteemed
                    lifestyle and is constructed with the finest architectural
                    masterpiece.
                  </p>
                </div>
                <a href="landowner.php"
                  >Show More<i
                    class="fa-solid fa-arrow-right"
                    style="padding-left: 10px"
                  ></i
                ></a>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="card">
              <div class="imgBx">
                <img src="images/homeowner.jpeg" />
              </div>

              <div class="contentBx">
                <h2>buyer</h2>

                <div class="content">
                  <p>
                    DreamLand creates a comfortable and energetic living
                    environment, just for you.
                  </p>
                </div>
                <a href="owner.php"
                  >Show More<i
                    class="fa-solid fa-arrow-right"
                    style="padding-left: 10px"
                  ></i
                ></a>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="service-content">
          <a class="service-body-a" href="homeloan.php"
            ><div class="service-body img1">
              <h2>Home Loan<i class="fa-solid fa-arrow-right"></i></h2></div
          ></a>
          <a class="service-body-a" href="landowner.php"
            ><div class="service-body img2">
              <h2>Landowner<i class="fa-solid fa-arrow-right"></i></h2></div
          ></a>
          <a class="service-body-a" href="owner.php"
            ><div class="service-body img3">
              <h2>Buyer<i class="fa-solid fa-arrow-right"></i></h2></div
          ></a>
        </div> -->
      </section>
      <section id="search">
        <div class="searchbox">
          <form class="form"method="GET" action="projects.php">
        <div class="box">
        <div class="box-content">
          <select
              name="type"
              id="type" 
              onchange="populate(this.id,'type2')"
          >
            <option value="">--SELECT TYPE--</option>
            <option value="residential">Residential</option>
            <option value="commercial">Commercial</option>
            <option value="condominium">Condominium</option>
          </select>
          </div>
          <div class="box-content">
            <select name="city" id="type2">
                <option value="">--SELECT CITY--</option>
              </select>
          </div>
          <div class="box-content">
            <button class="btn" type="submit">SEARCH</button>
          </div>
          </div>
        </form>
        </div>
      </section>
      <section id="Project">
        <div class="project-topSec">
          <h1>Our ONGOING Projects</h1>
          <div class="project-wrap">
            <i class="fa-sharp fa-solid fa-angle-left fa-2x" id="backBtn"></i>
            <div class="projects">
              <div class="file">
                <div>
                  <a href="projects.php#Badda"
                    ><img class="project-img" src="images/badda.jpg" alt=""
                  /></a>
                  <div class="figurecaption">
                    <h2>RESIDENTIAL</h2>
                    <h3>Badda, DHAKA</h3>
                  </div>
                </div>
                <div>
                  <a href="projects.php#Banani"
                    ><img class="project-img" src="images/banani.jpg" alt=""
                  /></a>
                  <div class="figurecaption">
                    <h2>RESIDENTIAL</h2>
                    <h3>Banani, DHAKA</h3>
                  </div>
                </div>
                <div>
                  <a href="projects.php#Bashundhara"
                    ><img
                      class="project-img"
                      src="images/bashundhara.jpg"
                      alt=""
                  /></a>
                  <div class="figurecaption">
                    <h2>RESIDENTIAL</h2>
                    <h3>Bashundhara, DHAKA</h3>
                  </div>
                </div>
              </div>
              <div class="file">
                <div>
                  <a href="projects.php#Moghbazar"
                    ><img class="project-img" src="images/moghbazar.jpg" alt=""
                  /></a>
                  <div class="figurecaption">
                    <h2>RESIDENTIAL</h2>
                    <h3>Moghbazar, DHAKA</h3>
                  </div>
                </div>
                <div>
                  <a href="projects.php#Motijheel"
                    ><img class="project-img" src="images/motijheel.jpg" alt=""
                  /></a>
                  <div class="figurecaption">
                    <h2>RESIDENTIAL</h2>
                    <h3>Motijheel, DHAKA</h3>
                  </div>
                </div>
                <div class="view-more">
                  <a href="projects.php"
                    ><h2>View More <br><i
                    class="fa-solid fa-arrow-right"
                    style="padding-left: 10px"
                  ></i
                ></h2></a>
                </div>
              </div>
            </div>
            <i class="fa-sharp fa-solid fa-angle-right fa-2x" id="nextBtn"></i>
          </div>
        </div>
      </section>
      <section id="partner">
        <div class="partners">
          <div class="bank">
            <h1>
              <i
                class="fa-solid fa-building-columns"
                style="padding: 0 10px 10px 0"
              ></i
              >Partners
            </h1>
            <div class="bank-partners">
              <img src="images/16601410735xbMu.svg" alt="" />
              <img src="images/1660141121g21nX.svg" alt="" />
              <img src="images/1660141088N515F.svg" alt="" />
              <img src="images/1660141073n3FoS.svg" alt="" />
              <img src="images/1660141088LqKIL.svg" alt="" />
            </div>
          </div>
        </div>
      </section>
      <section id="review">
        <h1>REVIEWS</h1>
        <div class="review-container">
          <div class="review-wrapper">
            <img src="images/sadia.jpg" alt="">
            <p>sadia@gmail.com</p>
            <p class="rating"><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i></p>
            <p class="review">"Dreamland always keeps up to the commitment to their customers and also ensures the quality of their delivered projects. I would simply recommend others to choose Dreamland when buying their desired home." </p>
          </div>
          <div class="review-wrapper">
            <img src="images/robins.jpg" alt="">
            <p>robins@gmail.com</p>
            <p class="rating"><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i></p>
            <p class="review">"I loved the building’s design very much and decided instantly to take from Dreamland, and they made it very simple for me my family to own our dream home." </p>
          </div>
          <div class="review-wrapper">
            <img src="images/ifty.jpg" alt="">
            <p>ifty234@gmail.com</p>
            <p class="rating"><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i><i class="fa-sharp fa-solid fa-star" style="color: #fff700;"></i></p>
            <p class="review">"We had a fantastic experience with Dreamland. From start to end, the whole process was very efficient and professional. Their construction quality is very good and they always adhere to their commitment." </p>
          </div>
        </div>
        <div class="review-btn">show more reviews<i class="fa-sharp fa-solid fa-arrow-down"></i></div>

      </section>
      <section class="userShow">
        <div class="totalshow">
        <?php
          if ($visits > 1) {
         echo("<h2>Visitor(This Year): $visits<h2>");
          } else { // First visit
         echo('Welcome to my Website! Click here for a tour!');
          }
?>
        </div>
        
      </section>
      <section id="address-map" class="address-map">
        <div class="address-content">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.955372315926!2d90.40078097451749!3d23.748970788832718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8901fd2fc9f%3A0x16e6de1188a86d2f!2s508%20Moghbazar%20Rd%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1686677548030!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="address-body">
            <h2>
              OUR OFFICE...
            </h2>
            <p>5th floor(Nirala building), 508 moghbazar, <br> Dhaka-1217</p>
        </div>
      </section>
      
      <section id="Contact">
        <div class="contact-container">
          <div class="image-color">
            <div class="contact-body">
              <div class="title">
                <h1><i class="fa-solid fa-d"></i>reamLand</h1>
              </div>
              <div class="address">
                <h2>Call:</h2>
                <h3>
                  <i
                    class="fa-solid fa-phone"
                    style="padding: 0 10px 10px 0"
                  ></i
                  >+880-1621076161
                </h3>
                <h2>Email:</h2>
                <h3>
                  <i
                    class="fa-solid fa-envelope"
                    style="padding: 0 10px 10px 0"
                  ></i
                  >raadalif25@gmail.com
                </h3>
              </div>
              <div class="social">
                <a href="https://www.facebook.com/profile.php?id=100015500263716"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://twitter.com/raadshahahmat_1"><i class="fa-brands fa-twitter"></i></a>
                <a href="https://www.instagram.com/raad_alif/"><i class="fa-brands fa-instagram"></i></a>
              </div>
            </div>
            <div class="copyright">
              <p>©2023 DREAMLAND All Rights Reserved.</p>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="script.js"></script>
    <!-- <script>
      let v2=document.querySelector(".user");
      let x2=document.querySelector(".options");
      x2.style.display="none";
      v2.addEventListener("click",function user(){
    if(x2.style.display=="none"){
        x2.style.display="block";
    }else{
        x2.style.display="none";
    }
})
    </script> -->
    <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function ion() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

  </body>
</html>
