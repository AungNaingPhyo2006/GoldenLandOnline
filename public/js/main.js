window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var topNumber = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= topNumber) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}

// COMMENT