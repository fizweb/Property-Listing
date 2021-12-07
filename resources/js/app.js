
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

require('magnific-popup');
// import 'magnific-popup/dist/jquery.magnific-popup';

require('./main');
