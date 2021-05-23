import { url } from '../config.json';
import axios from 'axios';

export function getScheduleDetails(schedule_id){
    const href = url + 'match/schedule/' + schedule_id + '/details';
    return  axios.get(href);
}
