import axios from "axios";
import { url } from './../config.json';

export async function getTournaments(){
    const { data : tournaments } = await axios.get(url + "tournaments");
    return tournaments;
}
