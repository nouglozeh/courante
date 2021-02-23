@extends('layouts.index')

@section('contentheader')
                <h1> Liste des personnels</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Tableau de bord
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                    <li class="active"> Liste des personnels</li>
                </ol>
@endsection


@section('contenu')
                 <div class="panel panel-default" id="hidepanel3">
                            <div class="panel-heading">
                            <div class="panel-heading clearfix">
                            <h3 class="panel-title pull-left add_remove_title">
                                <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Liste des personnels
                                    </h3>
                                    <div class="pull-right">
                                    <button class="btn btn-primary pull-right mb-12 mr-3"> Ajouter
                                    <a href="/personnel/create"> 
                                    <i class="livicon" data-name="plus" data-size="25" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                    </button>
                                    </a>
                                </div>                                                                                                                                             
                             </div>                           
                                <span class="pull-right">
                                  
                                </span>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr class="filters">
                                       
                                        <th>Nom</th>
                                        <th>Prenon</th>
                                        <th>Titre</th>
                                        <th>Departement</th>
                                        <th>Date de prise de fonction</th>
                                        <th>sexe</th>
                                        <th>Contact</th>
                                        <th>Email</th>                                                                                                       
                                       <th>Actions</th>
                                    </tr>
                                </thead>
                           <tbody>
                                    @foreach($personnel as $per)
                                    <tr>
                                      
                                        <td>
                                            {{ $per->name }}
                                        </td>
                                        <td>
                                            {{ $per->prenom}}
                                        </td>
                                        <td>
                                            {{ isset($per->titre) ?  $per->titre->libelle : null }}                                          
                                        </td>
                                         <td>
                                            {{ isset($per->departement) ?  $per->departement->name : null }}                                          
                                        </td>
                                        <td>
                                           {{ $per->datepf}} 
                                        </td>
                                        <td>
                                           {{ isset($per->sexe) ? $per->sexe == "H" ? 'Homme' : 'Femme' : null}}  
                                        </td>
                                        <td>
                                           {{ $per->contacte }}  
                                        </td>
                                        <td>
                                           {{ $per->email}}  
                                        </td>
                                    
                                        <td>

                                            <a href="{{ '/personnel/'.$per->id.'/edit' }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ '/personnel/'.$per->id.'/delete' }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                 
                                </tbody>
                            </table>
                        </form>
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

</div>
@endsection