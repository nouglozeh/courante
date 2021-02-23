@extends('layouts.index')

@section('contentheader')
                <h1>Ajouter un Personnel</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li class="active">Ajouter un Personnel</li>
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
                               

                                                    
                        <form method="POST" class="form-horizontal" action="/personnel">
                        @csrf
                        <div class="center">
                            <div class="col-md-12">
                               
                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-2">Nom</label>
                                    <input type="texte" name="name" class="form-control" id="input-text-2" placeholder="Entrer votre nom">
                                    <p class="help-block"></p>
                                </div>
                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Prénom</label>
                                    <input type="texte" name="prenom" class="form-control" id="input-text-3" placeholder="Entrer votre prénom">
                                    <p class="help-block"></p>
                                </div>

                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Role</label>
                                    <select id="selectbasic" name="role_id" class="form-control">
                                        <option value="{{ null }}"> __ __ __ __ __ __ __ __ </option>
                                        @foreach ($roles as $r)
                                            <option value="{{$r->id}}">{{ $r->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Titre</label>
                                    <select id="selectbasic" name="titre_id" class="form-control">
                                        <option value="{{ null }}"> __ __ __ __ __ __ __ __ </option>
                                        @foreach ($titre as $t)
                                            <option value="{{$t->id}}">{{ $t->libelle }}</option>
                                        @endforeach
                                    </select>
                                   
                                </div>
                    <div class="form-group ui-draggable-handle" style="position: static;">
                                <label for="input-text-3"> Departement</label>
                                    <select id="selectbasic" name="departement" class="form-control">
                                        <option  value="{{ null }}" > __ __ __ __ __ __ __ __ </option>
                                        @foreach ($departement as $d)                                         
                                            <option value="{{$d->id}}" >{{$d->name}}</option>                                                                                    
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
                                    <input class="form-control flatpickr" type="date" data-dateFormat="Y-m-d" id="alt" name="datepf" value="{{ old('date_prev') }}" placeholder="" />
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
                                    Contacte
                                    
                                        </label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="livicon" data-name="phone" data-size="14" data-loop="true"></i>
                                            </div>
                                            <input type="text" name="contacte" class="form-control" id='timepicker-actions-exmpl' placeholder="Entrer Contacte" />
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                        
                    
                                <div class="form-group ui-draggable-handle" style="position: static;">
                                    <label for="input-text-3">Email</label>
                                    <input type="email" name="email" class="form-control" id="input-text-3" placeholder="Enter email">
                                    <p class="help-block"></p>
                                </div>
                                <div class="form-group">
                                   <label class="col-md-4 control-label" for="button1id"></label>
                                    <div class="col-md-8">
                                   <button id="button1id" name="button1id" class="btn btn-success">Valider</button>
                                   <button id="button2id" name="button2id" class="btn btn-danger">Annuler</button>
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

