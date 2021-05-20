import React from 'react';

const Options = ({ options, optionClick }) => {
    return (
        <div className="card">
            <div className="row">
                <div className="col-md-12">
                    <ul className="nav nav-tabs border-tab" id="top-tab">
                        {options.map( option => <li onClick={ () => optionClick(option)} key={option.id} className="nav-item"><a className={option.active ? 'nav-link active' : 'nav-link'} id="1"><i data-feather={option.icon}/>{option.label}</a></li>)}
                    </ul>
                </div>
            </div>
        </div>
    );
}

export default Options
