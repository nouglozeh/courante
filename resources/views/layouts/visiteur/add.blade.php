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
                                <h3 class="panel-title">Ajouter un visiteur</h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                               
                        <form id="commentForm" method="POST" class="form-horizontal" action="/visiteur">
                        @csrf
                        <div class="center">
                            <div class="col-md-12">                              
                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-2">Nom</label>
                                    <input type="text" class="form-control" name="nom" placeholder="Entrer votre nom">
                                     @error('nom')
                                        <p class="help-block">{{ $message }}</p>
                                    @enderror
                                </div>
                                 <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Prénom</label>
                                    <input type="text" class="form-control" name="prenom" placeholder="Entrer votre prénom">
                                    @error('prenom')
                                        <p class="help-block">{{ $message }}</p>
                                    @enderror 
                                </div>
                                
                                <div class="form-group">
                                    <label>
                                    Date de Naissance
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                        </div>
                                        <input class="form-control flatpickr" type="date" name="naissance" id="alt" data-dateFormat="Y-m-d"  placeholder="Date de Naissance" />
                                    </div>                                                                    
                                    @error('naissance')
                                        <p class="help-block">{{ $message }}</p>
                                    @enderror
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
                                       Contacte
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="phone" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="text" class="form-control" name="contacte" placeholder="Entrer Contacte" />
                                        </div>
                                         @error('contacte')
                                        <p class="help-block">{{ $message }}</p>
                                        @enderror
                                        </div>                    
                                        <div class="form-group ui-draggable-handle" style="position: static;">
                                        <label for="input-text-3">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Enter email">
                                        @error('email')
                                            <p class="help-block">{{ $message }}</p>
                                        @enderror                                  
                                        </div>                                   
                                      <div class="col-xs-12 col-sm-6 col-md-6">                                        
                                            <div class="form-group">
                                              <label>
                                              Nom de la Piéce:
                                            </label>
                                                <input type="text" name="p_nom" id="txtName" class="form-control input-md" placeholder="Non de la piéce">
                                            </div>
                                             @error('p_nom')
                                            <p class="help-block">{{ $message }}</p>
                                              @enderror
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-6">                             
                                            <div class="form-group">
                                            <label>
                                             Numero de la piéce:
                                            </label>
                                                <input name="nomero" id="txtlastname" class="form-control input-md" placeholder="Numero de la piéce">
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

