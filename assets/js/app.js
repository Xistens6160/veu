import '../css/app.scss';

import Vue from 'vue';

// loads the jquery package from node_modules
// var $ = require('jquery');

// import the function from greet.js (the .js extension is optional)
// ./ (or ../) means to look for a local file
// var greet = require('./greet');

// $(document).ready(function() {
//     $('body').prepend('<h1>'+greet("Harun")+'</h1>');
// });

import App from '../vue/app.vue';

var vm = new Vue({
    el: '#app',
    components: {
        App
    }
})

// var title = new Vue({
//     el: '#title',
//     components: {
//        Title
//     }
// })