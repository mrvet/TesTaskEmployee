;"use strict";

function GetEmployeeRowTemplate( employee ){

    employee.LastName = employee.LastName || null;

    if( !employee.boss ){
        employee.boss = {
            id: 0,
            FirstName: '',
            SecondName: ''
        };
    }//if

    return `
        <tr>
                    <th scope="row">
                        <a target="_blank" href="/employee/${employee.id}">
                            ${employee.id}
                        </a>
                    </th>
                    <th scope="row">${employee.FirstName}</th>
                    <th scope="row">${employee.SecondName}</th>
                    <th scope="row">${employee.LastName}</th>
                    <th scope="row">${employee.position.PositionTitle}</th>
                    <th scope="row">
                        <a target="_blank" href="/employee/${employee.boss.id !== 0 ? employee.boss.id : '#'}">
                            ${employee.boss.FirstName}
                            ${employee.boss.SecondName}
                        </a>
                    </th>
                </tr>
   
    `;

}

$(document).ready( async _ => {

    if( !$('#employeesTree')){

        return;

    }//if

    let response = await fetch( '/get-employees' );
    let employees = await response.json();


    let data = [];

    employees.forEach( employee => {

        data.push({
            name: `${employee.FirstName} ${employee.SecondName} ${employee.LastName} (${employee.position.PositionTitle})`,
            id: employee.id,
            children:[
                {

                }
            ]
        });

    } );


    $('#employeesTree').on(
        'tree.click',
        function(event) {

            //window.location = `/employee/${event.node.id}`;
            window.open(`/employee/${event.node.id}`);

        }
    );

    $('#employeesTree').tree({
        data: data,
    });

    $('#employeesTree').on(
        'tree.open',
        async function(e) {
            console.log(e.node);

            let response = await
            $.ajax({
                url: `/get-employeesByBoss`,
                method: 'GET',
                data: {
                    offset: 10,
                    limit: 1,
                    id: e.node.id
                }
            });


            let employees = JSON.parse(response);

            console.log('response', employees);

            var parentNode = $('#employeesTree').tree('getNodeById', e.node.id);
            //parentNode.children = [];

            employees.forEach(employee => {

                $('#employeesTree').tree('appendNode' , {
                    name: `${employee.FirstName} ${employee.SecondName} ${employee.LastName} (${employee.position.PositionTitle})`,
                    id: employee.id,
                    children: [{}]
                } , parentNode );

            });


        }
    );

    //GetMoreEmployees

    let limit = 10;
    let offset = 10;
    let employeesTable = $('#employeesTable');

    $('#GetMoreEmployees').click( async _ => {

        try{

            let request = await $.ajax({

                url: '/get-more-employees',
                method: 'GET',
                data: {
                    offset: offset,
                    limit: limit,
                }
            });

            let employees = JSON.parse( request );

            offset += +employees.length;


            employees.forEach( employee => {
                employeesTable.append( GetEmployeeRowTemplate( employee ) );
            });

        }//try
        catch( ex ){

            console.log('EXCEPTION:' , ex);

        }//catch

    } );



    $('body').on( 'click' , '.orderBy' , async function (){

        limit = 10;
        offset = 0;

        try{

            let orderType = $(this).data('order-type');
            let column = $(this).data('column');

            orderType = orderType === 'asc' ? 'desc' : 'asc';

            let employees = await $.ajax({

                url: '/get-more-employees',
                method: 'GET',
                data: {
                    offset: offset,
                    limit: limit,
                    order: orderType,
                    column: column
                }
            });

            employeesTable.children().remove();

            offset += +employees.length;

            employees.forEach( employee => {
                employeesTable.append( GetEmployeeRowTemplate( employee ) );
            });

            $(this).data('order-type' , orderType);
            $(this).text(`#${column} (${orderType})`);

        }//try
        catch( ex ){

            console.log('EXCEPTION:' , ex);

        }//catch

    } );

} );