
require('./bootstrap');
window.Vue = require('vue');

// vue router
import router from './router/index'

//vue store import
import store from './store/index'


//   v-form
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form=Form;

// alert
import Swal from 'sweetalert2'
window.Swal=Swal

// moment js
import {filter} from './filter'




Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('search-component', require('./components/frontend/search').default);
Vue.component('category-component', require('./components/frontend/category').default);

const app = new Vue({
    el: '#app',
    router,
    store
});
