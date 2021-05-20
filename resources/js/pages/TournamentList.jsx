import React from 'react';
import Breadcrumb from "../components/common/Breadcrumb";
import TournamentCard from "../components/TournamentCard";

class TournamentList extends React.Component {
    state = {
        breadcrumbs: [
            {id: 1, label: 'Tournaments', path: false},
        ]
    };

    render() {
        const { tournaments,onDelete,onSelect} = this.props;
        return (
            <div className="page-body">

                <div className="container-fluid">
                    <div className="page-title">
                        <div className="row">
                            <div className="col-6">
                                <h3>Tournaments</h3>
                            </div>
                            <div className="col-6">
                                <Breadcrumb
                                    breadcrumbs={this.state.breadcrumbs}
                                />
                            </div>
                        </div>
                    </div>
                </div>
                <div className="container-fluid">
                    {tournaments.map(tournament =>
                        <TournamentCard
                            key={tournament.id}
                            tournament={tournament}
                            onDelete={onDelete}
                            onSelect={onSelect}
                        />
                    )}
                </div>
            </div>
        );
    }
}

export default TournamentList
