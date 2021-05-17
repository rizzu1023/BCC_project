import React from 'react';

class Dashboard extends React.Component {
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
                                <ol className="breadcrumb border-0">
                                    <li className="breadcrumb-item"><a href="/doctor/dashboard"><i data-feather="home"/></a></li>
                                    <li className="breadcrumb-item">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="container-fluid">

                    <div className="row">
                        <div className="col-sm-12">
                            <div className="card">
                                <div className="card-header">
                                    <h1>Header</h1>
                                </div>
                                <div className="card-body">
                                    <h3>Body</h3>
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
