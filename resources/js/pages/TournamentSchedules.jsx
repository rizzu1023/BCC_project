import React from 'react';
import axios from "axios";
import {url} from "../config.json";
import {toast} from "react-toastify";
import Breadcrumb from "../components/common/Breadcrumb";

class TournamentSchedules extends React.Component {
    state = {
        tournamentSchedules : [],
        breadcrumbs : [
            { id : 1, label : 'Tournament', path : '/react/admin/tournaments' },
            { id : 2, label : 'Schedules', path : false },
        ]
    };

    async componentDidMount() {
        const tournament_id = this.props.location.state.tournament_id;
        const { data : schedules } = await axios.get(url + "tournament/"+ tournament_id +"/schedules");
        try{
            if(schedules.status){
                this.setState({
                    tournamentTeams : schedules.data
                });
            }
            else{
                toast.error(schedules.message);
            }
        }
        catch(ex){
            toast.error('An unexpected error occurred.');
        }
    }

    deleteTournamentSchedule = async tournamentSchedule => {
        const tournamentSchedulesBackup = this.state.tournamentTeams;
        const tournamentSchedules = this.state.tournamentSchedules.filter(t => t.id !== tournamentSchedule.id);
        this.setState({tournamentSchedules});
        try {
            const {data} = await axios.delete(url + "schedules/" + tournamentSchedule.id);
            toast.success(data.message);
        } catch (ex) {
            toast.error('An unexpected error occurred.');
            this.setState({tournamentSchedules: tournamentSchedulesBackup});
        }
    }

    render() {
        return (

                            <div className="card">

                                <div className="card-body">
                                    {/*<TournamentSchedulesTable*/}
                                    {/*    data={this.state.tournamentSchedules}*/}
                                    {/*    onDelete={this.deleteTournamentSchedule}*/}
                                    {/*/>*/}
                                    <h1>Results</h1>
                                </div>
                            </div>

        );
    }
}

export default TournamentSchedules
