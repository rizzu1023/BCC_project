import React from 'react';
import { NavLink } from 'react-router-dom';
import logo from './../assets/images/FELogo.png'

class Sidebar extends React.Component {
    state = {
        sidebar: [
            {id: 1, name: 'Dashboard', path: '/react/admin/dashboard', icon : 'home'},
            {id: 2, name: 'Tournaments', path: '/react/admin/tournaments', icon : 'menu'},
            {id: 3, name: 'Players', path: '/react/admin/players', icon : 'users'},
            {id: 4, name: 'Feedback', path: '/react/admin/feedbacks', icon : 'bookmark' },
            {id: 5, name: 'Logout', path: '/react/admin/logout', icon : 'log-out'},
        ]
    };
    render() {
        const { sidebar } = this.state;
        return (
            <div className="sidebar-wrapper">
                <div className="logo-wrapper"><NavLink to="/react/admin/dashboard"><img className="img-fluid" src={logo} alt='logo'/></NavLink></div>
                <div className="logo-icon-wrapper"><NavLink to="/react/admin/dashboard"><img className="img-fluid" src={logo} alt='logo'/></NavLink></div>
                <nav>
                    <div className="sidebar-main">
                        <div id="sidebar-menu">
                            <ul className="sidebar-links custom-scrollbar">w
                                <li className="back-btn">
                                    <div className="mobile-back text-right"><span>Back</span><i className="fa fa-angle-right pl-2" aria-hidden="true"/></div>
                                </li>
                                { sidebar.map( s => <li key={s.id} className="sidebar-list" ><NavLink className="nav-link sidebar-title active" to={s.path}><i data-feather={s.icon}/><span>{s.name}</span></NavLink></li>)}
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        );
    }
}

export default Sidebar
