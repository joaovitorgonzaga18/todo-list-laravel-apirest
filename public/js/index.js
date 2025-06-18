function load_lists() {
	
	$("body").LoadingOverlay("show")

    $.ajax({
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
                    '<button type="button" class="btn btn-'+ ((task.done == 0) ? 'success' : 'danger') +'" onclick="update_task(this, ' + task.list_id + ')"><i class="fa-solid fa-'+ ((task.done == 0) ? 'check' : 'xmark') +'"></i></button>' +
                    '<button type="button" class="btn btn-primary" onclick=""><i class="fa-solid fa-pen-to-square"></i></button>' +
                    '</td>' +
                    '</tr>');
            })

            $("#span-tarefas").css("display", "none")
            $("#btn-nova-tarefa").css("display", "block")
            $("body").LoadingOverlay("hide")

        },
        error: function(response) {

        }
    })
}

function update_task(btn, task_id) {

}

$(document).ready(function() {

    $('#form-cadastro-lista').submit(function(event) {
    
        event.preventDefault();
        
        $.ajax({
            type: 'post',
            url: '/api/lists/create',
            data: {'name' : $("#list-name").val()},
            success: function (data) {
                console.log('Lista cadastrada com sucesso!');
                console.log(data);
                load_lists()
            },
            error: function (data) {
                console.log('Houve um erro ao cadastrar a lista.');
                console.log(data);
            },
        });
    });

    $('#form-cadastro-tarefa').submit(function(event) {
    
        event.preventDefault();
        
        $.ajax({
            type: 'post',
            url: '/api/tasks/create',
            data: {'list_id' : $("#list_id").val(), 'name' : $("#task-name").val()},
            success: function (data) {
                console.log('Tarefa cadastrada com sucesso!');
                console.log(data);
                load_tasks(data.list_id)
            },
            error: function (data) {
                console.log('Houve um erro ao cadastrar a tarefa.');
                console.log(data);
            },
        });
    });
    
})