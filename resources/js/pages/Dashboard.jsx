import React from 'react';
import Breadcrumb from "../components/common/Breadcrumb";

class Dashboard extends React.Component {
    state = {
        breadcrumbs : [
            { id : 1, label : 'Dashboard', path : false },
        ]
    }
    render() {
        return (
            <div className="page-body">
                <div className="container-fluid">
                    <div className="page-title">
                        <div className="row">
                            <div className="col-6">
                                <h3>Heading</h3>
                            </div>
                            <div className="col-6">
                               <Breadcrumb
                                    breadcrumbs = {this.state.breadcrumbs}
                               />
                            </div>
                        </div>
                    </div>
                </div>
                <div className="container-fluid">

                    <div className="row">
                        <div className="col-sm-6 col-xl-3 col-lg-6">
                            <div className="card o-hidden b-r-0">
                                <div className="bg-primary b-r-4 card-body">
                                    <div className="media static-top-widget">
                                        <div className="align-self-center text-center"><i data-feather="database"/></div>
                                        <div className="media-body"><span className="m-0">Teams</span>
                                            <h4 className="mb-0 counter">8</h4><i className="icon-bg" data-feather="database"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-6 col-xl-3 col-lg-6">
                            <div className="card o-hidden b-r-0">
                                <div className="bg-secondary b-r-4 card-body">
                                    <div className="media static-top-widget">
                                        <div className="align-self-center text-center"><i data-feather="user-plus"/></div>
                                        <div className="media-body"><span className="m-0">Players</span>
                                            <h4 className="mb-0 counter">98</h4><i className="icon-bg" data-feather="shopping-bag"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-6 col-xl-3 col-lg-6">
                            <div className="card o-hidden b-r-0">
                                <div className="bg-success b-r-4 card-body">
                                    <div className="media static-top-widget">
                                        <div className="align-self-center text-center"><i data-feather="message-circle"/></div>
                                        <div className="media-body"><span className="m-0">Tournaments</span>
                                            <h4 className="mb-0 counter">2</h4><i className="icon-bg" data-feather="message-circle"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-sm-6 col-xl-3 col-lg-6">
                            <div className="card o-hidden b-r-0">
                                <div className="bg-info b-r-4 card-body">
                                    <div className="media static-top-widget">
                                        <div className="align-self-center text-center"><i data-feather="shopping-bag"/></div>
                                        <div className="media-body"><span className="m-0">Matches</span>
                                            <h4 className="mb-0 counter">12</h4><i className="icon-bg" data-feather="user-plus"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Dashboard
