function toggleNav () {
  var nav = document.getElementById("main-nav");

  if (nav.className === "main-header") {
    nav.className += " responsive";
  } else {
    nav.className = "main-header";
  }
}
