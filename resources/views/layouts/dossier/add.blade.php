@extends('layouts.index')

@section('contentheader')
    <h1>Ajouter un Dossier</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Tableau de bord
            </a>
        </li>
        <li>
            <a href="#"></a>
        </li>
        <li class="active">Ajouter un Dossier</li>
    </ol>
@endsection
@section('contenu')


<div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ajouter un Dossier</h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                               
                        <form id="" method="post" class="form-horizontal" action="/dossier">
                            @csrf                           
                            <div class="center">                          
                                <div  class="col-md-12">
                                    <div class="form-group ui-draggable-handle" style="position: static;">
                                        <label for="input-text-3">Liste des visiteurs</label>
                                        <select id="selectbasic" name="visiteur" class="form-control">
                                                <option > __ __ __ __ __ __ __ __ </option>
                                                @foreach ($visiteurs as $visiteur)
                                                    <option value="{{$visiteur->id}}">{{$visiteur->nom . ' ' . $visiteur->prenom}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group ui-draggable-handle" style="position: static;">
                                        <label for="input-text-1">Le nom du Dossier</label>
                                        <input type="" class="form-control" name="nom" placeholder="Dossier">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                        Date 
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input class="form-control flatpickr" type="date" data-dateFormat="Y-m-d" id="alt" name="date" placeholder="Date de Naissance" />
                                        </div>                                 
                                    </div>  
                                    <div class="" id="hidepanel4">
                                     
                                        <span class="pull-right">                                    
                                        <button id="ajouterpiecebtn" class="btn btn-info">+ Ajouter une pièce</button> 
                                       {{-- <button id="ajouterpiecebtn" class="btn btn-success">Imprimer Recipicé</button>--}}
                                        </span> 
                                        </h3>                                     
                                        <div  class="col-md-15">                                                                          
                                        </div>                           
                                </div>

                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <input type="hidden" id="nbrepiece" class="form-control" value="1" name="nombrepiece" placeholder="Enter le nom">
                                </div> 
                                <div class="form-group ui-draggable-handle" style="position: static;">
                                     <label for="input-text-3">Type de pièce</label>
                                       <select id="selectbasic" name="nompiece[]" class="form-control">
                                        <option type="" value="{{ null }}"> __ __ __ __ __ __ __ __ </option>
                                        @foreach ($type_pieces as $type_piece)
                                            @if(old('type_piece') == $type_piece->id)
                                                <option value="{{$type_piece->libelle}}" selected >{{$type_piece->libelle .' '}}</option>
                                            @else
                                                <option value="{{$type_piece->libelle}}">{{$type_piece->libelle.' '}}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                             </div> 
                                         <div id="formcontent"></div>                                                   
                                    <div class="form-group">
                                    <label class="col-md-4 control-label" for="button1id"></label>
                                        <div class="col-md-8">                                                    
                                    <button type="submit" class="btn btn-success">Valider</button>
                                    <button type="reset" class="btn btn-danger">Annuler</button>
                                        </div>
                                    </div>                  
                                </div>
                               
                            </div>
                        </form>
                    </div>


<!-- -------------------------- -->

@endsection

