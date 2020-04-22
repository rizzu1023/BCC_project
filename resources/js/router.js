import Vue from 'vue';
import VueRouter from 'vue-router';
import Players from './components/Players';
import LiveScore from "./components/LiveScore";
import Tournament from "./components/Tournament";
import Accordion from "./components/Accordion";
import Team from "./components/Team";
import Stats from "./components/Stats";
import TournamentDetail from "./components/TournamentDetail";
import Batting from "./components/Batting";
import Bowling from "./components/Bowling";
import PlayerDetail from "./components/PlayerDetail";
import StatsDetail from "./components/StatsDetail";
import MatchDetail from "./components/MatchDetail";
import PointsTable from "./components/PointsTable";
import Schedule from "./components/Schedule";
import MatchInfo from "./components/MatchInfo";
import LiveMatch from "./components/LiveMatch";
import Scorecard from "./components/Scorecard";
import MatchOvers from "./components/MatchOvers";
import PlayerInfo from "./components/PlayerInfo";
import PlayerBatting from "./components/PlayerBatting";
import PlayerBowling from "./components/PlayerBowling";
import Result from "./components/Result";


Vue.use(VueRouter);

let TeamDetail;
export default new VueRouter({
    routes : [
        { path : '/' , component : Tournament },
        // { path : '/livescore' , component : LiveScore },
        { path : '/player' , component : Players },
        { path : '/player/:player_id' , component : PlayerDetail ,
            children : [
                { path : 'info', component : PlayerInfo },
                { path : 'batting', component : PlayerBatting },
                { path : 'bowling', component : PlayerBowling },
            ]
        },
        { path : '/team' , component : Team },
        { path : '/teams/:team/players' , component : Players },
        { path : '/tournament' , name : 'Tournament',component : Tournament },

        { path : '/tournament/:tournament_id' , name : 'TournamentDetail', component : TournamentDetail ,
            children : [
                { path: 'schedule', name : 'Schedule',component : Schedule },
                { path: 'result', name : 'result',component : Result },
                { path: 'teams', name : 'Team', component : Team},
                { path: 'stats', name : 'Stats',component : Stats},
                { path: 'pointsTable', name : 'PointsTable',component : PointsTable},
            ]
        },

        { path : '/tournament/:tournament_id/match/:match_id/:team1_id/:team2_id' , name : 'MatchDetail',component : MatchDetail,
            children : [
                { path : 'info', name : 'MatchInfo',component: MatchInfo },
                { path : 'live', name : 'LiveMatch',component: LiveMatch },
                { path : 'scorecard', name : 'Scorecard',component: Scorecard },
                { path : 'overs', name : 'MatchOvers',component: MatchOvers },
            ]
        },
        { path : '/stats/:tournament_id/:type', component : StatsDetail },
        // { path : '/tournament/detail/teams' , component : Accordion },
        // { path : '/tournament/detail/schedule' , component : Bowling },
    ],

    mode : 'history',
});


