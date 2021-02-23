@extends('layouts.index')

@section('contentheader')
    <h1>Ajouter un rendez-vous</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Tableau de bord
            </a>
        </li>
        <li>
            <a href="#"></a>
        </li>
        <li class="active">Ajouter un rendez-vous</li>
    </ol>
@endsection



@section('contenu')



<div class="col-md-10">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Ajouter un rendez-vous</h3>
            <span class="pull-right">
                <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>                                 
            </span>
        </div>
        <div class="panel-body">                               
            <form id="commentForm" method="POST" enctype="multipart/form-data" class="form-horizontal" action="/Rdv">
                @csrf
                <div class="center">
                    <div class="col-md-12">                          
                            <div class="form-group ui-draggable-handle" style="position: static;">
                                <label for="input-text-3"> visiteur</label>
                                <select id="selectbasic" name="visiteur" class="form-control">
                                        <option value="{{ null }}"> __ __ __ __ __ __ __ __ </option>
                                        @foreach ($visiteurs as $visiteur)
                                            @if(old('visiteur') == $visiteur->id)
                                                <option value="{{$visiteur->id}}" selected >{{$visiteur->nom . ' ' . $visiteur->prenom. ' ' .$visiteur->email }}</option>
                                            @else
                                                <option value="{{$visiteur->id}}">{{$visiteur->nom . ' ' . $visiteur->prenom. ' ' .$visiteur->email }}</option>
                                            @endif
                                            
                                        @endforeach
                                </select>
                                    @error('visiteur')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>    
                        @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null)  
                             <div class="form-group ui-draggable-handle" style="position: static;">
                                <label for="input-text-3">Departement</label>
                                <select id="selectbasic" name="user_id" class="form-control">
                                        <option value="{{ null }}"> __ __ __ __ __ __ __ __ </option>
                                        @foreach ($users as $user)
                                            @if(old('user') == $user->id)
                                                <option value="{{$user->id}}" selected >{{$user->name .' '. $user->prenom. '    |   '. $user->departement->name}}</option>
                                            @else
                                                <option value="{{$user->id}}">{{$user->name .' '. $user->prenom. '  |   '. $user->departement->name}}</option>
                                            @endif
                                            
                                        @endforeach
                                </select>
                                    @error('user_id')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>                                                                                                                
                          @endif  
                            <div class="form-group">
                                <label>
                                Date du rendez
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="calendar" data-size="14" data-loop="true"></i>
                                    </div>
                                    <input class="form-control flatpickr" type="date" data-dateFormat="Y-m-d" id="alt" name="date_prev" value="{{ old('date_prev') }}" placeholder="" />
                                </div>
                                @error('date_prev')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                                
                            </div>
                            
                            <div class="form-group">
                                <label>
                                Heure de debut:
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                                    </div>
                                    <input class="form-control flatpickr" type="time" name="heure_debut_prev"  value="{{ old('heure_debut_prev') }}" data-enabletime=true data-nocalendar=true >
                                </div>
                                @error('heure_debut_prev')
                                    <p class="help-block">{{ $message }}</p>
                                @enderror
                            </div>
                                
                            <div class="form-group">
                                <label>
                                Heure de fin:
                                </label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                                    </div>
                                    <input class="form-control flatpickr" type="time" name="heure_fin_prev"  value="{{ old('heure_fin_prev') }}" data-enabletime=true data-nocalendar=true >                                    
                                </div>
                                @error('heure_fin_prev')
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
            </form>
        </div>
    </div>
</div>

<!-- -------------------------- -->

@endsection

