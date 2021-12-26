function toggleDarkLightModes(switchBtn, switchLnk) {
  var element = document.body;
  element.classList.toggle("dark-mode");
  switchBtn.classList.toggle("dark-mode");
  
  if (switchBtn.innerHTML === "☽ Dark Mode") {
    switchBtn.innerHTML = "☀ Light Mode";
    switchLnk.innerHTML = "☀ Light Mode";
    localStorage.setItem('darkMode', 'enabled');
  } else {
    switchBtn.innerHTML = "☽ Dark Mode";
    switchLnk.innerHTML = "☽ Dark Mode";
    localStorage.setItem('darkMode', 'disabled');
  }
}

var switchBtn = document.getElementById("dark_light_btn");
var switchLnk = document.getElementById("dark_light_lnk");

switchBtn.addEventListener('click', () => {toggleDarkLightModes(switchBtn, switchLnk)});
switchLnk.addEventListener('click', () => {toggleDarkLightModes(switchBtn, switchLnk)});

if (localStorage.getItem('darkMode') == 'enabled') {
  toggleDarkLightModes(switchBtn, switchLnk);
}
