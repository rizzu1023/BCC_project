import React from 'react';
import axios from "axios";
import {url} from "../config.json";
import {toast} from "react-toastify";
import TournamentGroupsTable from "../components/TournamentGroupsTable";
import TournamentPointsTableTable from "./TournamentPointsTableTable";

class TournamentPointsTable extends React.Component {
    state = {
        tournamentPointsTable : [],
        breadcrumbs : [
            { id : 1, label : 'Tournament', path : '/react/admin/tournaments' },
            { id : 2, label : 'PointsTable', path : false },
        ]
    };

    async componentDidMount() {
        const tournament_id = this.props.location.state.tournament_id;
        const { data : pointsTable } = await axios.get(url + "tournament/"+ tournament_id +"/points-table");
        try{
            if(pointsTable.status){
                this.setState({
                    tournamentPointsTable : pointsTable.data
                });
            }
            else{
                toast.error(pointsTable.message);
            }
        }
        catch(ex){
            toast.error('An unexpected error occurred.');
        }
    }

    deletePointsTableTeam = async tournamentGroup => {

        const tournamentGroupsBackup = this.state.tournamentGroups;
        const tournamentGroups = this.state.tournamentGroups.filter(t => t.id !== tournamentGroup.id);
        this.setState({tournamentGroups: tournamentGroups});
        try {
            const {data} = await axios.delete(url + "group/" + tournamentGroup.id);
            if(data.status){
                toast.success(data.message);
            }
            else{
                toast.error(data.message);
                this.setState({tournamentGroups: tournamentGroupsBackup});
            }
        } catch (ex) {
            toast.error('An unexpected error occurred.');
            this.setState({tournamentGroups: tournamentGroupsBackup});
        }


    }

    detailsTournamentGroup = (tournamentGroup) => {
        console.log('details tournament Group');
    }

    onGroupTeams = (tournamentGroup) => {
        console.log('clicked on group teams');
    }


    createGroup = () => {
        const tournament_id = this.props.location.state.tournament_id;
        const href = "/react/admin/tournaments/groups/create";
        this.props.history.push({ pathname : href,state : { tournament_id }});
    }

    render() {
        const { tournamentPointsTable } = this.state;
        return (
        tournamentPointsTable.map( points_table =>

            <div className="card" key={points_table.id}>
                <div className="card-body">
                    <h5 className='mb-3 ml-2' >Group { points_table.group_name }</h5>
                    <TournamentPointsTableTable
                        data={points_table.group_teams}
                        onDelete={this.deletePointsTableTeam}
                    />
                </div>
            </div>
        )
        );
    }
}

export default TournamentPointsTable
