import React from 'react';
import axios from "axios";
import {url} from "../config.json";
import {toast} from "react-toastify";
import Swal from 'sweetalert2/dist/sweetalert2.js'
import TournamentTable from "../components/TournamentTable";


class Tournaments extends React.Component {
    state = {
        tournaments: [],
    };

    async componentDidMount() {
        try {
            const {data: tournaments} = await axios.get(url + "tournaments");
            this.setState({
                tournaments: tournaments.data,
            });
        } catch (ex) {
            toast.error('An unexpected error occurred.');
        }
    }

    deleteTournament = async tournament => {
        await Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const tournamentsBackup = this.state.tournaments;
                const tournaments = this.state.tournaments.filter(t => t.id !== tournament.id);
                this.setState({tournaments});

                try {
                    const {data} = axios.delete(url + "tournaments/" + tournament.id);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                } catch (ex) {
                    toast.error('An unexpected error occurred.');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'An unexpected error occurred.',
                    })
                    this.setState({tournaments: tournamentsBackup});
                }

            }
        });

    }

    detailsTournament = tournament => {
        const href = "/react/admin/tournaments/teams";
        this.props.history.push({ pathname : href,state : { tournament_id : tournament.id}});
    }

    handleSelect = (tournament,path) => {
        const href = "/react/admin/tournaments/" + path;
        this.props.history.push({ pathname : href, state : { tournament_id : tournament.id}});
    }




    render() {
        return (
           <>
                <TournamentTable
                data={this.state.tournaments}
                onDelete={this.deleteTournament}
                onDetails={this.detailsTournament}
                />
           </>
        );
    }
}

export default Tournaments
