;"use strict";

$(document).ready( async _ => {


    console.log('READY!');
    
    let response = await fetch( '/get-employees' );
    let employees = await response.json();

    console.log('response:' , employees);

    let data = [];

    employees.forEach( employee => {

        data.push({
            label: `${employee.FirstName} ${employee.SecondName} ${employee.LastName}`,
            children: [
                {
                    label: `${employee.FirstName} ${employee.SecondName} ${employee.LastName}`,
                    children: [
                        {
                            label: `${employee.FirstName} ${employee.SecondName} ${employee.LastName}`,
                            children: []
                        }
                    ]
                }
            ]
        });

    } );

    $('#employeesTree').tree({
        data: data,
        autoOpen: true,
        slide: true
    });


} );

