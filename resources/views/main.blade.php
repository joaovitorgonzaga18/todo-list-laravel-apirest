<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Lista de tarefas</title>
    <script src="{{ asset('js/jquery-3.7.1.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/loadingoverlay.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-size: 14px;
        }

        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        .tabela {
            height: 400px;
            max-height: 400px;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        .tabela thead th {
            position: sticky;
            top: 0;
            z-index: 1;
        }

        .hidden {
            display: none;
        }
    </style>

</head>

<body>

    <div class="modal fade modal-lists" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modal-content">
                @include('modallist');
            </div>
        </div>
    </div>

    <div class="modal fade modal-tasks" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modal-content">
                @include('modaltask');
            </div>
        </div>
    </div>


    <div class="container-fluid" style="padding: 0px 30px;">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Listas de Tarefas</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 tabela">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody id="tabela-listas">
                            </tbody>
                        </table>
                        <span class="text-center" id="span-listas">Clique em 'Nova Lista' para visualizá-la aqui</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="margin-top: 20px; text-align: center;">
                        <button type="button" class="btn btn-success" onclick="" data-toggle="modal" data-target=".modal-lists"><i class="fa-solid fa-plus"></i> Nova Lista</button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <h2 id="titulo-nome-lista">Tarefas da lista</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 tabela">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr class="text-center">
                                    <th scope="col">ID</th>
                                    <th scope="col">Descrição</th>
                                    <th scope="col">Ações</th>
                                </tr>
                            </thead>
                            <tbody id="tabela-tarefas">
                            </tbody>
                        </table>
                        <span class="text-center" id="span-tarefas">Clique em uma lista para visualizar suas tarefas aqui.</span>
                    </div>
                </div>
                <div class="row" id="btn-nova-tarefa" style="display:none;">
                    <div class="col-md-12" style="margin-top: 20px; text-align: center;">
                        <button type="button" class="btn btn-success" onclick="" data-toggle="modal" data-target=".modal-tasks"><i class="fa-solid fa-plus"></i> Nova tarefa</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    <script>
        load_lists();
    </script>
</body>

</html>