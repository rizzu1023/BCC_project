import Vue from 'vue';
import VueRouter from 'vue-router';
import Players from './components/Players';
import LiveScore from "./components/LiveScore";
import Accordion from "./components/Accordion";
import Team from "./components/Team";
import Batting from "./components/Batting";
import Bowling from "./components/Bowling";


Vue.use(VueRouter);

export default new VueRouter({
    routes : [
        { path : '/' , component : Accordion },
        { path : '/livescore' , component : LiveScore },
        { path : '/player' , component : Players },
        { path : '/team' , component : Team },
        { path : '/batting' , component : Batting },
        { path : '/bowling' , component : Bowling },
    ],
    mode : 'history',
});

