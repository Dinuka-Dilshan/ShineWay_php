const sideNav = document.getElementById("sideNav");
const mainContent = document.getElementById("mainContent");
const sideNavButton = document.getElementById("btn-side-nav");
let isSideNavVisible = true;

sideNavButton.addEventListener("click", () => {
  if (isSideNavVisible) {
    sideNav.classList.remove("d-xl-block");
    mainContent.classList.remove("w-85");
    mainContent.classList.add("w-100");
    isSideNavVisible = false;
  }else{
    sideNav.classList.add("d-xl-block");
    mainContent.classList.add("w-85");
    mainContent.classList.remove("w-100");
    isSideNavVisible = true;
  }
});

