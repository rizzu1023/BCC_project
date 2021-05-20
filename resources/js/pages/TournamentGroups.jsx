import React from 'react';
import axios from "axios";
import {url} from "../config.json";
import {toast} from "react-toastify";
import TournamentGroupsTable from "../components/TournamentGroupsTable";

class TournamentGroups extends React.Component {
    state = {
        tournamentGroups : [],
        breadcrumbs : [
            { id : 1, label : 'Tournament', path : '/react/admin/tournaments' },
            { id : 2, label : 'Groups', path : false },
        ]
    };

    async componentDidMount() {
        const tournament_id = this.props.location.state.tournament_id;
        const { data : groups } = await axios.get(url + "tournament/"+ tournament_id +"/groups");
        try{
            if(groups.status){
                this.setState({
                    tournamentGroups : groups.data
                });
            }
            else{
                toast.error(groups.message);
            }
        }
        catch(ex){
            toast.error('An unexpected error occurred.');
        }
    }

    deleteTournamentGroup = async tournamentGroup => {

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
        return (
            <div className="card">
                <div className="card-header">
                    <button className='btn btn-primary btn-md' onClick={() => this.createGroup()}><i data-feather="plus"/>Create Group</button>
                </div>
                <div className="card-body">
                    <TournamentGroupsTable
                        data={this.state.tournamentGroups}
                        onDelete={this.deleteTournamentGroup}
                        onDetails={this.detailsTournamentGroup}
                        onTeams={this.onGroupTeams}
                    />
                </div>
            </div>
        );
    }
}

export default TournamentGroups
