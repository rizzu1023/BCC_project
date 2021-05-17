import React from 'react';

class Navbar extends React.Component {
    render() {
        return (
            <div className="page-header">
                <div className="header-wrapper row m-0">
                    <div className="header-logo-wrapper">
                        <div className="logo-wrapper"><a href="index.html">Image</a></div>
                        <div className="toggle-sidebar"><i className="status_toggle middle" data-feather="grid"
                                                           id="sidebar-toggle">
                        </i></div>
                    </div>
                    <div className="left-header col horizontal-wrapper pl-0">
                        <ul className="horizontal-menu">
                            <li className="mega-menu">
                            </li>
                        </ul>
                    </div>
                    <div className="nav-right col-8 text-right pull-right right-header p-0">
                        <ul className="nav-menus">
                            <li className="onhover-dropdown">
                                <div className="notification-box"><i data-feather="bell"></i><span
                                    className="badge badge-pill badge-secondary">1</span>
                                </div>
                                <ul className="notification-dropdown onhover-show-div">
                                    <li className="bg-primary text-center">
                                        <h6 className="f-18 mb-0">Notifications</h6>
                                        <p className="mb-0">You have new notification</p>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div className="mode"><i className="fa fa-moon-o"></i></div>
                            </li>


                            <li className="maximize"><a className="text-dark" href="#"><i
                                data-feather="maximize"></i></a></li>
                            <li className="profile-nav onhover-dropdown p-0 mr-0">
                                <div className="media profile-media">Image
                                    <div className="media-body"><span>Mohammed Rizwan</span>
                                        <p className="mb-0 font-roboto">Nutritionist <i
                                            className="middle fa fa-angle-down"></i></p>
                                    </div>
                                </div>
                                <ul className="profile-dropdown onhover-show-div">
                                    <li><i data-feather="user"></i><span>Account </span></li>
                                    <li><i data-feather="settings"></i><span>Settings</span></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        );
    }
}

export default Navbar;
