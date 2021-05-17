import React from 'react';
import { NavLink } from 'react-router-dom';

class Sidebar extends React.Component {
    state = {
        sidebar: [
            {id: 1, name: 'Dashboard', path: '/rizz/admin/dashboard', icon : 'home'},
            {id: 2, name: 'Tournaments', path: '/rizz/admin/tournaments', icon : 'truck'},
            {id: 3, name: 'Players', path: '/rizz/admin/players', icon : 'users'},
            {id: 4, name: 'Feedback', path: '/rizz/admin/feedbacks', icon : 'home' },
            {id: 5, name: 'Logout', path: '/rizz/admin/logout', icon : 'log-out'},
        ]
    };
    render() {
        const { sidebar } = this.state;
        return (
            <div className="sidebar-wrapper">
                <div className="logo-wrapper"><a href="index.html"><img className="img-fluid" alt="abc"/></a></div>
                <div className="logo-icon-wrapper"><a href="index.html"><img className="img-fluid" alt="xaa"/></a></div>
                <nav>
                    <div className="sidebar-main">
                        <div id="sidebar-menu">
                            <ul className="sidebar-links custom-scrollbar">
                                <li className="back-btn">
                                    <div className="mobile-back text-right"><span>Back</span><i className="fa fa-angle-right pl-2" aria-hidden="true"/></div>
                                </li>
                                { sidebar.map( s => <li key={s.id} className="sidebar-list" ><NavLink className="nav-link sidebar-title" to={s.path}><i data-feather={s.icon}/><span>{s.name}</span></NavLink></li>)}
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        );
    }
}

export default Sidebar
