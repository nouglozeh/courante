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
            
    <form id="commentForm" method="post" class="form-horizontal" action="/visiteur/edit">
    @csrf
    <div class="center">
        <div class="col-md-12">
            <div class="form-group ui-draggable-handle" style="position: static;">
                <input type="hidden"  class="form-control" name="id" value="{{$data->id}}" placeholder="Enter email">

            </div>
            <div class="form-group ui-draggable-handle" style="position: static;">
                <label for="input-text-2">Nom</label>
                <input type="text" class="form-control" name="nom" placeholder="Entrer votre nom" value="{{ $data->nom }}">
        
            </div>
            <div class="form-group ui-draggable-handle" style="position: static;">
                <label for="input-text-3">Prénom</label>
                <input type="text" class="form-control" name="prenom"  value="{{ $data->prenom }}" placeholder="Entrer votre prénom">
                
            </div>
            
            <div class="form-group">
                <label>
                Date de Naissance
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                    </div>
                    <input class="form-control flatpickr" name="naissance"  value="{{ $data->naissance }}" data-dateFormat="Y-m-d"   placeholder="Date de Naissance" />
                </div>
                <strong>Selected date</strong>: <span id="realdate">nothing yet</span>
            </div>
            <div class="form-group">
                    <label class="col-md-4 control-label" for="radios">Sexe</label>
                <div class="col-md-4">
                    <div class="radio">
                    <label for="radios-0">
                        @if($data->sexe == 'H')
                            <input type="radio" name="sexe" id="radios-0" value="H" checked >
                        @else
                            <input type="radio" name="sexe" id="radios-0" value="H" >
                        @endif
                    Homme
                </label>
                </div>
                    <div class="radio">
                    <label for="radios-1">
                        @if($data->sexe == 'F')
                            <input type="radio" name="sexe" id="radios-1" value="F" checked>
                        @else
                            <input type="radio" name="sexe" id="radios-1" value="F">
                        @endif
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
                        <input type="text" class="form-control" name="contacte"  value="{{ $data->contacte }}"placeholder="Entrer Contacte" />
                    </div>
                    <!-- /.input group -->
                </div>                   
            <div class="form-group ui-draggable-handle" style="position: static;">
                <label for="input-text-3">Email</label>
                <input type="email" class="form-control"  value="{{ $data->email }}"name="email" placeholder="Enter email">               
            </div>
                                  
              <div class="col-xs-12 col-sm-6 col-md-6">                                        
                <div class="form-group">
                   <label>
                     Nom de la Piéce:
                     </label>                                              
                    <input type="text" name="p_nom" id="txtName"   @if(isset($pis)) value="{{ $pis->nom }}" @endif class="form-control input-md" placeholder="Non de la piéce">                                              
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">                             
                <div class="form-group">
                 <label>
                 Numero de la piéce:
                </label>                           
                 <input name="nomero" id="txtlastname"   @if(isset($pis)) value="{{ $pis->nomero }}" @endif   class="form-control input-md" placeholder="Numero de la piéce">                                            
                 </div>
             </div>    
            <div class="form-group">                                  
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

