const menuButton = document.getElementById('responsive-menu-button');
const sideBar = document.getElementById('sidebar');
const responsiveOverlay = document.getElementById('responsive-menu-overlay');


menuButton.addEventListener('click',()=>{
    sideBar.classList.add('visible');
    responsiveOverlay.classList.add('visible');
});

responsiveOverlay.addEventListener('click',()=>{
    sideBar.classList.remove('visible');
    responsiveOverlay.classList.remove('visible');
});