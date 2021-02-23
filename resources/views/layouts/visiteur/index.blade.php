@extends('layouts.index')

@section('contentheader')
<h1>Liste des visiteurs</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.html">
            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>Tableau de bord
        </a>
    </li>
    <li>
        <a href="#"></a>
    </li>
    <li class="active">Liste des visiteurs</li>
</ol>
@endsection


@section('contenu')
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left add_remove_title">
                <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Liste des visiteurs
            </h3>
            <div class="pull-right">
                <a href="/visiteur/create" class="pull-right  mb-5 mr-3"> 
                    <button type="button" class="btn btn-primary btn-sm" id="addButton">
                        <i class="livicon" data-name="plus" data-size="15" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                        Ajouter
                    </button>
                </a>
            </div>
        </div>
        <div class="panel-body"> 
            <table class="table table-bordered" id="table">
                <thead>
                    <tr class="filters">
                       
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Sexe</th>
                        <th>Piéces</th>
                        <th>Numero de lPiéces</th>
                     {{--<th>Dossier_Id</th>--}}
                        <th>Email</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($visiteurs as $visiteur)
                    <tr>
                       
                        <td>
                            {{ $visiteur->nom }}
                        </td>
                        <td>
                            {{ $visiteur->prenom }}
                        </td>
                        <td>
                         {{ isset($visiteur->sexe) ? $visiteur->sexe == "H" ? 'Homme' : 'Femme' : null}}
                        </td>
                        <td>
                            @if(isset($visiteur->piece))
                                {{ $visiteur->piece->nom }}
                            @endif
                        </td>
                        <td>
                            @if(isset($visiteur->piece))
                                {{ $visiteur->piece->nomero }}
                            @endif
                        </td>
                       {{-- <td>
                            @if(isset($visiteur->dossier))
                                <a href="/dossier/{{$visiteur->dossier->id}}">
                                {{ $visiteur->dossier->nom }}
                                </a>
                            @endif
                        </td>--}}
                        <td>
                            {{ $visiteur->email }}
                        </td>
                        
                        <td>
                            <a href="{{ '/visiteur/'.$visiteur->id.'/edit' }}" class="btn-xs purple">
                                <i class="livicon" data-name="pen" data-loop="true" data-color="#000" data-hovercolor="black" data-size="14"></i>
                            </a>
                            <a href="{{ '/visiteur/'.$visiteur->id.'/delete' }}" class="btn-xs black">
                                <i class="livicon" data-name="trash" data-loop="true" data-color="#000" data-hovercolor="black" data-size="14"></i>                          
                            </a>
                        </td>
                    </tr>
                    @endforeach                   
                </tbody>
            </table>
        </div>
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
@endsection