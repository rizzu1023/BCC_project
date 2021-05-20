
import ReactDOM from "react-dom";
import React from "react";
import App from "./components/App";
import {BrowserRouter as Router} from 'react-router-dom';

import Swal from 'sweetalert2/dist/sweetalert2.js'
import 'sweetalert2/src/sweetalert2.scss'


require('./bootstrap');


if (document.getElementById('app')) {
    ReactDOM.render(<Router><App/></Router>, document.getElementById('app'));
}
else{
    console.log('root element not found');
}
