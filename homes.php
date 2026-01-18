<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wedlux</title>
    <link rel="icon" type="image/x-icon" href="home_IMG/C_logo2.png">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="home.js" defer></script>
    <script src="js/main.js" defer></script>


</head>
<body>
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
              <?php
      // Start the session to access session variables
      session_start();

      // Check if the user is logged in
      function isUserLoggedIn() {
          // Add your authentication logic here
          // For example, you might check if a session variable is set
          return isset($_SESSION['Prof_ID']);
      }

      // Check if the user is logged in
      $userLoggedIn = isUserLoggedIn();

      // Display the profile edit button only if the user is logged in
      if ($userLoggedIn) {
          echo '<li><a href="Profesional_profile.php"><i class="fas fa-user"></i></a></li>';
      }
                    ?>
    </ul>
    </nav>
</div>
   
    <div class="slide-container">
        <div class="slides">
            <img src="home_IMG/slide1.jpg" class="active">            <img src="home_IMG/slide2.jpg"class="active">
            <img src="home_IMG/slide3.jpeg"class="active">
            <img src="home_IMG/slide4.jpg"class="active">
            <img src="home_IMG/slide5.jpg"class="active">
            <img src="home_IMG/slide6.jpg"class="active">
            <img src="home_IMG/slide7.jpg"class="active">
        </div>
        <div class="buttons">
            <span class="next">&#10095;</span>
            <span class="prev">&#10094;</span>
        </div>
        <div class="dotsContainer">
            <div class="dot active" attr='0' onclick="switchImage(this)"></div>
            <div class="dot" attr='1' onclick="switchImage(this)"></div>
            <div class="dot" attr='2' onclick="switchImage(this)"></div>
            <div class="dot" attr='3' onclick="switchImage(this)"></div>
            <div class="dot" attr='4' onclick="switchImage(this)"></div>
            <div class="dot" attr='5' onclick="switchImage(this)"></div>
            <div class="dot" attr='6' onclick="switchImage(this)"></div>
        </div>
    </div>

   
        <div class="class_container">
            <div class="how-we-work">
                <h2>How We Work</h2>
                <p>Welcome to our unique and personalized wedding planning experience! At WEDLUX, we believe in simplifying the journey to your special day. Our process begins with a collaborative exploration of your wedding vision, where couples and professional vendors come together seamlessly on our platform. Couples can effortlessly browse curated wedding packages, discover the latest trends, and allocate their budget with our intuitive planning tools. Connecting with passionate professionals is just a click away, ensuring a stress-free and enjoyable planning experience. With secure payment options and a transparent fee structure, we facilitate seamless transactions, empowering you to bring your dream wedding to life. At WEDLUX, we're not just a platform; we're your dedicated partner in creating unforgettable moments.</p>
                <a href="services.html" class="learn-more-btn">Learn More</a>
            </div>
    
            <div class="our-partners">
                <h2>Our Partners</h2>
                <div class="partner-logos">
                    <figure>
                        <img src="home_IMG/img1z.jpg" alt="Partner 1" class="partner-logo">
                    </figure>
                
                    <figure>
                        <img src="home_IMG/img2z.png" alt="Partner 2" class="partner-logo">
                    </figure>
                
                    <figure>
                        <img src="home_IMG/img3z.jpg" alt="Partner 3" class="partner-logo">
                    </figure>

                    <figure>
                        <img src="home_IMG/img4.png" alt="Partner 4" class="partner-logo">
                    </figure>

                    <figure>
                        <img src="home_IMG/img5z.jpg" alt="Partner 5" class="partner-logo">
                    </figure>

                    <figure>
                        <img src="home_IMG/img7z.jpg" alt="Partner 6" class="partner-logo">
                    </figure>
                
                    
                </div>
                
            </div>
    
            <div class="who-are-we">
                <h2>Who We Are</h2>
                <div class="who-text">
                    <img src="home_IMG/C_logo2.png" alt="">
                    <p>Welcome to WEDLUX, where passion meets innovation in the world of wedding planning. We are a dedicated team of experienced professionals committed to transforming your wedding dreams into reality. With a client-centric approach, we blend creativity and cutting-edge technology to simplify the planning process. At WEDLUX, we believe in the uniqueness of every love story, offering a platform that celebrates diversity and fosters collaboration between couples and top-notch professionals. Backed by the esteemed legacy of WEDLUX, we bring you a trusted and innovative space to embark on your wedding journey. Join us and let your love story take center stage.</p>
                </div>
                </div>
    
            <div class="company-updates">
                <div class="company-div">
                    <h2>Company Updates</h2>
                    <a href="aboutus.html" class="learn-more-btn">Learn More</a>
                </div>


                <!-- slide show -->
                <section class="card-list">
                    <article class="card" id="card1">
                      <div class="tags">   
                    </article>
              
              
              
                    <article class="card" id="card2">
                        
                        <div class="tags"> 
                        </div>
                      </article>
              
              
              
              
                    <article class="card" id="card3">
                      
                      <div class="tags">
                        
                      </div>
                    </article>
              
                    <article class="card" id="card4">
                      
                      <div class="tags">
                        
                      </div>
                    </article>
              
              
                    <article class="card" id="card5">
                      
                      <div class="tags">
                        
                      </div>
                    </article>
              
                    <article class="card" id="card6">
                      
                      <div class="tags"></div>
                        
                    </article>
              
                    <article class="card" id="card7">
                        
                      </div>
                      <div class="tags">
                        
                      </div>
                    </article>
              
              
              
                </section>
            </div>

       

   <!-- -----------------------------chat bot---------------------------- -->


   <button class="chat-btn" onclick="openbot()"><img src="imgbot1.png"></button>
    

   <div class="chat-form" id="chatfrom">
       
       <div class="bot_container">
              
           <div class="bot_media">
               <img src="imgbot1.png" alt="">

               <div class="bot_media_body">
                   <span style="color: #fff; font-size: 30px;"><b>WedLux Chat Bot</b></span>
                   <span style="color: #33f837;">Online</span>
               </div>
           </div>

           <!-------------Masseag container-------------------->

           <div id="chatcontainer" class="container border maseg_container">
               <!-- <div class="botM w-50 shadow-sm"  >
                   <span><b>Chat:</b></span>
                   <span >hi there.. its wedlux Bot. How can i help you?</span>
               </div> -->
       
           
               <!-- <div class="UserM w-50 shadow-sm" >
                       <span>You:</span>
                       <span>I'm fine thank you?</span>
               </div>  -->

           </div>

           <div class="input-group" >
                   <input id="textbox" type="text" class="from-control">

                   <div class="input-group-append">
                       <button id="sendBtn" type="button" class="btn btn-primary">Send</button>
                       <button type="button" class="btn btn-primary" onclick="closebot()">Close</button>
                   </div>
           </div>

           
       </div>

       

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



