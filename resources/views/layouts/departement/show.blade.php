
@extends('layouts.index')

@section('contentheader')
                <h1>@if(isset($departement)) {{$departement->name}}@endif</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li class="active">Departement</li>
                </ol>
@endsection

@section('contenu')
 <div class="panel panel-info" id="hidepanel2">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="eye-open" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                    Visite
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>                                  
                                </span>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" action="#" method="post">
                                  <table class="table table-bordered" id="table">                                                                                                      
                                     <thead>
                                    <tr class="filters">
                                        
                                        <th>Nom</th>
                                        <th>Prenom</th>                                                                                                                   
                                        <th>Date</th>
                                        <th>Heure d entrée</th>
                                        <th>Heure de sortie</th>
                                        <th>Nom de la pièce</th>
                                        <th>Numero de la pièce</th>                                                                                                                  
                                     </tr>
                                </thead>
                                <tbody>
                                    @foreach($departement->visites as $vis)
                                 <tr>
                                  
                                    <td> 
                                      @if(isset( $vis->visiteur))
                                        {{ $vis->visiteur->nom }}
                                      @endif
                                    </td>
                                    <td>
                                        @if(isset( $vis->visiteur))
                                        {{ $vis->visiteur->prenom }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $vis->date}}                                          
                                    </td>
                                     <td>
                                        {{ $vis->heure_debut}}                                          
                                    </td>
                                     <td>
                                        {{ $vis->heure_fin}}                                          
                                    </td>
                                     <td>
                                        {{isset($vis->visiteur->piece) ? $vis->visiteur->piece->nom : null }}                                         
                                    </td>
                                    <td>
                                        {{isset($vis->visiteur->piece) ? $vis->visiteur->piece->nomero : null }}                                         
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                </table>  
                                </form>
                            </div>
                            <!--panel body ends--> </div>

<div class="panel panel-warning" id="hidepanel12">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                     <i class="livicon" data-name="users" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                    Visiteurs
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>                                  
                                </span>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                    <table class="table table-bordered" id="table">
                                     <thead>
                                     <tr class="filters">
                                    
                                     <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Sexe</th>
                                    <th>Pièces</th>
                                    <th>Dossier</th>
                                    <th>Email</th>                                 
                                </tr>
                                </thead>
                                <tbody>
                                 @foreach($visiteurs as $v)
                                 <tr>
                                  
                                    <td>
                                        {{ $v->nom }}
                                    </td>
                                    <td>
                                        {{ $v->prenom }}
                                    </td>

                                    <td>
                                     {{ isset($v->sexe) ? $v->sexe == "H" ? 'Homme' : 'Femme' : null}}                          
                                    </td>
                                    <td>
                                        @if(isset($v->piece))
                                            {{ $v->piece->nom }}
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($v->dossier))         
                                            {{ $v->dossier->nom }}                              
                                        @endif
                                    </td>
                                    <td>
                                        {{ $v->email }}
                                    </td>
                                     @endforeach
                                </tbody>
                                 
                                </table> 
                                   
                                </form>
                            </div>
                            <!--panel body ends--> </div>

<div class="panel panel-danger" id="hidepanel4">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="myspace" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                    Rendez-vous
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>                                
                                </span>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                    <table class="table table-bordered" id="table">
                                <thead>
                                    <tr class="filters">
                                       
                                        <th>Nom</th>
                                        <th>Prenom</th>                                                                                                                   
                                        <th>Date</th>
                                        <th>Heure de début</th>
                                        <th>Heure de fin</th>
                                         <th>Email</th>
                                        <th>Etat</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($departement->rdvs as $r)
                                    <tr>
                                   
                                     <td>
                                     @if(isset( $vis->visiteur))
                                        {{ $r->visiteur->nom }}
                                     @endif
                                     </td>
                                     
                                     <td>
                                     @if(isset( $vis->visiteur))
                                        {{ $r->visiteur->prenom}}
                                     @endif
                                     </td>
                                     <td>
                                        {{ $r->date_prev }}
                                     </td>
                                      <td>
                                        {{ $r->heure_debut_prev }}
                                     </td>
                                      <td>
                                        {{ $r->heure_fin_prev }}
                                     </td>
                                     <td>
                                     @if(isset( $vis->visiteur))
                                        {{ $r->visiteur->email }}
                                        @endif
                                     </td>
                                      <td>
                                      <a href="/Rdv/etat/{{$r->id}}">
                                                <div class="form-group">
                                                    @if ($r->etat == 0)
                                                        EN COURS   
                                                    @elseif($r->etat == 1)
                                                    VALIDER
                                                    @else
                                                        PAS VALIDER
                                                    @endif         
                                                </div> 
                                    </td>
                                    <tr>
                                    
                                @endforeach
                                </tbody>
                                </table>

                                </form>
                            </div>
                            <!--panel body ends--> </div>
     <div class="panel panel-default" id="hidepanel3">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="user" data-size="20" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                   Personnels
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <form role="form">
                                   <table class="table table-bordered" id="table">                                                                                                      
                                     <thead>
                                    <tr class="filters">
                                       
                                        <th>Nom</th>
                                        <th>Prenom</th>                                                                                                                   
                                        <th>Titre</th>
                                        <th>Date prise fonction</th>
                                        <th>Sexe</th>
                                        <th>contact</th>
                                        <th>Email</th> 
                                     </tr>
                                </thead>
                                <tbody>
                                 @foreach($departement->users as $p)
                                    <tr>
                                   
                                     <td> 
                                     {{ isset($p->name) ? $p->name : null}}                            
                                     </td>                                     
                                     <td>                                    
                                       {{ isset($p->prenom) ? $p->prenom : null}}                              
                                     </td>                                       
                                       <td>                                   
                                        {{ isset($p->titre) ? $p->titre->libelle : null}}                                 
                                      </td>
                                     <td>
                                        {{ $p->datepf }}
                                     </td>
                                      <td>                                 
                                         {{ isset($p->sexe) ? $p->sexe == "H" ? 'Homme' : 'Femme' : null}}
                                     </td>                                  
                                     <td>
                                        {{ $p->contacte }} 
                                     </td>
                                      <td>
                                        {{ $p->email }}
                                    </td>
                                    <tr>
                                    
                                @endforeach
                                </tbody>
                                </table>
                                </form>
                            </div>
                            <!--panel body ends--> </div>
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