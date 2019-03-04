;"use strict";

// $(document).ready( async _ => {
//
//
//     console.log('READY!');
//
//     let response = await fetch( '/get-employees' );
//     let employees = await response.json();
//
//
//     let data = [];
//
//     employees.forEach( employee => {
//
//         data.push({
//             text: `${employee.FirstName} ${employee.SecondName} ${employee.LastName} (${employee.position.PositionTitle})`,
//             href: employee.id,
//
//             nodes:[
//
//             ]
//         });
//
//     } );
//
//     $('#employeesTree').treeview({
//         data: data,
//
//     });
//
//     $('#employeesTree').treeview('collapseAll', { silent: true });
//
//
//     $('#employeesTree').on('nodeExpanded ', async function(event, data) {
//
//         console.log('data' , data);
//
//         let response = await $.ajax({
//             url: `/get-employeesByBoss`,
//             method: 'GET',
//             data:{
//                 offset:10,
//                 limit:1,
//                 id: data.href
//             }
//         });
//
//         console.log('response' , response);
//
//         let employees = JSON.parse(response);
//
//         let childrenNodes = [];
//
//         employees.forEach( employee => {
//
//             childrenNodes.push({
//                 text: `${employee.FirstName} ${employee.SecondName} ${employee.LastName} (${employee.position.PositionTitle})`,
//                 href: employee.id,
//
//             });
//
//         } );
//
//         //https://github.com/jonmiles/bootstrap-treeview/tree/develop
//         /*
//         * это ссылка на дерево, оно вроде такое же, нотам добавлены методы,  там есть метод добавления но он его не находит
//         * */
//         // $('#employeesTree').treeview('addNode',[childrenNodes , data ,false, { silent: true } ]);
//         $('#employeesTree').treeview('addNodeAfter',[childrenNodes , data ,false, { silent: true } ]);
//
//
//     });
//
//
// } );


$(document).ready( async _ => {

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


} );