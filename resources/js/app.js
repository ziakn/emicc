require('./bootstrap');
window.Vue = require('vue');
import vuetify from './plugins/vuetify' // path to vuetify export

import i18n from './i18n';
import common from './common';

Vue.mixin(common);
// import 'babel-polyfill';
require('es6-object-assign').polyfill();
require('es6-promise').polyfill();
router.afterEach((to, from) => {
    Vue.nextTick(() => {
        document.title = to.meta.title ? to.meta.title : 'Emicc';
    });
})

import router from './router'
import store from './store'
Vue.component('z-dashboard', require('./components/ExampleComponent.vue').default);
const app = new Vue({
    el: '#app',
    vuetify,
    i18n,
    router,
    store: store,
});