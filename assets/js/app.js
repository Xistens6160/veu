import '../css/app.scss';

import Vue from 'vue';

import Postinput from '../vue/postinput.vue';
import List from '../vue/list.vue'
import Post from '../vue/post.vue'

import VueRouter from 'vue-router'


Vue.use(VueRouter);

const routes = [

    { path: '/post', component: Postinput},
    { path: '/', component: List},
    { path: '/entry', component: Post}
];

const router = new VueRouter({
    routes // short for `routes: routes`
});

const vm = new Vue({
    el: '#app',
    router: router
});
