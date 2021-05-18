import React from 'react';
import axios from "axios";
import {url} from "../config.json";
import {toast} from "react-toastify";
import Breadcrumb from "../components/common/Breadcrumb";
import TournamentCard from "../components/TournamentCard";




class Tournaments extends React.Component {
    state = {
        tournaments : [],
        breadcrumbs : [
            { id : 1, label : 'Tournaments', path : false },
        ]
    };

    async componentDidMount() {
        try{
            const { data : tournaments } = await axios.get(url + "tournaments");
            this.setState({
                tournaments : tournaments.data
            });
        }
        catch(ex){
            toast.error('An unexpected error occurred.');
        }
    }

    deleteTournament = async tournament => {
        const tournamentsBackup = this.state.tournaments;
        const tournaments = this.state.tournaments.filter( t => t.id !== tournament.id);
        this.setState({tournaments});
        try{
            const { data } = await axios.delete(url + "tournaments/" + tournament.id);
            toast.success(data.message);
        }
        catch(ex){
            toast.error('An unexpected error occurred.');
            this.setState({ tournaments : tournamentsBackup });
        }
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
                                <Breadcrumb
                                    breadcrumbs={this.state.breadcrumbs}
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div className="container-fluid">
                    { this.state.tournaments.map( tournament =>
                        <TournamentCard
                            key={tournament.id}
                            tournament={tournament}
                            onDelete={this.deleteTournament}
                        />
                        ) }
                </div>
            </div>
        );
    }
}

export default Tournaments
