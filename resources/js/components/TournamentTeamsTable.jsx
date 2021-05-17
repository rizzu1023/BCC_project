import React from 'react';
import Table from "./common/Table";

class TournamentTeamsTable extends React.Component {
    state = {
        columns: [
            {id: 1, path : 'team_code' , label : 'Team Code'},
            {id: 2, path : 'team_name' , label : 'Team Name'},
            {id: 3, key : 'squad', label : 'Squad', content : tournamentTeam => <button onClick={() => this.props.onSquad(tournamentTeam)} className="btn btn-dark btn-sm">Squad</button>},
            {id: 4, key : 'show', label : 'Action', content : tournamentTeam => <button onClick={() => this.props.onDetails(tournamentTeam)} className="btn btn-warning btn-sm">Details</button>},
            {id: 5, key : 'delete', label : 'Action', content : tournamentTeam => <button onClick={() => this.props.onDelete(tournamentTeam)} className="btn btn-danger btn-sm">Delete</button>},
        ],
    };
    render() {
        const {data} = this.props;
        return (
            <Table
                columns={this.state.columns}
                data={data}
            />
        );
    }
}

export default TournamentTeamsTable
