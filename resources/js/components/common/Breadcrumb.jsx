import React from 'react';
import {NavLink} from "react-router-dom";

const Breadcrumb = (props) => {
    return (
        <ol className="breadcrumb border-0">
            <li className="breadcrumb-item"><NavLink to="/react/admin/dashboard"> <i data-feather="home"/></NavLink></li>
            {props.breadcrumbs.map( b =>  <li key={b.id} className={b.path ? 'breadcrumb-item' : 'breadcrumb-item active'}>{b.path ? <NavLink to={b.path}>{b.label}</NavLink> : b.label}</li>)}
        </ol>
    );
}

export default Breadcrumb;

Breadcrumb.defaultProps ={
    breadcrumbs : []
}
