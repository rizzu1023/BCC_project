import React from 'react';
import Table from "./common/Table";

class TournamentsTable extends React.Component {
    state = {
        columns: [
            {id: 1, path : 'id' , label : 'Id'},
            {id: 2, path : 'tournament_name' , label : 'Name'},
            {id: 3, key : 'show', label : 'Action', content : tournament => <button onClick={() => this.props.onDetails(tournament)} className="btn btn-warning btn-sm">Details</button>},
            {id: 4, key : 'delete', label : 'Action', content : tournament => <button onClick={() => this.props.onDelete(tournament)} className="btn btn-danger btn-sm">Delete</button>},
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

export default TournamentsTable;
