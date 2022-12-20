export default function preloader() {
    window.onload = function() {
        var html = document.querySelector('html'),
            el = document.querySelector('.preloader');
        el.style.display = 'none';
        html.style.overflowY = 'scroll';
        html.style.overflowX = 'hidden';
    };
}