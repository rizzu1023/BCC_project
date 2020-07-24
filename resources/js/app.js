import Vue from 'vue';
import routes from './router';
import axios from 'axios';
import Accordion from "./components/Accordion";
import ExampleComponent from "./components/ExampleComponent";
import TournamentDetail from "./components/TournamentDetail";
import LiveScore from "./components/LiveScore";
import { Form, HasError, AlertError } from 'vform'
import Players from "./components/Players";
import Swal from 'sweetalert2'
import Team from "./components/Team";
import Batting from "./components/Batting";
import Bowling from "./components/Bowling";
import Tournament from "./components/Tournament";
import VueRouter from "vue-router";

window.Swal = Swal;
window.form = Form;

window.Event = new Vue();

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
Vue.component('Team', require('./components/Team').default);
Vue.component('Batting', require('./components/Batting').default);
Vue.component('Bowling', require('./components/Bowling').default);

Vue.prototype.$header_string = 'Cricify';


// Vue.prototype.$domainName = 'http://localhost:8000/api/';
Vue.prototype.$domainName = 'http://3.7.68.148/api/';



require('./bootstrap');

// const router = new VueRouter({
//     router : routes,
// });
//
// routes.beforeEach((to,from,next) => {
//     if(to.name === 'Schedule' && (from.name === 'Team' || from.name === 'Stats' || from.name === 'PointsTable')){
//         next({ name: 'Tournament' });
//     }
//     if(to.name === 'Team' && (from.name === 'Schedule' || from.name === 'Stats' || from.name === 'PointsTable')){
//         next({ name: 'Tournament' });
//     }
//     else next();
// });
Vue.mixin({
    methods: {
        makeTitle: function (el,func) {
                console('hello');
        },
    }
});



const app = new Vue({
    el: '#app',

    methods : {
        clicked() {
            // alert('clicked');
            routes.go(-1)
        }
    },

    component : {
        ExampleComponent,
        TournamentDetail,
        Tournament,
        LiveScore,
        Players,
        Team,
        Batting,
        Bowling,
    },

    router : routes,

    data: {

    }
});
