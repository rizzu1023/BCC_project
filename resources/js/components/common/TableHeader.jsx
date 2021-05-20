import React from 'react';

// column : array
// sortColumn : object
// onSort : function

class TableHeader extends React.Component {

    render() {
        const { columns } = this.props;
        return (
            <thead>
            <tr>
                { columns.map( column => <th className="clickable" key={column.id}><b>{column.label}</b></th>)}
            </tr>
            </thead>
        );
    }
}

export default TableHeader
