import React from 'react';

const Input = (props) => {
    const { name, label, value, onChange,error, type, placeholder,readOnly } = props;
    return (
        <div className="form-group">
            <label htmlFor={ name }>{ label }</label>
            <input
                type={type}
                className="form-control"
                id={name}
                placeholder={placeholder}
                onChange={onChange}
                name={name}
                readOnly={readOnly}
                value={value}/>
            { error && <span className="text-danger" role="alert">{error}</span> }
        </div>
    );
}

export default Input

Input.defaultProps = {
    placeholder : '',
    readOnly : false
}
