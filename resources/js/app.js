require('./bootstrap');

window.Vue = require('vue').default;

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
import FeatherIcon from './components/FeatherIcon.vue'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('qr_builder', require('./pages/QrBuilder.vue').default);
// Vue.component('menu_page', require('./pages/Menu.vue').default);
Vue.component('search', require('./pages/Search.vue').default);
Vue.component(FeatherIcon.name, FeatherIcon)
Vue.component('dropzone', Dropzone);



const app = new Vue({
    el: '#app',
});
