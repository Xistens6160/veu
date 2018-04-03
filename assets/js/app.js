import '../css/app.scss';

import Vue from 'vue';

import App from '../vue/postinput.vue';
import List from '../vue/list.vue'
import Post from '../vue/post.vue'

import VueRouter from 'vue-router'


Vue.use(VueRouter);

const Main = App;
const Bloglist = List;
const Userpost = Post;


const routes = [

    { path: '/post', component: Main},
    { path: '/', component: Bloglist},
    { path: '/entry', component: Userpost}
];

const router = new VueRouter({
    routes // short for `routes: routes`
});

const vm = new Vue({
    el: '#app',
    router: router
});
