const navItemDropHandler = (clickItemID, popDownItemID, selectColor,selectTextColor) => {
  let isClicked = true;

  const drop = document.getElementById(clickItemID);
  const previousColor = drop.style.backgroundColor;
  const previousFontColor = drop.style.color;

  //const dashboardbtn = document.getElementById('dashboardbtn');

  const dropItems = document.querySelectorAll(`#${popDownItemID}`);

  drop.addEventListener("click", () => {
    if (isClicked) {
      dropItems.forEach((dropItem) => {
        drop.style.backgroundColor = selectColor;
        drop.style.color = selectTextColor;
        dropItem.style.display = "block";
        //dashboardbtn.style.backgroundColor = '#F8F6F2';
        //dashboardbtn.style.color = '#403d38';
      });

      isClicked = false;
    } else {
      drop.style.backgroundColor = previousColor;
      drop.style.color = previousFontColor;
      dropItems.forEach((dropItem) => {
        dropItem.style.display = "none";
      });

      isClicked = true;
    }
  });
};


