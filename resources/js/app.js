
import ReactDOM from "react-dom";
import React from "react";
import App from "./components/App";
import {BrowserRouter as Router} from 'react-router-dom';


require('./bootstrap');


if (document.getElementById('app')) {
    ReactDOM.render(<Router><App/></Router>, document.getElementById('app'));
}
else{
    console.log('root element not found');
}
