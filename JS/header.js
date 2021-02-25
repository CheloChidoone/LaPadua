// Look for .hamburger
var hamburger = document.querySelector(".hamburger");

var header = document.querySelector("header");


hamburger.addEventListener("click", desactivarNav);
function desactivarNav(){
    
    hamburger.classList.toggle("is-active");

    header.classList.toggle("active-header");
}