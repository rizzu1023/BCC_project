import React from 'react';
import {Link} from "react-router-dom";

const TournamentCard = (props) => {
    const { id : tournament_id , tournament_name} = props.tournament;
    return (
        <div className="card b-r-0">
            <div className="card-header">
                <h4 style={ { 'display' : 'inline-block' }}>{tournament_id}</h4>
                <div className="float-right">
                    <Link className="btn btn-success btn-sm mr-2" to="/admin/react/tournament/1/edit"> Edit </Link>
                    <button className="btn btn-danger btn-sm" onClick={() => props.onDelete(props.tournament) }> Delete </button>
                </div>
            </div>
            <div className="card-body text-center">
                <div className="mb-5">
                    <h2>{tournament_name}</h2>
                    {/*<span>12-12-2200 to</span><span> 12-12-2020</span>*/}
                </div>
                <button className="btn btn-secondary btn-md mr-2" onClick={ () => props.onSelect(props.tournament,'teams')}>Teams</button>
                <button className="btn btn-success btn-md mr-2" onClick={ () => props.onSelect(props.tournament,'schedules')}>Schedule</button>
                <button className="btn btn-primary btn-md mr-2" onClick={ () => props.onSelect(props.tournament,'results')}>Results</button>
                <button className="btn btn-info btn-md mr-2" onClick={ () => props.onSelect(props.tournament,'groups')}>Groups</button>
                <button className="btn btn-warning btn-md mr-2" onClick={ () => props.onSelect(props.tournament,'points-table')}>Points Table</button>
            </div>
        </div>
    );
}

export default TournamentCard
