
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// import vSelect from 'vue-select'
//
// Vue.component('v-select', vSelect)

window.Dropzone = require('dropzone');
Dropzone.autoDiscover = false;


const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

window.bus = new Vue();

const app = new Vue({
    el: '#app'
});

const luna =  require('luna-sass/Framework/js/luna.js');

(function($, window, document){

    'use strict';

    $(document).Luna();

})(jQuery, window, document);
