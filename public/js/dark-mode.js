function toggleDarkLightModes(switchBtn, switchLnk) {
  var element = document.body;
  var mainLogo = document.getElementById("main-logo");

  element.classList.toggle("dark-mode");
  switchBtn.classList.toggle("dark-mode");
  
  if (switchBtn.innerHTML === "🌛︎ Dark Mode") {
    switchBtn.innerHTML = "🌞︎ Light Mode";
    switchLnk.innerHTML = "🌞︎ Light Mode";
    mainLogo.src="/assets/png/logo1-dark.png";
    localStorage.setItem('darkMode', 'enabled');
  } else {
    switchBtn.innerHTML = "🌛︎ Dark Mode";
    switchLnk.innerHTML = "🌛︎ Dark Mode";
    mainLogo.src="/assets/png/logo1.png";
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
