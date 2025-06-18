localStorage.setItem('jwt_token', 'YOUR_GENERATED_TOKEN_HERE')

const token = localStorage.getItem('jwt_token')

function load_lists() {
	
	$("body").LoadingOverlay("show")

    $.ajax({
        headers: {
          'Authorization': `Bearer ${token}`
        },
        type: 'GET',
        dataType: "json",
        url: "/api/lists/",
        success: function (response) {
            $("#tabela-listas").html('')
            $.each(response, function(index, list) {
                $("#tabela-listas").append('<tr class="text-center">' +
                    '<th>' + list.id + '</th>' +
                    '<td>' + list.name + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-primary" onclick="load_tasks(' + list.id + ')"><i class="fa-solid fa-eye"></i></button>' +
                    '</td>' +
                    '</tr>');
            })

            $("#span-listas").css("display", "none")
            $("body").LoadingOverlay("hide")
        }
    })         


}

function load_tasks(list_id) {
	
	$("body").LoadingOverlay("show")    
    
	$("#list_id").val(list_id)   

    $.ajax({
        headers: {
          'Authorization': `Bearer ${token}`
        },
        type: 'GET',
        dataType: "json",
        url: "/api/tasks/bylistid/"+list_id,
        success: function (response) {
            $("#tabela-tarefas").html('')
            $.each(response, function(index, task) {
                $("#tabela-tarefas").append('<tr class="text-center">' +
                    '<th>' + task.id + '</th>' +
                    '<td>' + task.name + '</td>' +
                    '<td>' +
                    '<button type="button" class="btn btn-'+ ((task.done == 0) ? 'success' : 'danger') +'" onclick="change_status(' + task.id + ')"><i class="fa-solid fa-'+ ((task.done == 0) ? 'check' : 'xmark') +'"></i></button>' +
                    '<button type="button" class="btn btn-primary" onclick="load_task_form(' + task.id + ')" data-toggle="modal" data-target=".modal-tasks"><i class="fa-solid fa-pen-to-square"></i></button>' +
                    '</td>' +
                    '</tr>');
            })

            $("#span-tarefas").css("display", "none")
            $("#btn-nova-tarefa").css("display", "block")
            $("body").LoadingOverlay("hide")

        },
        error: function(response) {
            alert(response.error)
        }
    })
}

function clear_forms() {    
    $("#list-name").val("")
    $("#task-name").val("")
    $("#task_id").val(0)
}

function load_task_form(task_id) {    
	$("body").LoadingOverlay("show")    
    $.ajax({
        headers: {
          'Authorization': `Bearer ${token}`
        },
        type: 'GET',
        dataType: "json",
        url: "/api/tasks/"+task_id,
        success: function (response) {
            $("#task-name").val(response.name)
            $("#task_id").val(response.id)
            $("body").LoadingOverlay("hide")
        },
        error: function(response) {
            alert(response.error)
        }
    })
}

function change_status(task_id) {
    $.ajax({
        headers: {
          'Authorization': `Bearer ${token}`
        },
        type: 'PUT',
        dataType: "json",
        url: "/api/tasks/changestatus/"+task_id,
        success: function (response) {
            load_tasks(response.list_id)
        },
        error: function(response) {
            alert(response.error)
        }
    })
}

$(document).ready(function() {

    $('#form-cadastro-lista').submit(function(event) {
    
        event.preventDefault();
        
        $.ajax({
            headers: {
              'Authorization': `Bearer ${token}`
            },
            type: 'POST',
            url: '/api/lists/create',
            data: {'name' : $("#list-name").val()},
            success: function (data) {
                alert('Lista cadastrada com sucesso!');
                console.log(data);                
                load_lists()
                clear_forms()
            },
            error: function(response) {
                alert(response.error)
            }
        });
    });

    $('#form-cadastro-tarefa').submit(function(event) {
    
        event.preventDefault();

        const task_id = $("#task_id").val()
        const url = (task_id > 0) ? '/api/tasks/update/' + task_id : '/api/tasks/create'
        const type = (task_id > 0) ? 'PUT' : 'POST'
        
        $.ajax({
            headers: {
              'Authorization': `Bearer ${token}`
            },
            type: type,
            url: url,
            data: {'list_id' : $("#list_id").val(), 'name' : $("#task-name").val()},
            success: function (data) {
                alert('Tarefa cadastrada com sucesso!');
                console.log(data);
                load_tasks(data.list_id)
                clear_forms()
            },
            error: function(response) {
                alert(response.error)
            }
        });
    });
    
})