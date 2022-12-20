import jQuery               from './vendors/jquery-2.2.4.min';
window.$ = window.jQuery = jQuery;

import preloader              from './modules/onload';
import menu                   from './modules/menu';
import animate                from './modules/animate';
import sortMenu                from './modules/sort';

class App {
    constructor () {
        preloader();
        menu();
        sortMenu();
        animate();
        this.events();
    }

    events() {
        $('a[href*="#"]').on('click', function (el) {
            el.preventDefault();
          
            $('html, body').animate({
              scrollTop: $($(this).attr('href')).offset().top - 90
            }, 500, 'linear');
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new App();
});