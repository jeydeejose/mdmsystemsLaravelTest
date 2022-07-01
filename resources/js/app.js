require('./bootstrap');

import Vue from 'vue'
window.Vue=require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('generate-voucher-component', require('./components/GenerateVoucherComponent.vue').default);
Vue.component('group-component', require('./components/GroupComponent.vue').default);

const app = new Vue({
    el: '#app'
});

