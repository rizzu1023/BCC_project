import React from 'react';
import Joi from "joi-browser";
import {url} from "../config.json";
import axios from "axios";
import {toast} from "react-toastify";
import {getTournament} from "../services/tournamentService";
import Breadcrumb from "../components/common/Breadcrumb";
import Input from "../components/common/Input";
import Form from "../components/common/Form";

class TournamentGroupCreateForm extends Form {
    state = {
        data : { group_name : '', tournament_name : '' },
        errors : {},
        breadcrumbs : [
            { id : 1, label : 'Tournament', path : '/react/admin/tournaments' },
            { id : 2, label : 'Groups', path : '/react/admin/tournaments/groups' },
            { id : 3, label : 'Create', path : false },
        ],
        tournament_name : ''
    };
    schema = {
        tournament_name : Joi.string().required().label('Tournament Name'),
        group_name : Joi.string().required().label('Group Name'),
    };

    doSubmit = async () => {
        const tournament_id = this.props.location.state.tournament_id;
        const group = {
            tournament_id : tournament_id,
            group_name: this.state.data.group_name,
        }
        const endpoint = url + 'tournament/group/create';
        const { data } = await axios.post(endpoint , group);
        if(data.status){
            toast.success(data.message);
            const pathname = '/react/admin/tournaments/groups';
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
            group_name : '',
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
                                    <h3>Create Group</h3>
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
                                                name="group_name"
                                                label="Group Name"
                                                placeholder="eg. A"
                                                title={data.group_name}
                                                value={data.group_name}
                                                onChange={this.handleChange}
                                                error={errors.group_name}
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

export default TournamentGroupCreateForm
