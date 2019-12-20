import Vue from 'vue';
import VueRouter from 'vue-router';
import Players from './components/Players';
import LiveScore from "./components/LiveScore";
import Accordion from "./components/Accordion";


Vue.use(VueRouter);

export default new VueRouter({
    routes : [
        { path : '/' , component : Accordion },
        { path : '/livescore' , component : LiveScore },
        { path : '/player' , component : Players },
    ],
    mode : 'history',
});

