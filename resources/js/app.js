import './bootstrap';
import '../css/style.css'
// import 'flowbite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Handle mobile accordion menu

const openMenuButton = document.querySelector('.nav-mobile--button');
const closeMenuButton = document.querySelector('.closebtn');


openMenuButton.addEventListener('click', () => {
    document.querySelector(".overlay").style.height = "100%";
})

closeMenuButton.addEventListener('click', () => {
    document.querySelector(".overlay").style.height = "0%";
})

const accordions = document.querySelectorAll(".accordion");

accordions.forEach(accordion => {
    accordion.addEventListener('click', () => {
        accordion.classList.toggle('active');
        const submenu = accordion.nextElementSibling;
        if (submenu.style.maxHeight) {
            submenu.style.maxHeight = null;
        } else {
            submenu.style.maxHeight = submenu.scrollHeight + "px";
        } 
    })

});