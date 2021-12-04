function toggleDarkLightModes(switchBtn) {
  var element = document.body;
  element.classList.toggle("dark-mode");
  switchBtn.classList.toggle("dark-mode");
  
  if (switchBtn.innerHTML === "Dark Mode") {
    switchBtn.innerHTML = "Light Mode";
    localStorage.setItem('darkMode', 'enabled');
  } else {
    switchBtn.innerHTML = "Dark Mode";
    localStorage.setItem('darkMode', 'disabled');
  }
}

var switchBtn = document.getElementById("dark_light_btn");
switchBtn.addEventListener('click', () => {toggleDarkLightModes(switchBtn)});

if (localStorage.getItem('darkMode') == 'enabled') {
  toggleDarkLightModes(switchBtn);
}
