import React from 'react';
import TournamentsTable from "../components/TournamentsTable";
import {getTournaments} from "../services/tournamentService";
import axios from "axios";
import {url} from "../config.json";

class Tournaments extends React.Component {
    state = {
        tournaments : [],
    };

    async componentDidMount() {
        const { data : tournaments } = await axios.get(url + "tournaments");
        this.setState({
            tournaments : tournaments
        });
    }

    deleteTournament = (tournament) => {
        console.log(tournament)
    }

    detailsTournament = (tournament) => {
        this.props.history.push('/rizz/admin/tournament/'+ tournament.id+'/teams');
    }

    render() {
        return (
            <div className="page-body">
                <div className="container-fluid">
                    <div className="page-title">
                        <div className="row">
                            <div className="col-6">
                                <h3>Tournaments</h3>
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
                                    <TournamentsTable
                                        data={this.state.tournaments}
                                        onDelete={this.deleteTournament}
                                        onDetails={this.detailsTournament}
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

export default Tournaments
