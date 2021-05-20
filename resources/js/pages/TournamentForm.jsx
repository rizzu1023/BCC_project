import React from 'react';
import Form from "../components/common/Form";
import Input from "../components/common/Input";
import Joi from "joi-browser"
import axios from "axios";
import Breadcrumb from "../components/common/Breadcrumb";
import {url} from "../config.json";
import {toast} from "react-toastify";


class TournamentForm extends Form {
    state = {
        data : { tournament_name : '', start_date : '', end_date : '' },
        errors : {},
        breadcrumbs : [
            { id : 1, label : 'Tournament', path : '/react/admin/tournaments' },
            { id : 2, label : 'Create', path : false },
        ]
    }


    schema = {
        tournament_name : Joi.string().required().label('Tournament name'),
        start_date : Joi.date().required().label('Start Date'),
        end_date : Joi.date().required().label('End Date'),
    };

    doSubmit = async () => {
        const tournament = {
            tournament_name : this.state.data.tournament_name,
            start_date : this.state.data.start_date,
            end_date : this.state.data.end_date,
        }
        const endpoint = url + 'tournament/create';
        const { data } = await axios.post(endpoint , tournament);
        if(data.status){
            toast.success(data.message);
            this.props.history.push('/react/admin/tournaments');
        }
        else{
            toast.error('An unexpected error occurred.');
        }
    }

    render() {
        const { data , errors  } = this.state;
        return (
            <>
                <div className="page-body">
                    <div className="container-fluid">
                        <div className="page-title">
                            <div className="row">
                                <div className="col-6">
                                    <h3>Create Tournament</h3>
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
                                                label="Tournament Name"
                                                placeholder="eg. IPL2020"
                                                title={data.tournament_name}
                                                onChange={this.handleChange}
                                                error={errors.tournament_name}
                                            />
                                            <Input
                                                type="date"
                                                name="start_date"
                                                label="Start Date"
                                                title={data.start_date}
                                                onChange={this.handleChange}
                                                error={errors.start_date}
                                            />
                                            <Input
                                                type="date"
                                                name="end_date"
                                                label="End Date"
                                                title={data.end_date}
                                                onChange={this.handleChange}
                                                error={errors.end_date}
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

export default TournamentForm
