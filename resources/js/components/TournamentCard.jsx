import React from 'react';
import {Link} from "react-router-dom";

const TournamentCard = (props) => {
    const { id : tournament_id , tournament_name} = props.tournament;
    const teams_href = "/react/admin/tournament/" + tournament_id + "/teams";
    const schedules_href = "/react/admin/tournament/" + tournament_id + "/schedules";
    const results_href = "/react/admin/tournament/" + tournament_id + "/results";
    const groups_href = "/react/admin/tournament/" + tournament_id + "/groups";
    const points_table_href = "/react/admin/tournament/" + tournament_id + "/points-table";
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
                <Link className="btn btn-secondary btn-md mr-2" to={teams_href}>Teams</Link>
                <Link className="btn btn-success btn-md mr-2"   to={schedules_href}>Schedule</Link>
                <Link className="btn btn-primary btn-md mr-2"   to={results_href}>Results</Link>
                <Link className="btn btn-info btn-md mr-2"      to={groups_href}>Groups</Link>
                <Link className="btn btn-warning btn-md "       to={points_table_href}>Points Table</Link>
            </div>
        </div>
    );
}

export default TournamentCard
