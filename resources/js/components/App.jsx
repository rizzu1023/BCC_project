import React from 'react';
import Navbar from "./Navbar";
import Sidebar from "./Sidebar";
import Dashboard from "../pages/Dashboard";
import Players from "../pages/Players";
import {Route, Switch} from 'react-router-dom';
import Tournaments from "../pages/Tournaments";
import Feedbacks from "../pages/Feedbacks";
import {ToastContainer} from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import TournamentDetails from "../pages/TournamentDetails";
import TournamentForm from "../pages/TournamentForm";
import TournamentTeamCreateForm from "../pages/TournamentTeamCreateForm";
import TournamentGroupCreateForm from "../pages/TournamentGroupCreateForm";
import SelectPlayingXI from "./SelectPlayingXI";


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
                            <Route exact path='/react/admin/tournaments/teams' component={TournamentDetails}/>
                            <Route  exact path='/react/admin/tournaments/schedules' component={TournamentDetails}/>
                            <Route  exact path='/react/admin/tournaments/results' component={TournamentDetails}/>
                            <Route  exact path='/react/admin/tournaments/points-table' component={TournamentDetails}/>
                            <Route  exact path='/react/admin/tournaments/groups' component={TournamentDetails}/>
                            <Route  exact path='/react/admin/tournaments/create' component={TournamentForm}/>
                            <Route  exact path='/react/admin/tournaments/teams/create' component={TournamentTeamCreateForm}/>
                            <Route  exact path='/react/admin/tournaments/groups/create' component={TournamentGroupCreateForm}/>
                            <Route  exact path='/react/admin/tournaments/match/select-players' component={SelectPlayingXI}/>
                            <Route  exact path='/react/admin/tournaments/match/live-score' component={TournamentGroupCreateForm}/>
                            <Route  exact path='/react/admin/tournaments/match/result' component={TournamentGroupCreateForm}/>
                            <Route path="/react/admin/players" component={Players}/>
                            <Route path="/react/admin/tournaments" component={Tournaments}/>
                            <Route path="/react/admin/feedbacks" component={Feedbacks}/>
                            {/*<Redirect from="/" to="/react/admin/dashboard" component={Dashboard}/>*/}
                        </Switch>
                    </div>
                </div>
            </>
        );
    }
}

export default App
