
let value = window.innerWidth
let arrow = document.querySelector('.arrow-container')

let homeSec = document.querySelector('.home-section')
let aboutSec = document.querySelector('#about')
let fieldSec = document.querySelector('#fields')
let whySec = document.querySelector('#why')
let updateSec = document.querySelector('#update')
let teamSec = document.querySelector('#team')

window.addEventListener('scroll', function() {
    // navbar set active
    if(scrollY == 0 || scrollY <= homeSec.offsetHeight + homeSec.offsetTop){
        var navLists = document.querySelectorAll('.nav-item')
        for (var i = 0;i < navLists.length; i++){
            navLists[i].classList.remove('active');
        }

        document.querySelector('#home-nav').classList.add('active');
    }else if(scrollY >= aboutSec.offsetTop - 68 && scrollY <= aboutSec.offsetHeight + aboutSec.offsetTop - 68){
        var navLists = document.querySelectorAll('.nav-item')
        for (var i = 0;i < navLists.length; i++){
            navLists[i].classList.remove('active');
        }

        document.querySelector('#about-nav').classList.add('active');
    }else if(scrollY >=  fieldSec.offsetTop - 68 && scrollY <= fieldSec.offsetHeight + fieldSec.offsetTop - 68){
        var navLists = document.querySelectorAll('.nav-item')
        for (var i = 0;i < navLists.length; i++){
            navLists[i].classList.remove('active');
        }

        document.querySelector('#field-nav').classList.add('active');
    }else if(scrollY >=  whySec.offsetTop - 68 && scrollY <= whySec.offsetHeight + whySec.offsetTop - 68){
        var navLists = document.querySelectorAll('.nav-item')
        for (var i = 0;i < navLists.length; i++){
            navLists[i].classList.remove('active');
        }

        document.querySelector('#why-nav').classList.add('active');
    }else if(scrollY >=  updateSec.offsetTop - 68 && scrollY <= updateSec.offsetHeight + updateSec.offsetTop - 68){
        var navLists = document.querySelectorAll('.nav-item')
        for (var i = 0;i < navLists.length; i++){
            navLists[i].classList.remove('active');
        }

        document.querySelector('#update-nav').classList.add('active');
    }else if(scrollY >=  teamSec.offsetTop - 68 && scrollY <= teamSec.offsetHeight + teamSec.offsetTop - 68){
        var navLists = document.querySelectorAll('.nav-item')
        for (var i = 0;i < navLists.length; i++){
            navLists[i].classList.remove('active');
        }

        document.querySelector('#team-nav').classList.add('active');
    }else if(scrollY > teamSec.offsetHeight + teamSec.offsetTop - 68){
        var navLists = document.querySelectorAll('.nav-item')
        for (var i = 0;i < navLists.length; i++){
            navLists[i].classList.remove('active');
        }
    }
    
    if (scrollY > value) {
        arrow.style.opacity = 1
    } else {
        arrow.style.opacity = 0
    }
    
});