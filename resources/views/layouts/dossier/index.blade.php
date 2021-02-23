@extends('layouts.index')

@section('contentheader')
                <h1>Liste des Dossiers</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i>Tableau de bord
                        </a>
                    </li>
                    <li>
                        <a href="#">Dossier</a>
                    </li>
                    <li class="active">Liste des Dossiers</li>
                </ol>
@endsection


@section('contenu')
<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left add_remove_title">
                <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Liste des Dossiers
                  </h3>
                      <div class="col-12">
                         <button class="btn btn-primary pull-right mb-12 mr-3"> Ajouter
                        <a href="/dossier/create"> 
                         <i class="livicon" data-name="plus" data-size="25" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                             </button>
                        </a>
                         </div>
                         </div> 
                           <div class="panel-body"> 
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr class="filters">
                                     
                                        <th>Nom du visiteur</th>  
                                        <th>Prenom du visiteur </th>  
                                        <th>Nom du dossier </th>  
                                        <th>Actions</th>                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dossiers as $dossier)
                                     <tr>
                                        <td>
                                       
                                       @if(isset($dossier->visiteurs) && count($dossier->visiteurs) > 0)
                                            {{ $dossier->visiteurs[0]->nom }}
                                        @endif
                                        </td>
                                        <td>
                                        @if(isset($dossier->visiteurs) && count($dossier->visiteurs) > 0)
                                            {{ $dossier->visiteurs[0]->prenom}}
                                        @endif
                                        </td>

                                        <td>
                                         <a href="/dossier/{{$dossier->id}}">
                                        @if(isset($dossier->nom))
                                            {{ $dossier->nom }}
                                        @endif
                                        </a>
                                        </td>                                                               
                                        <td>
                                         <a href="{{ '/dossier/'.$dossier->id.'/edit' }}" class="btn-xs purple">
                                         <i class="livicon" data-name="pen" data-loop="true" data-color="#000" data-hovercolor="black" data-size="14"></i>                                
                                         </a>
                                         <a href="{{ '/dossier/'.$dossier->id.'/delete' }}" class="btn-xs black">
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

</div>
@endsection