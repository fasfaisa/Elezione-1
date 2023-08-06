let menuOpen = false;
const menuSettings = (e) => {
  const MENU = document.getElementById("menu");
  const element = document.documentElement.classList;
  if (menuOpen) {
    MENU.classList.remove("right-0");
    MENU.classList.add("-right-80");
    menuOpen = false;
    element.remove("overflow-y-hidden");
    e.target.innerHTML = "menu";
  } else {
    MENU.classList.remove("-right-80");
    MENU.classList.add("right-0");
    menuOpen = true;
    e.target.innerHTML = "close";
    element.add("overflow-y-hidden");
  }
};
