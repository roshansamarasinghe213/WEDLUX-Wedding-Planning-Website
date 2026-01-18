<?php
// Start the session
session_start();

// Check if the user is not logged in, redirect them to the login page
if (!isset($_SESSION['User_ID'])) {
    header("Location: login.html"); // Change 'login.php' to your actual login page
    exit();
}
// Rest of your page content goes here
?>
<!DOCTYPE html>
<html>
<head>
    <title>WEDLUX</title>
    <link rel="icon" type="image/x-icon" href="home_IMG/C_logo2.png">

        <link rel="stylesheet" href="profesional_profile.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

        <!-- Footer icons link -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- JavaScript -->
        <script src="prof_script.js" defer></script>
        
</head>
<body>
<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wedlux";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Manually specify the Prof_ID for editing (replace with your desired ID)
$profId = 2; // Replace with the actual Prof_ID

// Use prepared statement to avoid SQL injection
$stmt = $conn->prepare("SELECT * FROM professionals WHERE Prof_ID = ?");
$stmt->bind_param("i", $profId); // Assuming Prof_ID is an integer
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Close the database connection
    $stmt->close();
    $conn->close();

    // Rest of your code for displaying and processing the data goes here

} else {
    echo "No records found for the specified Prof_ID";
    // Close the database connection
    $stmt->close();
    $conn->close();
}
?>

    <!----Header_Section----->

    <div class="menu_bar">
        <nav>
        <div class="logo">
            <img src="home_IMG/C_logo3.png" alt="">
        </div>
        <ul>
            <li><a href="homes.php">Home</a></li>
            <li><a href="aboutUs.html">About us</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="#">More</a>
                <div class="dropdown_menu">
                <ul>
                    <li><a href="portfolios.html">Portfolio</a></li>
                    <li><a href="professionals.html">Professionals</a></li>
                    <li><a href="GetInTouch.html">Contact</a></li>
                </ul>
                </div>
            </li>
            <li><a href="signup.html">Sign up</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
        </nav>
    </div>
    <!----Pofesional_profile_Section----->



<!----Personal details----->
    <div class="header_wraper">
        <header></header>
        <div class="cols_container">
            <div class="left_col">
                <div class="img_container">
                    <img src="Images\profImg\images.jpeg" alt="">
                    <span></span>
                    
                </div>
                <div class="right_col">
                        <h2><?php echo $row['Prof_Fname'] . ' ' . $row["Prof_Lname"]; ?></h2>
                        <p><?php echo $row["Prof_Jobrole"]; ?></p><br>
                        <p><?php echo $row["Prof_Email"]; ?></p>
                        

                </div>
                

                        <ul class="about">
                            <li><span><i class="fa fa-heart" style="font-size:20px;color:red"></i>512</span>likes</i></li>
                            <li><span>1015</span>Attractions</li>
                            <div class="about2">
                                <li>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span> 
                                    <p>Ratings</p>   
                                
                                </li>
                            </div>
                           
                        </ul>
                        

                            <div class="content">
                              <p><?php echo $row["Prof_BIO"]; ?></p>
                                    <div class="footer-icons">

                                      <a href=""><i class="fa-brands fa-facebook"></i></a>
                                      <a href=""><i class="fa-brands fa-instagram"></i></a>
                                      <a href=""><i class="fa-brands fa-x"></i></a>
                                      <a href=""><i class="fa-brands fa-google-plus"></i></a>
                                      <a href=""><i class="fa-brands fa-youtube"></i></a>
                                      
                                
                                    </div>
                            </div>

                
            </div>
        </div>
    </div>
    <hr>

    <!----Contact_details----->
<section class="contactSec">
  <div class="split left">
    <div class="contact">
      <h1> Contact Details </h1>
      <p>109/B Main School Colombo 07,Sri Lanka</p>
      <p>Telephone: <?php echo $row["Prof_PhoneNumber"]; ?></p>
      <p>Email: <?php echo $row["Prof_Email"]; ?></p>
    </div> 
  </div>

  <div class="split right">
    <h2 style="text-align:center;">Set an Appointment</h2>

    <form action="appointment.php" method="POST" enctype="multipart/form-data">
    <input type="date" id="Appo_Date" name="Appo_Date" placeholder="Appointment Date*" required>
    <!-- Add a hidden input to store the payment status -->
    <input type="hidden" name="payment_status" value="0">
    <input name="send" class="btn" id="edit_button" type="submit" value="Pay Me">
    </form>


  </div>
</section>




      

      <!------------My experience section-->
      <div class="container">
        <div class="slider-wrapper">
          <button id="prev-slide" class="slide-button material-symbols-rounded">
            chevron_left
          </button>
          <h1>My experience</h1>
          <ul class="image-list">
            <img class="image-item" src="prof_IMG/New folder/img10.jpg" alt="img-1" />
            <img class="image-item" src="prof_IMG/New folder/img11.jpg" alt="img-2" />
            <img class="image-item" src="prof_IMG/New folder/img12.jpg"alt="img-3" />
            <img class="image-item" src="prof_IMG/New folder/img13.jpg" alt="img-4" />
            <img class="image-item" src="prof_IMG/New folder/img15.jpg" alt="img-5" />
            <img class="image-item" src="prof_IMG/New folder/img7.jpg"alt="img-6" />
            <img class="image-item" src="prof_IMG/New folder/img8.jpg" alt="img-7" />
           
          </ul>
          <button id="next-slide" class="slide-button material-symbols-rounded">
            chevron_right
          </button>
        </div>
        <div class="slider-scrollbar">
          <div class="scrollbar-track">
            <div class="scrollbar-thumb"></div>
          </div>
        </div>
      </div>

      <!----------My recomendation------------->

      <div class="wrapper">
        <h1>My recomendations</h1>
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
          <li class="card">
            <div class="img"><img src="home_IMG/img1z.jpg" alt="img" draggable="false"></div>
            <h2>Shangri~La </h2>
            <span>Hotel</span>
          </li>
          <li class="card">
            <div class="img"><img src="home_IMG/img3z.jpg" alt="img" draggable="false"></div>
            <h2>Namal Balachandra</h2>
            <span>Costume Design</span>
          </li>
          <li class="card">
            <div class="img"><img src="home_IMG/img2z.png" alt="img" draggable="false"></div>
            <h2>Hilton</h2>
            <span>Hotel</span>
          </li>
          <li class="card">
            <div class="img"><img src="home_IMG/img4.png" alt="img" draggable="false"></div>
            <h2>Lassana</h2>
            <span>Decorations</span>
          </li>
          <li class="card">
            <div class="img"><img src="home_IMG/img5z.jpg" alt="img" draggable="false"></div>
            <h2>LIYO </h2>
            <span>Salon</span>
          </li>
          <li class="card">
            <div class="img"><img src="home_IMG/img6z.jpg" alt="img" draggable="false"></div>
            <h2>Delon Caters</h2>
            <span>Catering Service</span>
          </li>
          <li class="card">
            <div class="img"><img src="home_IMG/img7z.jpg" alt="img" draggable="false"></div>
            <h2>Infinity</h2>
            <span>Bands</span>
          </li>
          <li class="card">
            <div class="img"><img src="home_IMG/img8z.jpg" alt="img" draggable="false"></div>
            <h2>Ceylon Wedlock</h2>
            <span>photography and videography</span>
          </li>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i>
      </div>

      



      
         <!-----------Footer------------------>

         <footer class="footer-distributed">

        
    
            <div class="footer-left">
                <img src="home_IMG/C_logo3.png" alt="">
        
              <div>
                <i class="fa fa-map-marker"></i>
                <p><span>44/116 Main Street</span> Colombo 04,Sri Lanka</p>
              </div>
        
              <div>
                <i class="fa fa-phone"></i>
                <p>+94 112 112 000</p>
              </div>
        
              <div>
                <i class="fa fa-envelope"></i>
                <p><a href="wedlux.pvt.ltd@gmail.com">wedlux.pvt.ltd@gmail.com</a></p>
              </div>
        
            </div>
    
            <div class="footer-center">
        
                
          
                <p class="footer-links">
                  
                  <a href="homes.php" class="link-1">Home</a>
                  <a href="aboutUs.html">About Us</a>
                  <a href="">Services</a>
                  <a href="portfolios.html">Portfolio</a>
                  <a href="signup.html">Sign Up</a>
                  <a href="GetInTouch.html">Contact</a>
                
                </p>
          
                
              </div>
        
            <div class="footer-right">
        
              <p class="footer-company-about">
                <span>About the company</span>
                Welcome to Wedlux, where dreams become unforgettable experiences. With a focus on love, joy, and special moments, we pride ourselves as your dedicated event management partner. Count on us to curate exceptional experiences aligned with your unique vision.
              </p>
        
              <div class="footer-icons">
        
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-x"></i></a>
                <a href=""><i class="fa-brands fa-google-plus"></i></a>
                <a href=""><i class="fa-brands fa-youtube"></i></a>
                
        
              </div>
        
            </div>
    
            <div class="copy_right_p">
                <p >&copy; 2023 Wedlux. All rights reserved.</p>
            </div>
    
            
            
        
          </footer>
   
      
      
      
</body>

</html>








      
