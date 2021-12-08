
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

require('./slick.min');
require('./magnific-popup');

require('./main');
