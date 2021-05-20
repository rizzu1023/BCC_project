import React from 'react';
import Table from "./common/Table";

class TournamentGroupsTable extends React.Component {
    state = {
        columns: [
            {id: 1, path : 'group_name' , label : 'Group Name'},
            {id: 2, key : 'action', label : 'Action', content : tournamentGroup => <><button onClick={() => this.props.onTeams(tournamentGroup)} className="btn btn-primary btn-sm mr-2">Teams</button><button onClick={() => this.props.onDetails(tournamentGroup)} className="btn btn-warning btn-sm mr-2">Details</button><button onClick={() => this.props.onDelete(tournamentGroup)} className="btn btn-danger btn-sm">Delete</button></>},
        ],
    };
    render() {
        const {data} = this.props;
        const count = data.length;
        if(count > 0) return (
            <Table
                columns={this.state.columns}
                data={data}
            />
        );
        else return(
            <h2>Ooops! No groups found.</h2>
        );
    }
}

export default TournamentGroupsTable
