import React from 'react';
import Breadcrumb from "./common/Breadcrumb";
import Joi from "joi-browser";
import Input from "./common/Input";
import Select from "./common/Select";
import Form from "./common/Form";
import {getScheduleDetails} from "../services/matchService";
import {toast} from "react-toastify";
import Checkbox from "./common/Checkbox";
import {url} from "../config.json";
import axios from "axios";

class SelectPlayingXI extends Form {
    state = {
        data: {overs: '', toss: '', choose: ''},
        errors: {},
        breadcrumbs: [
            {id: 1, label: 'Tournament', path: '/react/admin/tournaments'},
            {id: 2, label: 'Schedules', path: '/react/admin/tournaments/schedules'},
            {id: 3, label: 'Start', path: false},
        ],
        toss: [
            {id: 1, name: ''},
            {id: 2, name: ''},
        ],
        choose: [
            {id: 1, name: 'Batting'},
            {id: 2, name: 'Bowling'},
        ],
        team1_id : '',
        team2_id : '',
        team1_players: [],
        team2_players: [],
        tournament_id : '',
        match_id : '',
    };

    schema = {
        overs: Joi.number().integer().min(1).required().label('Overs'),
        toss: Joi.string().required().label('Toss'),
        choose: Joi.string().required().label('Choose'),
    };

    async componentDidMount() {
        const schedule_id = this.props.location.state.schedule_id;
        const {data: schedule } = await getScheduleDetails(schedule_id);
        if (schedule.status) {
            this.setState({
                toss: schedule.data.toss,
                team1_players: schedule.data.team1_players,
                team2_players: schedule.data.team2_players,
                match_id : schedule.data.id,
                tournament_id : schedule.data.tournament_id,
                team1_id : schedule.data.toss[0].id,
                team2_id : schedule.data.toss[1].id,
            });
        } else {
            toast.error('An unexpected error occurred.');
        }
    }

    checkPlayerExistOrNot = (player_id) => {
        const team1_player = this.state.team1_players.filter( item => item.player_id === player_id && item.isChecked).length;
        const team2_player = this.state.team2_players.filter( item => item.player_id === player_id && item.isChecked).length;

        if(team1_player === 0 && team2_player === 0){
            return false;
        }
        else if(team1_player > 0 && team2_player > 0){
            return true;
        }
        else{
            return false;
        }
    }


    handleCheckElement = (event) => {
        let team1_players = this.state.team1_players;
        let team2_players = this.state.team2_players;

        const x = this.checkPlayerExistOrNot(event.target.value);
        // console.log(event.target.value);
        if(x) toast.error('This player is already present in opposite team.');
        else{
        team1_players.map(player => {
            if (player.player_id === event.target.value){
                player.isChecked = event.target.checked;
            }
        })
        team2_players.map(player => {
            if (player.player_id === event.target.value){
                player.isChecked = event.target.checked;
            }
        })
        this.setState({
            team1_players, team2_players
        })
        }

    }

    doSubmit = async () => {
        const players1_count = this.state.team1_players.filter(item => item.isChecked).length;
        const players2_count = this.state.team2_players.filter(item => item.isChecked).length;
        if(players1_count < 11 || players2_count < 11){
            toast.error('please select 11 player per side');
        }
        // else{
        const players_data = {
            'match_id' : this.state.match_id,
            'overs' : this.state.data.overs,
            'toss' : this.state.data.toss,
            'choose' : this.state.data.choose,
            'team1_id' : this.state.team1_id,
            'team2_id' : this.state.team2_id,
            'team1_players' : this.state.team1_players.filter(item => item.isChecked),
            'team2_players' : this.state.team2_players.filter(item => item.isChecked),
            'tournament_id' : this.state.tournament_id,
        }
        const endpoint = url + 'match/select-playing-xi';
        const { data } = await axios.post(endpoint , players_data);
        if(data.status){
            //redirect to score page
        }
        else{
            toast.error('An unexpected error occurred.');
        }
        console.log(data);

        // }

    }

    render() {
        const {errors, data} = this.state;
        return (
            <>
                <div className="page-body">
                    <div className="container-fluid">
                        <div className="page-title">
                            <div className="row">
                                <div className="col-md-6"><h3>Select Playing XI</h3></div>
                                <div className="col-md-6">
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
                                            <div className="row mb-5">
                                                <div className="col-6">
                                                    <h3 className='mb-3'>{this.state.toss[0].name}</h3>
                                                    {this.state.team1_players.map( (player,index) => <Checkbox
                                                        key={player.player_id}
                                                        onChange={this.handleCheckElement}
                                                        label={player.player_name}
                                                        name={player.player_id + 'team1'}
                                                        checked={player.isChecked}
                                                        index={index + 1}
                                                        value={player.player_id}
                                                    />)}
                                                </div>
                                                <div className="col-6">
                                                    <h3 className='mb-3'>{this.state.toss[1].name}</h3>

                                                    {this.state.team2_players.map((player,index) => <Checkbox
                                                        key={player.player_id}
                                                        onChange={this.handleCheckElement}
                                                        label={player.player_name}
                                                        name={player.player_id + 'team2'}
                                                        checked={player.isChecked}
                                                        index={index+1}
                                                        value={player.player_id}
                                                    />)}
                                                </div>
                                            </div>

                                            <div className="row">
                                                <div className="col-6">
                                                    <Select
                                                        name="toss"
                                                        value=""
                                                        options={this.state.toss}
                                                        label="Who won the Toss?"
                                                        onChange={this.handleChange}
                                                        error={errors.toss}
                                                    />
                                                </div>
                                                <div className="col-6">
                                                    <Select
                                                        name="choose"
                                                        value="Select"
                                                        options={this.state.choose}
                                                        label="Choose"
                                                        onChange={this.handleChange}
                                                        error={errors.choose}
                                                    />
                                                </div>
                                                <div className="col-6">
                                                    <Input
                                                        type="number"
                                                        name="overs"
                                                        label="Overs"
                                                        title={data.overs}
                                                        value={data.overs}
                                                        onChange={this.handleChange}
                                                        error={errors.overs}
                                                    />
                                                </div>
                                            </div>
                                            <button disabled={this.validate()} type='submit'
                                                    className='btn btn-success btn-md'>Submit
                                            </button>
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

export default SelectPlayingXI
