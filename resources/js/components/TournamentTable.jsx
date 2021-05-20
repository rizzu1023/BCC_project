import React from 'react';
import Table from "./common/Table";
import Breadcrumb from "./common/Breadcrumb";
import {Link} from "react-router-dom";

class TournamentTable extends React.Component {
    state = {
        columns: [
            {id: 1, path: 'id', label: 'Id'},
            {id: 2, path: 'tournament_name', label: 'Name'},
            {id: 3, key: 'show', label: 'Action', content: tournament => <><button onClick={() => this.props.onDetails(tournament)} className="btn btn-warning btn-sm mr-2">Details</button><button onClick={() => this.props.onDelete(tournament)} className="btn btn-danger btn-sm">Delete</button></>},
        ],
        breadcrumbs : [
            { id : 1, label : 'Tournament', path : false },
        ]
    };

    render() {
        const {data} = this.props;
        return (
            <div className="page-body">
                <div className="container-fluid">
                    <div className="page-title">
                        <div className="row">
                            <div className="col-6">
                                <Link to='/react/admin/tournaments/create' className="btn btn-success btn-md"><i data-feather="plus"/>Create Tournament</Link>
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


                    <div className="row">
                        <div className="col-sm-12">
                            <div className="card">

                                <div className="card-body">

                                    <Table
                                        columns={this.state.columns}
                                        data={data}
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

export default TournamentTable;
