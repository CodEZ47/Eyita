<footer class="footer">
        <div class="l-footer">
            <h1><img src="../Resources/Images/Logos/Eyita_logo.png" alt=""></h1>
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

<script>
    window.addEventListener('scroll', function () {
    let header = document.querySelector('header');
    let windowPosition = window.scrollY > 0;
    header.classList.toggle('scrolling-active', windowPosition);
    })

    const toggle = document.getElementById('toggle');
    const links = document.getElementsByClassName('nav-list')[0];

    toggle.addEventListener('click', function(){
        links.classList.toggle('active');
    })
</script>

</body>
</html>