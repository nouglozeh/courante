@extends('layouts.index')

@section('contentheader')

                <h1>@if(isset($dossier->nom))
                {{$dossier->nom}}
                @endif
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li class="active">@if(isset($dossier->nom))
                {{$dossier->nom}}
                @endif</li>
                </ol>
@endsection


@section('contenu')
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left add_remove_title">
                <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Liste des piéces
            </h3>
            <div class="pull-right">
                <a href='/dossier/show/{{$dossier->id}}' class="pull-right  mb-5 mr-3"> 
                    <button type="button" class="btn btn-primary btn-sm" id="addButton">
                       Imprimer Recipicé
                    </button>
                </a>
            </div>
        </div>
                        <div class="panel-body">
                         <form role="form"> 
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Nom de la piéce</th>                                  
                                        <th>Actions</th>                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($dossier->pieces))
                                    @foreach($dossier->pieces as $piece)
                                    <tr>
                                        
                                        <td>
                                        @if(isset($piece->nom))
                                            {{ $piece->nom }}
                                        @endif    
                                        </td>                                                                         
                                        <td>
                                            <a href="{{ '/piece/'.$piece->id.'/edit' }}" class="btn-xs purple">
                                            <i class="livicon" data-name="pen" data-loop="true" data-color="#000" data-hovercolor="black" data-size="14"></i>                                
                                            </a>

                                            <a href="{{ '/piece/'.$piece->id.'/delete' }}" class="btn-xs black">
                                            <i class="livicon" data-name="trash" data-loop="true" data-color="#000" data-hovercolor="black" data-size="14"></i>                               
                                            </a>                                          
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif   
                                </tbody>
                            </table>
                            </form>
                        </div>
                      </div>


                            @endsection

                            @section('css')
                            <link rel="/stylesheet" type="text/css" href="/vendors/datatables/css/dataTables.bootstrap.css" />
                            <link href="/css/pages/tables.css" rel="stylesheet" type="text/css" />
                            @endsection

                            @section('js')
                            <script type="/text/javascript" src="vendors/datatables/js/jquery.dataTables.js"></script>
                            <script type="/text/javascript" src="vendors/datatables/js/dataTables.bootstrap.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#table').dataTable();
                                });
                                </script>

                            </div>
                            @endsection