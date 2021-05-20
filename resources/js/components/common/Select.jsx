import React from 'react';

const Select = (props) => {
    const { name, label, onChange,error, options, value } = props;
    return (

        <div className="form-group">
            <label htmlFor={ name }>{ label }</label>
            <select
                className="form-control"
                id={name}
                onChange={onChange}
                name={name}>
                <option value="" />
                {options.map(option => ( <option key={option._id} value={option._id}>{option.name}</option>))}
            </select>
            { error && <span className="text-danger" role="alert">{error}</span> }
        </div>

    );
}

export default Select
