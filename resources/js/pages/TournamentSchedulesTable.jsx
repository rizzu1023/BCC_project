import React from 'react';
import Table from "../components/common/Table";
import {Link} from "react-router-dom";

class TournamentSchedulesTable extends React.Component {
    state = {
        columns: [
            {id: 0, path : 'match_no' , label : 'Match'},
            {id: 1, path : 'dates' , label : 'Date'},
            {id: 2, path : 'times' , label : 'Time'},
            {id: 3, path : 'team1_code' , label : 'Team3'},
            {id: 4, label : 'VS',  content : () => <span>vs</span>},
            {id: 5, path : 'team2_code' , label : 'Team2'},
            // {id: 6, key : 'action', label : 'Action', content : tournamentSchedule => <><button onClick={() => this.props.onEdit(tournamentSchedule)} className="btn btn-dark btn-sm mr-2">Edit</button><button onClick={() => this.props.onDelete(tournamentSchedule)} className="btn btn-danger btn-sm">Delete</button></>},
            {id: 6, key : 'action', label : 'Action', content : (tournamentSchedule) => this.showButton(tournamentSchedule)},
        ],
    };

    showButton = (tournamentSchedule) => {
        if (tournamentSchedule.status === null) {
            return <><button onClick={() => this.props.onStart(tournamentSchedule)} className="btn btn-info btn-sm mr-2">Start</button><button onClick={() => this.props.onEdit(tournamentSchedule)} className="btn btn-success btn-sm mr-2">Edit</button><button onClick={() => this.props.onDelete(tournamentSchedule)} className="btn btn-danger btn-sm">Delete</button></>;

        }
        else if(tournamentSchedule.status <= 3){
            return <><button onClick={() => this.props.onScore(tournamentSchedule)} className="btn btn-primary btn-sm mr-2">Score</button></>
            // return <><button onClick={() => this.props.onStart(tournamentSchedule)} className="btn btn-success btn-sm mr-2">Start</button></>
            // return <><Link to='' className="btn btn-success btn-sm mr-2">Start</Link></>
        }
        else{
            return <><button onClick={() => this.props.onResult(tournamentSchedule)} className="btn btn-dark btn-sm mr-2">Result</button></>;
        }
    }


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
            <h2>Ooops! No schedules found.</h2>
        );
    }
}

export default TournamentSchedulesTable
