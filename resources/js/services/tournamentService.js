import axios from "axios";
import {url} from './../config.json';

export function getTournaments() {
    const {data: tournaments} = axios.get(url + "tournaments");
    return tournaments;
}

export function getTournament(tournament_id) {
    const href = url + "tournaments/" + tournament_id;
    const tournament = axios.get(href);
    return tournament;
}
