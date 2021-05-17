import React from 'react';
import axios from "axios";
import {url} from "../config.json";
import TournamentTeamsTable from "../components/TournamentTeamsTable";

class TournamentTeams extends React.Component {
    state = {
        tournamentTeams : [],
    };

    async componentDidMount() {
        const tournament_id = this.props.match.params.tournament_id;
        const { data : teams } = await axios.get(url + "tournament/"+ tournament_id +"/teams");
        this.setState({
            tournamentTeams : teams
        });
    }

    deleteTournamentTeam = (tournamentTeam) => {
        console.log(tournamentTeam)
    }

    detailsTournamentTeam = (tournamentTeam) => {
        console.log('details tournament teams');
    }

    teamSquad = (tournamentTeam) => {
        console.log('clicked');
        console.log(tournamentTeam);
    }

    render() {
        return (
            <div className="page-body">
                <div className="container-fluid">
                    <div className="page-title">
                        <div className="row">
                            <div className="col-6">
                                <h3>Teams</h3>
                            </div>
                            <div className="col-6">
                                <ol className="breadcrumb border-0">
                                    <li className="breadcrumb-item"><a href="/doctor/dashboard"><i data-feather="home"/></a></li>
                                    <li className="breadcrumb-item">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="container-fluid">

                    <div className="row">
                        <div className="col-sm-12">
                            <div className="card">

                                <div className="card-body">
                                    <TournamentTeamsTable
                                        data={this.state.tournamentTeams}
                                        onDelete={this.deleteTournamentTeam}
                                        onDetails={this.detailsTournamentTeam}
                                        onSquad={this.teamSquad}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default TournamentTeams;
