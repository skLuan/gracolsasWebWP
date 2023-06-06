/*** Acordeon */

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    panel.classList.toggle("active");
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}

/*** Collapsed Sidepanel */

var sidepanel = document.getElementById("sidepanel");
var overlay = document.getElementById("overlay");

function openNav() {
  sidepanel.style.width = "100%";
  sidepanel.classList.toggle("expanded");
}
  
function closeNav() {
  sidepanel.style.width = "0";
  sidepanel.classList.toggle("expanded");
}

overlay.addEventListener("click", function() {
  sidepanel.style.width = "0";
  sidepanel.classList.toggle("expanded");
});



