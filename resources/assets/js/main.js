;"use strict";

$(document).ready( async _ => {


    console.log('READY!');
    
    let response = await fetch( '/get-employees' );
    let employees = await response.json();


    let data = [];

    employees.forEach( employee => {

        data.push({
            text: `${employee.FirstName} ${employee.SecondName} ${employee.LastName} (${employee.position.PositionTitle})`,
            href: employee.id,

            nodes:[

            ]
        });

    } );

    $('#employeesTree').treeview({
        data: data,

    });

    $('#employeesTree').treeview('collapseAll', { silent: true });
    

    $('#employeesTree').on('nodeExpanded ', async function(event, data) {

        console.log('data' , data);
        let response = await $.ajax({
            url: `/get-employeesByBoss`,
            method: 'GET',
            data:{
                offset:10,
                limit:1,
                id: data.href
            }
        });

        let employees = JSON.parse(response);

        let childrenNodes = [];

        employees.forEach( employee => {

            childrenNodes.push({
                text: `${employee.FirstName} ${employee.SecondName} ${employee.LastName} (${employee.position.PositionTitle})`,
                href: employee.id,

            });

        } );

        //https://github.com/jonmiles/bootstrap-treeview/tree/develop
        /*
        * это ссылка на дерево, оно вроде такое же, нотам добавлены методы,  там есть метод добавления но он его не находит
        * */
        $('#employeesTree').treeview('addNode',[childrenNodes , data ,false, { silent: true } ]);


    });
    

} );

