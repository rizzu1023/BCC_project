import React from 'react';
import axios from "axios";
import {url} from "../config.json";
import {toast} from "react-toastify";
import TournamentSchedulesTable from "./TournamentSchedulesTable";

class TournamentSchedules extends React.Component {
    state = {
        tournamentSchedules: [],
        breadcrumbs: [
            {id: 1, label: 'Tournament', path: '/react/admin/tournaments'},
            {id: 2, label: 'Schedules', path: false},
        ]
    };

    async componentDidMount() {
        const tournament_id = this.props.location.state.tournament_id;
        const {data: schedules} = await axios.get(url + "tournament/" + tournament_id + "/schedules");
        try {
            if (schedules.status) {
                this.setState({
                    tournamentSchedules: schedules.data
                });
            } else {
                toast.error(schedules.message);
            }
        } catch (ex) {
            toast.error('An unexpected error occurred.');
        }
    }

    editTournamentSchedule = (tournamentSchedule) => {
        console.log(tournamentSchedule);
    }

    scoreTournamentSchedule = (tournamentSchedule) => {
        console.log(tournamentSchedule);
    }

    startTournamentSchedule = (tournamentSchedule) => {
        const schedule_id= tournamentSchedule.id;
        const href = '/react/admin/tournaments/match/select-players';
        this.props.history.push({ pathname : href,state : { schedule_id }});
    }

    resultTournamentSchedule = (tournamentSchedule) => {
        console.log(tournamentSchedule);
    }

    deleteTournamentSchedule = async tournamentSchedule => {
        const tournamentSchedulesBackup = this.state.tournamentSchedules;
        const tournamentSchedules = this.state.tournamentSchedules.filter(t => t.id !== tournamentSchedule.id);
        this.setState({tournamentSchedules});
        try {
            const {data} = await axios.delete(url + "schedule/" + tournamentSchedule.id);
            if (data.status) {
                toast.success(data.message);
            } else {
                toast.error(data.message);
                this.setState({tournamentSchedules: tournamentSchedulesBackup});
            }
        } catch (ex) {
            toast.error('An unexpected error occurred.');
            this.setState({tournamentSchedules: tournamentSchedulesBackup});
        }
    }

    render() {
        return (

            <div className="card">

                <div className="card-body">
                    <TournamentSchedulesTable
                        data={this.state.tournamentSchedules}
                        onDelete={this.deleteTournamentSchedule}
                        onEdit={this.editTournamentSchedule}
                        onScore={this.scoreTournamentSchedule}
                        onStart={this.startTournamentSchedule}
                        onResult={this.resultTournamentSchedule}
                    />
                </div>
            </div>

        );
    }
}

export default TournamentSchedules
