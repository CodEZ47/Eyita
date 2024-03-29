<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Eyita 
    </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/home-movies.css">
</head>



<body>



<!---------------------------------Header Begins-------------------------------------->
        <header>
            <nav class="nav">
                <a href="Home Page.html" class="header-logo"><img src="Resources/Images/Logos/Eyita_logo_only.png" alt="Logo"></a>
                <ul class="nav-list">
                    
                    <li class="nav-link"><a href="index.html">Home</a></li>
                    <li class="nav-link"><a href="Web Pages/MovieList.html">Movies</a></li>
                    <li class="nav-link"><a href="Web Pages/Watchlist.html">Watchlist</a></li>
                    <li class="nav-link"><a href="Web Pages/Contact Page.html">Contact Us</a></li>
                    <li class="nav-link"><a href="Web Pages/Login Page.html">Log In </a></li>
                    
                </ul>
    
                <span id="toggle"><img src="Resources/Images/icons/toggle.png"></span>
            </nav>
        </header>
<!---------------------------------Header Ends----------------------------------------->


<!---------------------------------Front Page  Begin---------------------------------------->

<div class="front-page front-paral">

    <div class="inner-header flex">
        <div class="front-head-bg">
            
        <h1><pre>Eyita 
ALL ABOUT MOVIES
                    </pre></h1>
        </div>

    </div>

</div>



<!---------------------------------Front Page  End---------------------------------------->
 
<div class="slider-paral" id="slider-body"> 
    <div class="heading"> 
        <h1>Watch Movies According to Your Taste</h1>
    </div>

<!-- -------------------------------Image Slider------------------------------------ -->

             <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="mySlides-inner-frame">
                <div class="numbertext">1 / 5</div>
                <img src="Resources/Images/MoviesList/batman1.jpeg">
                <div class="text">The Batman</div>
            </div>    
        </div>
    
        <div class="mySlides fade">
            <div class="mySlides-inner-frame">
                <div class="numbertext">1 / 5</div>
                <img src="Resources/Images/MoviesList/dune.jpeg">
                <div class="text">Dune</div>
            </div>    
        </div>
    
        <div class="mySlides fade">
            <div class="mySlides-inner-frame">
                <div class="numbertext">1 / 5</div>
                <img src="Resources/Images/MoviesList/starwar.jpeg">
                <div class="text">Starwars: The Rise of Skywalker</div>
            </div>    
        </div>

        <div class="mySlides fade">
            <div class="mySlides-inner-frame">
                <div class="numbertext">1 / 5</div>
                <img src="Resources/Images/MoviesList/interstellar.jpg">
                <div class="text">Interstellar</div>
            </div>    
        </div>

        <div class="mySlides fade">
            <div class="mySlides-inner-frame">
                <div class="numbertext">1 / 5</div>
                <img src="Resources/Images/MoviesList/inception.jpeg">
                <div class="text">Inception</div>
            </div>    
        </div>
    
        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    
    <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>
</div> 
<!-- -------------------------------Image Slider Ends-------------------------------------->     


<!-- -------------------------------Movie List----------------------------------------->     

<div id ="movie-list-container" class="movie-list-paral">

    <!--Class One-->
    <div class="wrapper">
        
        <h1>Editor's Pick</h1>
        <div class="vl">
        <div class="card">
            <img src="Resources/Images/MoviesList/dune.jpeg">
            <div class="info">
                <h1>Dune (2021)</h1>
                <p>
                    Paul Atreides, a brilliant and gifted young man born into a great destiny beyond 
                    his understanding, must travel to the most dangerous planet in the universe to 
                    ensure the future of his family and his people.
                </p>
                <a href="Web Pages/MoviePage.html" class="btn">Explore</a>
            </div>
        </div>

        <div class="card">
            <img src="Resources/Images/MoviesList/batman1.jpeg">
            <div class="info">
                <h1>The Batman (2022)</h1>
                <p>
                    Batman ventures into Gotham City's underworld when a sadistic killer leaves behind a trail of cryptic clues. 
                        As the evidence begins to lead closer to home, he must forge new relationships, unmask the culprit and 
                        bring justice to the abuse of power and corruption that has long plagued the 
                        metropolis.
                </p>
                <a href="#" class="btn">Explore</a>
            </div>
        </div>

        <div class="card">
            <img src="Resources/Images/Movie_banner/scream-2022-poster.jpg">
            <div class="info">
                <h1>Scream (2022)</h1>
                <p>
                    Twenty-five years after a streak of brutal murders shocked the quiet 
                    town of Woodsboro, Calif., a new killer dons the Ghostface mask and begins
                     targeting a group of teenagers to resurrect secrets from the town's deadly past.
                </p>
                <a href="#" class="btn">Explore</a>
            </div>
        </div>

        <div class="card">
            <img src="Resources/Images/Movie_banner/lost-city-poster.jpg">
            <div class="info">
                <h1>The Lost City (2022)</h1>
                <p>
                    While on tour promoting her new book with Alan, Loretta gets kidnapped by an eccentric 
                    billionaire who hopes she can lead him to an ancient city's lost treasure from her latest 
                    story. Determined to prove he can be a hero in real life and not just on the pages of her books, 
                    Alan sets off to rescue her.
                </p>
                <a href="#" class="btn">Explore</a>
            </div>
        </div>
        </div>

        <!--Class End-->

        <!--Class Two-->

        <h1>Coming Soon</h1>
        <div class="vl">
            <div class="card">
                <img src="Resources/Images/MoviesList/secrets-of-dumbledore-poster.jpg">
                <div class="info">
                    <h1>Fantastic Beasts: The Secrets of Dumbledore</h1>
                    <p>
                        Professor Albus Dumbledore knows the powerful, dark wizard Gellert Grindelwald
                         is moving to seize control of the wizarding world. Unable to stop him alone,
                          he entrusts magizoologist Newt Scamander...
                    </p>
                    <a href="#" class="btn">Explore</a>
                </div>
            </div>
    
            <div class="card">
                <img src="Resources/Images/MoviesList/turning-red-movie-poster.jpg">
                <div class="info">
                    <h1>Turning Red</h1>
                    <p>
                        Mei Lee is a 13-year-old girl who is torn between being her mother's obedient 
                        daughter and the chaos of her youth. As if that were not enough, when she 
                        gets too excited, she turns into a big red panda.
                    </p>
                    <a href="#" class="btn">Explore</a>
                </div>
            </div>
    
            <div class="card">
                <img src="Resources/Images/MoviesList/the-batman-poster.jpg">
                <div class="info">
                    <h1>The Batman</h1>
                    <p>
                        Batman ventures into Gotham City's underworld when a sadistic killer leaves behind a trail of cryptic clues. 
                        As the evidence begins to lead closer to home, he must forge new relationships, unmask the culprit and 
                        bring justice to the abuse of power and corruption that has long plagued the 
                        metropolis.
                    </p>
                    <a href="#" class="btn">Explore</a>
                </div>
            </div>

            <div class="spacing"></div>

            <div class="card">
                <img src="Resources/Images/MoviesList/the-northman-poster.jpg">
                <div class="info">
                    <h1>The Northman</h1>
                    <p>
                        From visionary director Robert Eggers comes THE NORTHMAN, an action-filled 
                        epic that follows a young Viking prince on his quest to avenge his father’s 
                        murder. With an all-star cast that includes Alexander Skarsgård, Nicole Kidman, 
                        Claes Bang, Anya Taylor-Joy, Ethan Hawke, Björk, and Willem Dafoe.
                    </p>
                    <a href="#" class="btn">Explore</a>
                </div>
            </div>
            </div>

    </div>
</div>
<!-- ----------------------------------Movie List Ends-----------------------------------------> 




<!---------------------------------Footer---------------------------------------------------->                       
<footer class="footer">
    <div class="l-footer">
        <h1><img src="Resources/Images/Logos/Eyita_logo.png" alt=""></h1>
    </div>
    <ul class="r-footer">
        <li>
            <h2>Social</h2>
            <ul class="box">
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Telegram</a></li>
            </ul>
        </li>
        <li class="features">
            <h2>Links</h2>
            <ul class="box h-box">
                <li><a href="MovieList.html">Movies</a></li>
                <li><a href="Login Page.html">Login</a></li>
                <li><a href="Watchlist.html">Watchlist</a></li>
                <li><a href="Contact Page.html">Contact Us</a></li>
            </ul>
        </li>
        <li>
            <h2>Legal</h2>
            <ul class="box">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Contract</a></li>
            </ul>
        </li>
    </ul>
    <div class="b-footer">
        <p>All rights reserved by ©Eyita 2021 </p>
    </div>
</footer>
<!---------------------------------Footer----------------------------------------------------> 

<!--Script-->
<script src="Script/slider.js"></script>
<script src="Script/scrollToggle.js"></script>
<!--Script-->

</body>
</html>
    

