import Vue from 'vue';
import routes from './router';
import axios from 'axios';
import Accordion from "./components/Accordion";
import ExampleComponent from "./components/ExampleComponent";
import LiveScore from "./components/LiveScore";

Vue.component('Accordion', require('./components/Accordion.vue').default);
Vue.component('ExampleComponent', require('./components/ExampleComponent').default);



require('./bootstrap');


const app = new Vue({
    el: '#app',

    component : {
        ExampleComponent,
        LiveScore,
    },

    router : routes,
});

