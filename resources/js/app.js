import Vue from 'vue';
import routes from './router';
import axios from 'axios';
import Accordion from "./components/Accordion";
import ExampleComponent from "./components/ExampleComponent";
import LiveScore from "./components/LiveScore";
import { Form, HasError, AlertError } from 'vform'
import Players from "./components/Players";
import Swal from 'sweetalert2'

window.Swal = Swal;
window.form = Form;

// sweet alert
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast = Toast;



Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

Vue.component('Accordion', require('./components/Accordion.vue').default);
Vue.component('ExampleComponent', require('./components/ExampleComponent').default);
Vue.component('Players', require('./components/Players').default);



require('./bootstrap');


const app = new Vue({
    el: '#app',

    component : {
        ExampleComponent,
        LiveScore,
        Players,
    },

    router : routes,
});

