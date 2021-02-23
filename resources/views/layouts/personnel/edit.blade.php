@extends('layouts.index')

@section('contentheader')
                <h1>Ajouter un visiteur</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li class="active">Ajouter un visiteur</li>
                </ol>
@endsection



@section('contenu')



<div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ajouter un Personnel</h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>
                                   
                                </span>
                            </div>
                            <div class="panel-body">                                                                                 
            <form id="commentForm" method="POST" enctype="multipart/form-data" class="form-horizontal" action="/personnel/edit">
                         @csrf
                        <input type="hidden" name="id" value="{{ $personnel->id }}" />
                        <div class="center">
                            <div class="col-md-12">                       
                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-2">Nom</label>
                                    <input type="texte" class="form-control" value="{{ $personnel->name }}"id="input-text-2" placeholder="Entrer votre nom">
                                    <p class="help-block"></p>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Prénom</label>
                                    <input type="texte" class="form-control" value="{{ $personnel->prenom }}" id="input-text-3" placeholder="Entrer votre prénom">
                                    <p class="help-block"></p>
                                </div>
            
                            <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Role</label>
                                    <select id="selectbasic" name="role_id" class="form-control">
                                        <option value="{{ null }}"> __ __ __ __ __ __ __ __ </option>
                                        @foreach ($roles as $r)
                                            @if(isset($personnel->role) && $personnel->role->id == $r->id)                                                                                        
                                            <option value="{{isset($r->id) ? $r->id : null}}" selected> {{ $r->libelle }} </option>        
                                            @else
                                                <option  value="{{isset($r->id) ? $r->id : null}}"> {{ $r->libelle }} </option>
                                            @endif 
                                         
                                        @endforeach
                                    </select>
                                 </div>
                            <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Titre</label>
                                    <select id="selectbasic" name="titre_id" class="form-control">
                                        <option value="{{ null }}"> __ __ __ __ __ __ __ __ </option>
                                        @foreach ($titre as $t)
                                            @if(isset($personnel->titre) && $personnel->titre->id == $t->id)                                                                                        
                                            <option  value="{{isset($t->id) ? $t->id : null}}" selected> {{ $t->libelle }}  </option>        
                                            @else
                                                <option value="{{isset($t->id) ? $t->id : null}}"> {{ $t->libelle }}  </option>
                                            @endif                                  
                                        @endforeach
                                    </select>
                                 </div> 
                           <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Departement</label>
                                    <select id="selectbasic" name="departement_id" class="form-control">
                                        <option value="{{ null }}"> __ __ __ __ __ __ __ __ </option>
                                        @foreach ($departement as $d)
                                            @if(isset($personnel->departement) && $personnel->departement->id == $d->id)                                                                                        
                                            <option value="{{isset($d->id) ? $d->id : null}}" selected> {{ $d->name }} </option>        
                                            @else
                                                <option  value="{{isset($d->id) ? $d->id : null}}"> {{ $d->name }} </option>
                                            @endif 
                                        @endforeach
                                    </select>
                              </div>                           
                                <div class="form-group">
                                    <label>
                                    Date  de prise de fonction
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input class="form-control flatpickr" data-dateFormat=" F j, Y" id="alt" value="{{ $personnel->datepf }}" placeholder="Date de prise de fonction" />
                                    </div>
                                   
                                </div>
                                <div class="form-group">
                                     <label class="col-md-4 control-label" for="radios">Sexe</label>
                                     <div class="col-md-4"> 
                                     <div class="radio">
                                     <label for="radios-0">                    
                                    <input type="radio" name="sexe" id="radios-0" value="H" checked="checked">
                                        Homme
                                    </label>
                                	</div>
                                      <div class="radio">
                                        <label for="radios-1">
                                         <input type="radio" name="sexe" id="radios-1" value="F">
                                       Femme
                                        </label>
                                        </div>
                                        </div>
                                 </div>
                                 <div class="form-group">
                                        <label>
                                    Contact
                                    
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="phone" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="text" name="contacte" class="form-control"value="{{ $personnel->contacte }}" id='timepicker-actions-exmpl' placeholder="Entrer Contact" />
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                        
                    
                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Email</label>
                                    <input type="email" class="form-control" id="input-text-3"  value="{{ $personnel->email}}"placeholder="Enter email">
                                    <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                   <label class="col-md-4 control-label" for="button1id"></label>
                                    <div class="col-md-8">
                                   <button id="button1id" type="submit"  class="btn btn-success">Valider</button>
                                   <button id="button2id" type="reset" name="button2id" class="btn btn-danger">Annuler</button>
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

