var botonMenu = document.getElementById('btn-menu');
var menuDesplegable = document.getElementById('menu-desplegable');
var menuVisible = false;

botonMenu.addEventListener('click', function (event) {
    event.preventDefault();

    if (!menuVisible) {
        menuDesplegable.style.display = 'flex';
        menuVisible = true;
    } else {
        menuDesplegable.style.display = 'none';
        menuVisible = false;
    }
});