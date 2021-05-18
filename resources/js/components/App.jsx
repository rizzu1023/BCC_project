import React from 'react';
import Navbar from "./Navbar";
import Sidebar from "./Sidebar";
import Dashboard from "../pages/Dashboard";
import Players from "../pages/Players";
import {Route, Switch, Redirect} from 'react-router-dom';
import Tournaments from "../pages/Tournaments";
import Feedbacks from "../pages/Feedbacks";
import TournamentTeams from "../pages/TournamentTeams";
import { ToastContainer } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';




class App extends React.Component {
    render() {
        return (
            <>
                <div className="page-wrapper compact-wrapper" id="pageWrapper">
                    <Navbar/>
                    <ToastContainer/>
                    <div className="page-body-wrapper horizontal-menu">
                        <Sidebar/>
                        <Switch>
                        <Route path="/react/admin/dashboard" component={Dashboard}/>
                        <Route path="/react/admin/players" component={Players}/>
                        <Route path="/react/admin/tournament/:tournament_id/teams" component={TournamentTeams}/>
                        <Route path="/react/admin/tournament/:tournament_id/schedules" component={TournamentTeams}/>
                        <Route path="/react/admin/tournament/:tournament_id/results" component={TournamentTeams}/>
                        <Route path="/react/admin/tournament/:tournament_id/groups" component={TournamentTeams}/>
                        <Route path="/react/admin/tournament/:tournament_id/points-table" component={TournamentTeams}/>
                        <Route path="/react/admin/tournaments" component={Tournaments}/>
                        <Route path="/react/admin/feedbacks" component={Feedbacks}/>
                        <Redirect from="/" to="/react/admin/dashboard" component={Dashboard}/>
                        </Switch>
                    </div>
                </div>
            </>
        );
    }
}

export default App
