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