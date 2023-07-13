let menuOpen = false;
const menuSettings = (e) => {
    const MENU = document.getElementById("menu");
    if (menuOpen) {
        MENU.classList.remove("right-0");
        MENU.classList.add("-right-80");
        menuOpen = false;
        e.target.innerHTML = "menu";
    } else {
        MENU.classList.remove("-right-80");
        MENU.classList.add("right-0");
        menuOpen = true;
        e.target.innerHTML = "close";
    }
};