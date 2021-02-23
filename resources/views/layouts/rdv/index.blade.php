@extends('layouts.index')

@section('contentheader')
                <h1>Lste des rendez-vous</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Tableau de bord
                        </a>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                    <li class="active">Rendez-vous</li>
                </ol>
@endsection
@section('contenu')
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left add_remove_title">
                <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Liste des Rendez-vous
                    </h3>
                    <div class="pull-right">
                    <button class="btn btn-primary pull-right mb-12 mr-3"> Ajouter
                    <a href="/Rdv/create"> 
                    <i class="livicon" data-name="plus" data-size="25" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                    </button>
                    </a>
                </div>
            </div>
            
           <div class="panel-body"> 
            <div class="col-xs-12 pull-left nopadmar">
            <table class="table table-bordered table-responsive" id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Nom</th>
                                        <th>Prenom</th>   
                                        <th>Email</th>
                                         @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null)                                                                                                                                                          
                                        <th>Departement</th>  
                                        @endif                                                                           
                                        <th>Date</th>                                                                                                                   
                                        <th>Heure de début</th>
                                        <th>Heure de fin</th>
                                         
                                        <th>Etat</th>
                                        
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rdvs as $rdv)
                                    <tr>
                                        
                                        <td>
                                           {{ $rdv->nom}} 
                                        </td>
                                        <td>
                                           {{ $rdv->prenom}} 
                                        </td>
                                         <td>
                                           {{ $rdv->email}}
                                        </td>
                                         @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null)
                                         <td>
                                           {{ $rdv->name}}
                                         </td>
                                         @endif
                                        
                                        <td>
                                            {{ $rdv->date_prev}}
                                        </td>
                                        <td>
                                            {{ $rdv->heure_debut_prev}}
                                        </td>
                                        <td>
                                            {{ $rdv->heure_fin_prev }}                                          
                                        </td>                                                                               
                                        
                                       
                                        <td>
                                            <a href="/Rdv/etat/{{$rdv->id}}">
                                                <div class="form-group">
                                                    @if ($rdv->etat == 0 )
                                                        EN COURS   
                                                    @elseif($rdv->etat == 1)
                                                    VALIDER
                                                    @else
                                                        PAS VALIDER
                                                    @endif         
                                                </div> 
                                            </a>
                                        </td>
                                                                     
                                        <td>
                                        
                                        @if ($rdv->etat != 1)
                                             <a href="{{ '/Rdv/'.$rdv->id.'/edit' }}" class="btn-xs purple">
                                            <i class="livicon" data-name="pen" data-loop="true" data-color="#000" data-hovercolor='pink' data-size="14"></i>
                                            </a>
                                            @if (auth()->user()->role_id != 4 && auth()->user()->role->departement_id =! null)
                                                <a href="/Rdv/etat/{{$rdv->id}}" class="btn-xs black">
                                                    <i class="livicon" data-name="check" data-size="14" data-c="#000" data-hc="green" data-loop="true"></i>
                                                </a>
                                            @endif
                                                <a href="{{ '/Rdv/'.$rdv->id.'/delete' }}" class="btn-xs black">
                                                <i class="livicon" data-name="trash" data-loop="true" data-color="#000" data-hovercolor="red" data-size="14"></i>          
                                                </a>
                                        @endif
                                        
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
<link rel="stylesheet" type="text/css" href="/vendors/iCheck/css/all.css">
<link rel="stylesheet" type="text/css" href="/vendors/iCheck/css/line/line.css">
<link rel="stylesheet" type="text/css" href="/vendors/bootstrap-switch/css/bootstrap-switch.css">
<link rel="stylesheet" type="text/css" href="/vendors/switchery/css/switchery.css">
<link rel="stylesheet" type="text/css" href="/vendors/awesome-bootstrap-checkbox/css/awesome-bootstrap-checkbox.css">
<link rel="stylesheet" href="css/pages/radio_checkbox.css">
<link rel="/stylesheet" type="text/css" href="/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="/css/pages/tables.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
<script type="text/javascript" src="/vendors/iCheck/js/icheck.js"></script>
<script type="text/javascript" src="/vendors/bootstrap-switch/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="/vendors/switchery/js/switchery.js"></script>
<script type="text/javascript" src="/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js"></script>
<script type="text/javascript" src="/vendors/card/lib/js/jquery.card.js"></script>
<script type="text/javascript" src="/js/pages/radio_checkbox.js"></script>
<script type="/text/javascript" src="/vendors/datatables/js/jquery.dataTables.js"></script>
 <script type="/text/javascript" src="/vendors/datatables/js/dataTables.bootstrap.js"></script>
 <script>
    $(document).ready(function() {
        $('#table').dataTable();
    });
    </script>
@endsection