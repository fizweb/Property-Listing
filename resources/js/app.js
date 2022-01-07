
/* import $ from 'jquery';
window.jQuery = $;
window.$ = $; */

window.$ = window.jQuery = require('jquery');
// import jQuery from 'jquery';
// window.$ = window.jQuery = jQuery;

require('./bootstrap');

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Icons
import feather from 'feather-icons/dist/feather.min';
feather.replace();

// Carousel
require('./slick.min');

// Lightbox for Image - Map - Video
require('lity/dist/lity.min');
// require('./magnific-popup.min');

require('./main');
