import React from 'react';
import {Route} from "react-router-dom";
import TournamentTeams from "./TournamentTeams";
import TournamentSchedules from "./TournamentSchedules";
import TournamentResults from "./TournamentResults";
import TournamentPointsTable from "./TournamentPointsTable";
import TournamentGroups from "./TournamentGroups";
import Options from "../components/Options";

class TournamentDetails extends React.Component {
    state = {
        tournament_id : this.props.location.state.tournament_id,
        options : [
            { id : 1 , label : 'Teams', path : '/react/admin/tournaments/teams', icon : 'users', active : true},
            { id : 2 , label : 'Schedule', path : '/react/admin/tournaments/schedules', icon : 'calendar' , active : false},
            { id : 3 , label : 'Results', path : '/react/admin/tournaments/results', icon : 'calendar', active : false},
            { id : 4 , label : 'Groups', path : '/react/admin/tournaments/groups', icon : 'file-text', active : false},
            { id : 5 , label : 'PointsTable', path : '/react/admin/tournaments/points-table', icon : 'list', active : false},
        ]
    }


    optionClick = (option) => {
        let activeOpt = this.state.options.filter( o => o.active === true);
        activeOpt[0].active = false;
        let opt = this.state.options.filter( o => o.id === option.id);
        opt[0].active = true;
        const href = opt[0].path;
        const tournament_id = this.state.tournament_id;
        this.props.history.push({ pathname : href,state : { tournament_id }});
        const options = this.state.options;
        this.setState({
            options
        })
    }


    render() {
        return (
            <div className="page-body">
                <div className="container-fluid">
                    <div className="page-title">
                        <div className="col-md-12 project-list">
                            <Options
                                options={this.state.options}
                                optionClick={this.optionClick}
                            />

                            <Route  exact path='/react/admin/tournaments/teams' component={TournamentTeams}/>
                            <Route  exact path='/react/admin/tournaments/schedules' component={TournamentSchedules}/>
                            <Route  exact path='/react/admin/tournaments/results' component={TournamentResults}/>
                            <Route  exact path='/react/admin/tournaments/points-table' component={TournamentPointsTable}/>
                            <Route  exact path='/react/admin/tournaments/groups' component={TournamentGroups}/>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default TournamentDetails
