
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import fontawesome from '@fortawesome/fontawesome'
import regular from '@fortawesome/fontawesome-free-regular'
import solid from '@fortawesome/fontawesome-free-solid'
import brands from '@fortawesome/fontawesome-free-brands'
mix.js('resources/assets/js/app.js', 'public/js')
    .extract([
        '@fortawesome/fontawesome',
        '@fortawesome/fontawesome-free-brands',
        '@fortawesome/fontawesome-free-regular',
        '@fortawesome/fontawesome-free-solid',
        '@fortawesome/fontawesome-free-webfonts'
    ]);
Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
