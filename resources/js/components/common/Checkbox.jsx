import React from 'react';

const Checkbox = (props) => {
    const { onChange , label, name, isChecked,value,index } = props;
    return (
        <div className="custom-control custom-switch mt-2">
            <input
                type='checkbox'
                className='custom-control-input'
                id={name}
                checked={isChecked}
                onChange={onChange}
                value={value}
            />
            <label className="custom-control-label" htmlFor={name}>{index} { label } </label>
            {/*{ error && <span className="text-danger" role="alert">{error}</span> }*/}
        </div>
    );
}

export default Checkbox

Checkbox.defaultProps = {
    index : null
}
