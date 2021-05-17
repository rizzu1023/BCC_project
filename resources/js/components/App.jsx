import React from 'react';
import Navbar from "./Navbar";
import Sidebar from "./Sidebar";
import Dashboard from "../pages/Dashboard";
import Players from "../pages/Players";
import {Route, Switch, Redirect} from 'react-router-dom';
import Tournaments from "../pages/Tournaments";
import Feedbacks from "../pages/Feedbacks";
import TournamentTeams from "../pages/TournamentTeams";


class App extends React.Component {
    render() {
        return (
            <>
                <div className="page-wrapper compact-wrapper" id="pageWrapper">
                    <Navbar/>
                    <div className="page-body-wrapper horizontal-menu">
                        <Sidebar/>
                        <Switch>
                        <Route path="/rizz/admin/dashboard" component={Dashboard}/>
                        <Route path="/rizz/admin/players" component={Players}/>
                        <Route path="/rizz/admin/tournament/:tournament_id/teams" component={TournamentTeams}/>
                        <Route path="/rizz/admin/tournaments" component={Tournaments}/>
                        <Route path="/rizz/admin/feedbacks" component={Feedbacks}/>
                        <Redirect from="/" to="/rizz/admin/dashboard" component={Dashboard}/>
                        </Switch>
                    </div>
                </div>
            </>
        );
    }
}

export default App
