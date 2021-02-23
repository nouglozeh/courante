@extends('layouts.index')

@section('contentheader')
                <h1>Ajouter un visite</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li class="active">Ajouter un visite</li>
                </ol>
@endsection
@section('contenu')
<div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ajouter un rendez-vous</h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                        <div class="panel-body">                                                                                 
                    <form id="commentForm" method="POST" enctype="multipart/form-data" class="form-horizontal" action="/visite/edit">
                        @csrf
                        <div class="center">
                            <div class="col-md-12">                        
                                 <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Liste des visiteurs</label>
                                       <select id="selectbasic" name="visiteur" class="form-control">
                                            <option > __ __ __ __ __ __ __ __ </option>
                                            @foreach ($data1 as $da)
                                                <option value="{{$da->id}}">{{$da->nom . ' ' . $da->prenom}}</option>
                                            @endforeach
                                       </select>
                                </div>                                                                                                                 
                                
                            <div class="form-group">
                                    <label>
                                    Date du rendez
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input class="form-control flatpickr" type="date" data-dateFormat="Y-m-d" id="alt" value="{{ $data->date }}" name="date" placeholder="Date de Naissance" />
                                    </div>
                                    <strong>Selected date</strong>: <span id="realdate">nothing yet</span>
                                </div> 
                                
                                <div class="form-group">
                                    <label>
                                       Heure de debut:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input class="form-control flatpickr" type="time" name="heure_debut" value="{{ $data->heure_debut }}"data-enabletime=true data-nocalendar=true >
                                      </div>
                                    </div>                                   
                                    <div class="form-group">
                                    <label>
                                        Heure de fin:
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input class="form-control flatpickr" type="time" name="heure_fin" value="{{ $data->heure_fin }}" data-enabletime=true data-nocalendar=true >
                                      </div>
                                    </div>   
                                      <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Liste des Departements</label>
                                       <select id="selectbasic" name="departement" class="form-control">
                                            <option > __ __ __ __ __ __ __ __ </option>
                                            @foreach ($data2 as $dat)
                                                <option value="{{$dat->id}}">{{$dat->name}}</option>
                                            @endforeach
                                       </select>
                                             
                                     <div class="form-group">
                                        <label>Motife de la visite</label>
                                        <div class="col-md-12">                     
                                            <textarea class="form-control" id="textarea" name="objet" row="12"></textarea>
                                        </div>
                                        </div>

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
                        </div>
                    </div>

<!-- -------------------------- -->

@endsection

