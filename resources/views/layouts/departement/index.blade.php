@extends('layouts.index')

@section('contentheader')
<h1>Agendat</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.html">
            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>Tableau de bord
        </a>
    </li>
    <li>
        <a href="#"></a>
    </li>
    <li class="active">Agendat</li>
</ol>
@endsection


@section('contenu')
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left add_remove_title">
                <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Liste des Departements
            </h3>
           
        </div>
        <div class="panel-body"> 
            <table class="table table-bordered" id="table">
                <thead>
                    <tr class="filters">
                        
                        <th>Nom du Departement</th> 
                       
                    </tr>
                </thead>
                <tbody>
                   @foreach($departement as $departement)
                    <tr>
                                        
                                         <td>
                                          <a href="/departement/{{$departement->id}}">
                                            {{ $departement->name }}
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