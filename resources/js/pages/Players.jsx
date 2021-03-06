import React from 'react';

class Players extends React.Component {
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
                                    <li className="breadcrumb-item">Page name</li>
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
                                    <h1>
                                       header
                                    </h1>
                                </div>
                                <div className="card-body">
                                    <h3>
                                        ->having('total_clients','>',0)
                                        ->having('claims_registered','>',0)
                                        ->having('claims_settled','>',0)
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Players
