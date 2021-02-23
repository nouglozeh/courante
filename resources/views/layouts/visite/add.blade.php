@extends('layouts.index')

@section('contentheader')
<h1>Ajouter une visite</h1>
<ol class="breadcrumb">
    <li>
        <a href="index.html">
            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Tableau de bord
        </a>
    </li>
    <li>
        <a href="#"></a>
    </li>
    <li class="active">Ajouter une visite</li>
</ol>
@endsection

@section('contenu')

<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Ajouter une visite</h3>
            <span class="pull-right">
                <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>
            </span>
        </div>
    <div class="panel-body">
                                                            
<form id="commentForm" method="POST" enctype="multipart/form-data" class="form-horizontal" action="/visite">
    @csrf
    <input type="hidden" id="feild_id" name="id" />
    <div class="center">
        <div class="col-md-12">                        
                <div class="form-group ui-draggable-handle" style="position: static;">
                <div class="col-md-12">                              
            <div class="form-group ui-draggable-handle" style="position: static;">
                <label for="input-text-2">Nom</label>
                <input type="text" id="search_name" class="form-control" name="nom" placeholder="Entrer votre nom">
                @error('nom')
                    <p class="help-block">{{ $message }}</p>
                @enderror
                <div id="search_content" style="position:absolute; width:100%; z-index:10; padding:10px"></div>
            </div>
                <div class="form-group ui-draggable-handle" style="position: static;">
                <label for="input-text-3">Prénom</label>
                <input type="text" id="feild_prenom" class="form-control" name="prenom" placeholder="Entrer votre prénom">
                @error('prenom')
                    <p class="help-block">{{ $message }}</p>
                @enderror 
            </div>
             <div class="form-group ui-draggable-handle" style="position: static;">
                <label for="input-text-3">Email</label>
                <input type="email" id="feild_prenom" class="form-control" name="email" placeholder="Entrer votre email">
                @error('email')
                    <p class="help-block">{{ $message }}</p>
                @enderror 
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
                <div class="col-xs-12 col-sm-6 col-md-6">                                        
                        <div class="form-group">
                            <label>
                            Type de la Pièce:
                        </label>
                            <select id="selectbasic" name="p_nom" class="form-control input-md" placeholder="Non de la piéce">
                                <option value="Carte Nationale d'Identié"> Identié </option>
                                <option value="Carte d' Electeur"> Electeur </option>
                                <option value="Pasport">Pasport</option>
                            </select>
                        </div>
                            @error('p_nom')
                        <p class="help-block">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">                             
                        <div class="form-group">
                        <label for="input-text-5">
                            Numero de la pièce:
                        </label>
                            <input type= "number"  name="nomero" id="txtlastname" class="form-control input-md" placeholder="Numero de la piéce">
                        </div>                                           
                    </div>                                                                                                                
            </div>
           
            
            <div class="form-group">
                <label>
                    Heure d'entrer:
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                    </div>
                    <input class="form-control flatpickr" type="time" name="heure_debut" value="{{ old('heure_debut') }}" data-enabletime=true data-nocalendar=true >
                    </div>
                    @error('heure_debut')
                    <p class="help-block">{{ $message }}</p>
                @enderror
                </div>                                   
                <div class="form-group">
                <label>
                    Heure de sorti:
                </label>
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                    </div>
                    <input class="form-control flatpickr" type="time" name="heure_fin" value="{{ old('heure_fin') }}" data-enabletime=true data-nocalendar=true >
                    </div>
                    @error('heure_fin')
                    <p class="help-block" color="red" >{{ $message }}</p>
                @enderror
                </div>   
            <div class="form-group ui-draggable-handle" style="position: static;">
                <label for="input-text-3"> Departement</label>
                    <select id="selectbasic" name="departement" class="form-control">
                        <option  value="{{ null }}" > __ __ __ __ __ __ __ __ </option>
                        @foreach ($departements as $departement)
                            @if(old('departement') == $departement->id)
                            <option value="{{$departement->id}}" selected >{{$departement->name}}</option>
                        @else
                            <option value="{{$departement->id}}">{{$departement->name}}</option>
                        @endif                                               
                        @endforeach
                    </select>
                        @error('departement')
                    <p class="help-block">{{ $message }}</p>                                       
                @enderror
                </div>      
                  <div class="form-group">
                        <label>Motife de la visite</label>
                            <div class="col-md-12">                     
                                <select id="feildChange" name="objet" class="form-control"  value="{{ old('objet') }}" onChange="onDisplayed()" >
                                    <option value="Demande de rendez-vous">Demande de rendez-vous</option>
                                    <option value="Dépot de dossier">Dépot de dossier</option>
                                    <option  value="Visite">Visite</option>
                                </select>                                                                                           
                            </div>                                             
                            @error('objet')
                        <p class="help-block">{{ $message }}</p>                                       
                     @enderror
                  </div>
                  
                 <div class="form-group ui-draggable-handle" style="position: static;" id="feildVite">
                        <label for="input-text-3">Personne à visité</label>
                        <select id="selectbasics" name="user" class="form-control">
                        <option  value="{{ null }}" > __ __ __ __ __ __ __ __ </option>
                        @foreach ($user as $use)
                            @if(old('user') == $use->id)
                                <option value="{{$use->id}}" selected >{{$use->name}}</option>
                            @else
                                <option value="{{$use->id}}">{{$use->name}}</option>
                            @endif                                               
                        @endforeach
                      </select>
                        @error('departement')
                            <p class="help-block">{{ $message }}</p>                                       
                        @enderror
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

@section('js')
<script type="text/javascript" >
    function onDisplayed()
    {
        
        var feildVite = $('#feildVite');
        var selectbasic = $('#feildChange');

        if(selectbasic.val() == 'Visite')
        {
            feildVite.css('display','block');
        }else{
            feildVite.css('display','none');
        }
        ///alert(selectbasic.val());
    }

    onDisplayed();
</script>
<script type="text/javascript" src="/js/ajax.js"></script>
@endsection

