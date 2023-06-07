$(function () {
    let edit = false;
    console.log('JQuery is working');
    $('#task-result').hide();
    fetchTasks();
    
    $('#task-form').submit(function (e) {
        const postData = {
            codprod: $('#codprod').val(),
            nombre: $('#nombre').val(),
            precio: $('#precio').val(),
            cantidad: $('#cantidad').val(),
        };

        let url = edit === false ? 'task-add.php' : 'task-edit.php';
        console.log(url);
        $.post(url, postData, function (response) {
            console.log(response);
            fetchTasks();
            $('#task-form').trigger('reset');
        });
        e.preventDefault();
    });

    function fetchTasks() {
        $.ajax({
            url: 'task-list.php',
            type: 'GET',
            success: function (response) {
                let tasks = JSON.parse(response);
                let template = '';
                console.log(response);
                tasks.forEach(task => {
                    template += `
                        <tr codprod="${task.codprod}">
                            <td style="padding-right: 70px;">${task.codprod}</td>
                            <td style="padding-right: 05px;">${task.nombre}</td>
                            <td style="padding-right: 55px;">${task.precio}</td>
                            <td style="padding-right: 10px;">${task.cantidad}</td>
                            <td></td>
                            <td style="padding-right: 0px;">
                                <button class="btn btn-danger task-delete">Borrar</button>
                                <button class="btn btn-primary task-edit">Modificar</button>
                            </td>
                        </tr>
                    `;
                });
    
                $('#tasks').html(template);
            }
        });
    }
        });
    

        $(document).on('click', '.task-delete', function () {
            swal({
                title: "¿Estás seguro de eliminar?",
                text: "Una vez eliminado, no podrás recuperar el registro.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    let element = $(this)[0].parentElement.parentElement;
                    let codprod = $(element).attr('codprod');
                    console.log(codprod);
                    $.post('task-delete.php', { codprod }, function (response) {
                        fetchTasks(); // Actualiza la tabla después de eliminar
                    });
                    swal("Tu producto fue eliminado exitosamente", {
                        icon: "success",
                    });
                } else {
                    swal("Tu tarea está segura.");
                }
            });
        });
        

$(document).on('click', '.task-edit', function () {
    let element = $(this)[0].parentElement.parentElement;
    let codprod = $(element).attr('codprod');

    console.log(codprod);
    $('#confirmModal1').modal('show');

    // Carga los datos en el formulario del modal
    let nombre = $(element).find('td:nth-child(2)').text().trim();
    let precio = $(element).find('td:nth-child(3)').text().trim();
    let cantidad = $(element).find('td:nth-child(4)').text().trim();

    $('#confirmModal1 input[name="cod"]').val(codprod);
    $('#confirmModal1 input[name="nombre"]').val(nombre);
    $('#confirmModal1 input[name="cantidad"]').val(cantidad);
    $('#confirmModal1 input[name="precio"]').val(precio);

    // También puedes cargar otros campos del formulario con los datos correspondientes.

    // Puedes escuchar el evento de envío del formulario del modal y realizar la actualización en el servidor.

});