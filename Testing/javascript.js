let btnGet = document.querySelector('button').addEventListener('click' , buildTable);
let myTable = document.querySelector('#table');


let employees = [
    { name: 'James', age: 21, country: 'United States' },
    { name: 'Rony', age: 31, country: 'United Kingdom' },
    { name: 'Peter', age: 58, country: 'Canada' },
    { name: 'Marks', age: 20, country: 'Spain' }
]


let headers = ['ID', 'First Name', 'Last Name' , 'Testimonial' , 'Activity' , 'Date' , 'Update' , 'Panel'];

function buildTable () {



    let table = document.createElement('table'); // c
    let headerRow = document.createElement('tr');


    for (let i = 0 ; i < headers.length; i++) { // fill the headers

        let headerCell = document.createElement('th');
        headerCell.innerHTML = headers[i];
        headerRow.appendChild(headerCell);

    };


    table.appendChild(headerRow); // append the cells to the header

    for (let i = 0 ; i < 8 ; i++){

        let row = document.createElement('tr');

        for (let j = 0 ; j < 8 ; j++){
            let cell = document.createElement('td');
            cell.innerHTML = ('Number '+j);
            row.appendChild(cell);

        }
        table.appendChild(row);
    }

    // employees.forEach(emp => {
    //     let row = document.createElement('tr');
    //
    //     Object.values(emp).forEach(text => {
    //         let cell = document.createElement('td');
    //         let textNode = document.createTextNode(text);
    //         cell.appendChild(textNode);
    //         row.appendChild(cell);
    //     })
    //
    //     table.appendChild(row);
    // });
    //
     myTable.appendChild(table); // append everything to the table Div
};