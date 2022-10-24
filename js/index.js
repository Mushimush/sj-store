var slideIndex = 0;
let slideDuration = 4000
showSlides();

//initially set all slides to display none and all dots to be inactive, then extract one slide and dot at a time 
//and display the slide, append active to the classname of dot
//setTimeout, calls ShowSlide function after 4000 ms
function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, slideDuration); // Change image every slideDuration seconds, calls slideshow function after 4000 ms
}

function setLimit(v, target) {
  v = parseInt(v);
  v = Number.isNaN(v) ? 0 : v;
  target.value = v == 0 ? "" : v;
  document.getElementById('qty').value = v < 0 ? 1 : v;
  document.getElementById('qt2').value = v < 0 ? 1 : v;
}

function change(v) {
  let element = document.getElementById('count');
  element.value = parseInt(element.value);
  document.getElementById('qty').value = element.value;
  document.getElementById('qty2').value = element.value;
}

