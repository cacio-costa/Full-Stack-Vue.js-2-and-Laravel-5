import Vue from 'vue';
import store from './store';
import router from './router';

import App from "../components/App";

var app = new Vue({
    
    el: '#app',
    render: h => h(App),
    router,
    store

});