@extends('layouts.index')

@section('contentheader')
                <h1>Ajouter un Dossier</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li class="active">Ajouter un Dossier</li>
                </ol>
@endsection



@section('contenu')



<div class="col-md-10">
                        <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                             <span class="pull-right" style="margin-top: 10px;">
                                   <button ton id="ajouterpiecebtn" class="btn btn-info">+ Ajouter une pièce à ce Dossier</button> 
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>
                                  
                                </span>
                                <h3 class="panel-title">Ajouter un Dossier</h3>
                              </div>
                            </div>
                            <div class="panel-body">
                               
                        <form id="" method="post" class="form-horizontal" action="/dossier/edit">     
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}" />
                            <div class="center">                          
                                <div  class="col-md-12">
                                    <div class="form-group ui-draggable-handle" style="position: static;">
                                        <label for="input-text-3">Liste des visiteurs</label>
                                        <select id="selectbasic" name="visiteur" class="form-control">
                                                <option > __ __ __ __ __ __ __ __ </option>
                                                 @foreach ($visiteurs as $d1)
                                                    @if($data->visiteurs[0]->id == $d1->id)                                                                                        
                                                        <option @if(isset($d1->id)) value="{{$d1->id}}" selected> {{$d1->nom . ' ' . $d1->prenom}} @endif </option>        
                                                    @else
                                                        <option @if(isset($d1->id)) value="{{$d1->id}}"> {{$d1->nom . ' ' . $d1->prenom}} @endif </option>
                                                    @endif                                       
                                                 @endforeach                                                      
                                        </select>
                                    </div>
                                    <div class="form-group ui-draggable-handle" style="position: static;">
                                        <label for="input-text-1">Le nom du Dossier</label>
                                        <input type="" class="form-control" name="nom"  value="{{ $data->nom}}" placeholder="Dossier">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                        Date 
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                            </div>
                                                <input class="form-control flatpickr" type="date" data-dateFormat="Y-m-d" id="alt" name="date" value="{{ isset($data) ? date('Y-m-d', strtotime($data->date)) : '' }}" placeholder="date" />
                                        </div>                                 
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

