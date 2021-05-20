import React from 'react';
import Table from "../components/common/Table";

class TournamentPointsTableTable extends React.Component {
    state = {
        columns: [
            {id: 1, path: 'team_name', label: 'Team Name'},
            {id: 2, path: 'match', label: 'M'},
            {id: 3, path: 'won', label: 'W'},
            {id: 4, path: 'lost', label: 'L'},
            {id: 5, path: 'draw', label: 'D'},
            {id: 6, path: 'points', label: 'P'},
            {id: 7, path: 'nrr', label: 'NRR'},
            {
                id: 8,
                key: 'action',
                label: 'Action',
                content: tournamentPointsTableTeam => <>
                    <button onClick={() => this.props.onDelete(tournamentPointsTableTeam)}
                            className="btn btn-outline-danger btn-sm mr-2">Remove
                    </button>
                </>
            },
        ],
    };

    render() {
        const {data} = this.props;
        const count = data.length;
        if (count > 0) return (
            <Table
                columns={this.state.columns}
                data={data}
            />
        );
        else return (
            <h2>Ooops! No Teams found.</h2>
        );
    }
}
export default TournamentPointsTableTable
