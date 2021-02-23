@extends('layouts.index')

@section('contentheader')
                <h1>Lste des visites</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Tableau de bord
                        </a>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                    <li class="active">Visite</li>
                </ol>
@endsection


@section('contenu')
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading clearfix">
                    <h3 class="panel-title pull-left add_remove_title">
                        <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Liste des visites
                    </h3>
                    <div class="pull-right">                 
                    <button class="btn btn-primary pull-right mb-12 mr-3"> Ajouter
                    <a href="/visite/create"> 
                    <i class="livicon" data-name="plus" data-size="25" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                    </button>
                    </a>
                   </div>
            </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                    <table class="table table-responsive table-bordered" id="table">
                            <thead>
                                <tr class="filters">
                             
                                <th>Nom</th>
                                <th>Premon</th>
                                <th>Sexe</th>
                                <th>Date</th>
                                <th>Email</th>
                                <th>Heure Entrer</th>                                                                                                                   
                                <th>Heure de sortie</th>
                                <th>Motife de visite</th>                                                                                     
                                <th>Nom de la Pièce</th>
                                <th>Numero de laPièce</th>
                                <th>Depatement</th>  
                                <th>Personnel visité</th>     
                                <th>Action</th>               
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($visites as $v)
                                <tr>
                                   
                                    <td>
                                        {{ isset($v->visiteur) ? $v->visiteur->nom : null}}   
                                    </td>
                                    <td>
                                        @if(isset($v->visiteur))
                                        {{ $v->visiteur->prenom}} 
                                         @endif
                                    </td>
                                    <td>
                                        {{ isset($v->visiteur->sexe) ? $v->visiteur->sexe == "H" ? 'Homme' : 'Femme' : null}}                   
                                    </td>
                                    <td>
                                        {{ $v->date}}
                                    </td>
                                    <td>
                                        {{ isset($v->visiteur) ? $v->visiteur->email : null}}               
                                    </td>
                                    <td>
                                        {{ $v->heure_debut}}
                                    </td>
                                    <td>
                                        {{ $v->heure_fin}}                                          
                                    </td>                                                                                                             
                                    <td>
                                        {{ $v->objet }}  
                                    </td>                               
                                    <td>
                                        @if(isset($v->visiteur))
                                        @if(isset($v->visiteur->piece))
                                            {{ $v->visiteur->piece->nom }}
                                            @endif  
                                        @endif  
                                    </td>                                           
                                    <td>
                                        @if(isset($v->visiteur))
                                            @if(isset($v->visiteur->piece))
                                            {{ $v->visiteur->piece->nomero }}
                                            @endif  
                                        @endif  
                                    </td>                                   
                                    <td>
                                        @if(isset($v->departement))
                                            {{ $v->departement->name }}  
                                        @endif  
                                    </td>  
                                     <td>
                                        @if(isset($v->userVisiter))
                                            {{ $v->userVisiter->name }}  
                                        @endif  
                                    </td>                                                                                                     
                                    <td>
                                        <a href="{{ '/visite/'.$v->id.'/edit' }}" class="btn-xs purple">
                                            <i class="livicon" data-name="pen" data-loop="true" data-color="#000" data-hovercolor="black" data-size="14"></i>       
                                        </a>
                                        <a href="{{ 'visite/'.$v->id.'/delete' }}" class="btn-xs black">
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

</div>
@endsection