export default function mainMenu() {
    var navbarLeft = document.querySelector('.navbar-left'),
        siteOverlay = document.querySelector('.site-overlay'),
        hamburger = document.querySelector('#nav-icon'),
        close = document.querySelector('.closebtn'),
        itemHide = document.querySelector('.item-contact'),
        item = document.querySelector('.item');

    hamburger.addEventListener('click', function (event) {
        event.preventDefault();
        navbarLeft.classList.add('open-menu');
        siteOverlay.style.display = 'block';
    });

    close.addEventListener('click', function (event) {
        event.preventDefault();
        navbarLeft.classList.remove('open-menu');
        siteOverlay.style.display = 'none';
    });

    // item.addEventListener('click', function (event) {
    //     event.preventDefault();
    //     navbarLeft.classList.remove('open-menu');
    //     siteOverlay.style.display = 'none';
    // });

    itemHide.addEventListener('click', function (event) {
        event.preventDefault();
        navbarLeft.classList.remove('open-menu');
        siteOverlay.style.display = 'none';
    });
}