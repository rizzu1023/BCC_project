import React from 'react';
import axios from "axios";
import {url} from "../config.json";
import TournamentTeamsTable from "../components/TournamentTeamsTable";
import {toast} from "react-toastify";


class TournamentTeams extends React.Component {
    state = {
        tournamentTeams : [],
        breadcrumbs : [
            { id : 1, label : 'Tournament', path : '/react/admin/tournaments' },
            { id : 2, label : 'Teams', path : false },
        ]
    };

    async componentDidMount() {
        const tournament_id = this.props.location.state.tournament_id;
        const { data : teams } = await axios.get(url + "tournament/"+ tournament_id +"/teams");
        try{
            if(teams.status){
                this.setState({
                    tournamentTeams : teams.data
                });
            }
            else{
                toast.error(teams.message);
            }
        }
        catch(ex){
            toast.error('An unexpected error occurred.');
        }
    }

    deleteTournamentTeam = async tournamentTeam => {

        const tournamentTeamsBackup = this.state.tournamentTeams;
        const tournamentTeams = this.state.tournamentTeams.filter(t => t.id !== tournamentTeam.id);
        this.setState({tournamentTeams});
        try {
            const {data} = await axios.delete(url + "teams/" + tournamentTeam.id);
            toast.success(data.message);
        } catch (ex) {
            toast.error('An unexpected error occurred.');
            this.setState({tournamentTeams: tournamentTeamsBackup});
        }


    }

    detailsTournamentTeam = (tournamentTeam) => {
        console.log('details tournament teams');
    }

    teamSquad = (tournamentTeam) => {
        const href = "/react/admin/team/players";
        this.props.history.push({ pathname : href,state : { team_id : tournamentTeam.id}});
    }

    createTeam = () => {
        const tournament_id = this.props.location.state.tournament_id;
        const href = "/react/admin/tournaments/teams/create";
        this.props.history.push({ pathname : href,state : { tournament_id }});
    }

    render() {
        return (
            <div className="card">
                <div className="card-header">
                    <button className='btn btn-primary btn-md' onClick={() => this.createTeam()}><i data-feather="plus"/>Create Team</button>
                </div>
                <div className="card-body">
                    <TournamentTeamsTable
                        data={this.state.tournamentTeams}
                        onDelete={this.deleteTournamentTeam}
                        onDetails={this.detailsTournamentTeam}
                        onSquad={this.teamSquad}
                    />
                </div>
            </div>
        );
    }
}

export default TournamentTeams;
