import Vue from 'vue';
import VueRouter from 'vue-router';
import Players from './components/Players';
import LiveScore from "./components/LiveScore";
import Tournament from "./components/Tournament";
import Accordion from "./components/Accordion";
import Team from "./components/Team";
import TournamentDetail from "./components/TournamentDetail";
import Batting from "./components/Batting";
import Bowling from "./components/Bowling";
import PlayerDetail from "./components/PlayerDetail";
import StatsDetail from "./components/StatsDetail";
import MatchDetail from "./components/MatchDetail";


Vue.use(VueRouter);

let TeamDetail;
export default new VueRouter({
    routes : [
        { path : '/' , component : Tournament },
        // { path : '/livescore' , component : LiveScore },
        { path : '/player' , component : Players },
        { path : '/player/:player_id' , component : PlayerDetail },
        { path : '/team' , component : Team },
        { path : '/teams/:team/players' , component : Players },
        // { path : '/tournament' , component : Tournament },
        { path : '/tournament/:tournament_id' , component : TournamentDetail },
        { path : '/tournament/:tournament_id/match/:match_id/:team1_id/:team2_id' , component : MatchDetail },
        { path : '/stats/:tournament_id/:type', component : StatsDetail },
        // { path : '/tournament/detail/teams' , component : Accordion },
        // { path : '/tournament/detail/schedule' , component : Bowling },
    ],
    mode : 'history',
});

