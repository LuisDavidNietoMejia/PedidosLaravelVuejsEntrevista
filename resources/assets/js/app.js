
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import createPersistedState from 'vuex-persistedstate'
import Vue from 'vue';
import UUID from "vue-uuid";
import VModal from 'vue-js-modal';
import VueElementLoading from 'vue-element-loading';
import Multiselect from 'vue-multiselect';
import VueSingleSelect from "vue-single-select";
import VueLadda from 'vue-ladda';
import VueRouter from 'vue-router';
import router from './router';
import Index from './Index';
import Vuex from 'vuex'
import VueImageKit from 'vue-image-kit'
import VueImg from 'v-img';




Vue.use(VModal, { dynamic: true, injectModalsContainer: true });
Vue.use(UUID);
Vue.use(Vuex)
Vue.use(VueImg);
Vue.use(VueImageKit)

import auth_user_token from "./store/auth/auth_user_token";
import shopping_cart_user_food from "./store/dashboard/shopping_cart_user_food";


const store = new Vuex.Store({
    modules: {
      auth_user_token,
      shopping_cart_user_food
    },

    // enable strict mode (adds overhead!)
    // for dev mode only
    strict: process.env.DEV,
    plugins: [
      createPersistedState({
        paths: ['auth_user_token','shopping_cart_user_food'],
      }),
    ]
  })


Vue.router = router
Vue.use(VueRouter)

Vue.component('vue-ladda', VueLadda)
Vue.component('VueElementLoading', VueElementLoading);
Vue.component('multiselect', Multiselect);
Vue.component('vue-single-select', VueSingleSelect);
Vue.component('index', Index)

const app = new Vue({
    el: '#vue',
    router,
    store
});
