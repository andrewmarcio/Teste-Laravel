@extends('layouts.app')

@section('active')
active
@endsection

@section('content')
<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Categories</li>
        </ol>
    </nav>

    <div class="row w-100">
        <div class="m-auto">
            @if(session('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{session('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <button class="btn btn-success ml-3" data-toggle="modal" data-target="#add-video-modal">add category or
                    video</button>
            </div>
        </div>
        <div class="card-body">
            <div class="justify-content-center">
                <table class="table" id="table_categories">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Addons</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-danger" id="category-delete"
                                        data-id="{{$category->id}}"><i class="far fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@include('category.modal.register')

@endsection

@section('script')

<script type="text/javascript">
$(document).ready(function() {

    tableInit()

    $('#table_categories').on('click', '#category-delete', function(){
        const category_id = $(this).attr('data-id');
        $('#categoryId').val(category_id)
        $('#form-delete-category').attr('action', `/category/delete/${category_id}`)
        $('#modal-delete-category').modal('show');
    });

    function tableInit() {
        let table = $("#table_categories").DataTable({
            destroy: true,
            retrieve: true,
            responsive: true,
            lengthMenu: [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "Todos"]
            ],
            "columnDefs": [{
                "className": "text-center",
                "targets": [0, 1, 2],
                "responsivePriority": 0,
            }],
            language: {
                sEmptyTable: "Nenhum registro encontrado",
                sInfo: "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                sInfoEmpty: "Mostrando 0 até 0 de 0 registros",
                sInfoFiltered: "(Filtrados de _MAX_ registros)",
                sInfoPostFix: "",
                sInfoThousands: ".",
                sLengthMenu: "_MENU_ resultados por página",
                sLoadingRecords: "Carregando...",
                sProcessing: "Processando...",
                sZeroRecords: "Nenhum registro encontrado",
                sSearch: "Pesquisar",
                oPaginate: {
                    sNext: "Próximo",
                    sPrevious: "Anterior",
                    sFirst: "Primeiro",
                    sLast: "Último"
                },
                oAria: {
                    sSortAscending: ": Ordenar colunas de forma ascendente",
                    sSortDescending: ": Ordenar colunas de forma descendente"
                }
            }
        })

        return table

    } // end funtion

})
</script>
@endsection