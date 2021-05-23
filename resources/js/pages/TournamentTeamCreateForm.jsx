import React from 'react';
import Breadcrumb from "../components/common/Breadcrumb";
import Input from "../components/common/Input";
import Joi from "joi-browser";
import {url} from "../config.json";
import axios from "axios";
import {toast} from "react-toastify";
import {getTournament} from "../services/tournamentService";
import Form from "../components/common/Form";
import Checkbox from "../components/common/Checkbox";

class TournamentTeamCreateForm extends Form {
    state = {
        data : { team_code : '', team_name : '', tournament_name : '' },
        errors : {},
        breadcrumbs : [
            { id : 1, label : 'Tournament', path : '/react/admin/tournaments' },
            { id : 2, label : 'Teams', path : '/react/admin/tournaments/teams' },
            { id : 3, label : 'Create', path : false },
        ],
        tournament_name : ''
    };
    schema = {
        tournament_name : Joi.string().required().label('Tournament Name'),
        team_code : Joi.string().required().label('Team Code'),
        team_name : Joi.string().required().label('Team Name'),
    };

    doSubmit = async () => {
        const tournament_id = this.props.location.state.tournament_id;
        const team = {
            tournament_id : tournament_id,
            team_code : this.state.data.team_code,
            team_name: this.state.data.team_name,
        }
        const endpoint = url + 'tournament/team/create';
        const { data } = await axios.post(endpoint , team);
        if(data.status){
            toast.success(data.message);
            const pathname = '/react/admin/tournaments/teams';
            this.props.history.push({ pathname, state : { tournament_id }});
        }
        else{
            toast.error('An unexpected error occurred.');
        }
    }

    async componentDidMount() {
        const tournament_id = this.props.location.state.tournament_id;
        const { data : tournament } = await getTournament(tournament_id);
        const t = {
            tournament_name : tournament.data.tournament_name,
            team_code : '',
            team_name : '',
        }
        this.setState(
            { data : t }
        )
    }

    render() {
        const { data, errors} = this.state;
        return (
            <>
                <div className="page-body">
                    <div className="container-fluid">
                        <div className="page-title">
                            <div className="row">
                                <div className="col-6">
                                    <h3>Create Team</h3>
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
                                        <form onSubmit={this.handleSubmit}>

                                            <Input
                                                type="text"
                                                name="tournament_name"
                                                label="Tournament"
                                                readOnly={true}
                                                title={data.tournament_name}
                                                value={data.tournament_name}
                                                onChange={this.handleChange}
                                                error={errors.tournament_name}
                                            />

                                            <Input
                                                type="text"
                                                name="team_code"
                                                label="Team Code"
                                                placeholder="eg. RCB"
                                                title={data.team_code}
                                                value={data.team_code}
                                                onChange={this.handleChange}
                                                error={errors.team_code}
                                            />
                                            <Input
                                                type="text"
                                                name="team_name"
                                                label="Team Name"
                                                placeholder="eg. Royal Challengers Bangalore"
                                                title={data.team_name}
                                                value={data.team_name}
                                                onChange={this.handleChange}
                                                error={errors.team_name}
                                            />
                                            <button disabled={this.validate()} type='submit' className='btn btn-success btn-md'>Submit</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </>
        );
    }
}

export default TournamentTeamCreateForm
