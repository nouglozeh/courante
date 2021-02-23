@extends('layouts.index')

@section('contentheader')
    <h1>Ajouter un rendez-vous</h1>
    <ol class="breadcrumb">
        <li>
            <a href="index.html">
                <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="#">Users</a>
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
                                                   
            <form id="commentForm" method="POST" enctype="multipart/form-data" class="form-horizontal" action="/Rdv/edit">
                @csrf
               
                <input type="hidden" name="id" value="{{ $rdvs->id }}" />
                <div class="center">
                        <div class="col-md-12">                
                            <div class="form-group ui-draggable-handle" style="position: static;">
                                <label for="input-text-3">Visiteur</label>
                                <select id="selectbasic" name="visiteur" class="form-control">
                                    <option > __ __ __ __ __ __ __ __ </option>       
                                    @foreach ($data as $d)  
                                        @if($rdvs->visiteur->id == $d->id)                                                                                        
                                            <option @if(isset($d->id)) value="{{$d->id}}" selected> {{$d->nom . ' ' . $d->prenom}} @endif </option>        
                                        @else
                                            <option @if(isset($d->id)) value="{{$d->id}}"> {{$d->nom . ' ' . $d->prenom}} @endif </option>
                                        @endif                                       
                                    @endforeach                                            
                                </select>
                            </div>  

                         @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null)           
                             <div class="form-group ui-draggable-handle" style="position: static;">
                                <label for="input-text-3">Departement</label>
                                <select id="selectbasic" name="departement_id" class="form-control">
                                    <option > __ __ __ __ __ __ __ __ </option>       
                                    @foreach ($data1 as $d1)  
                                        @if($rdvs->departement->id == $d1->id)                                                                                        
                                            <option @if(isset($d1->id)) value="{{$d1->id}}" selected> {{$d1->name}} @endif </option>        
                                        @else
                                            <option @if(isset($d1->id)) value="{{$d1->id}}"> {{$d1->name}} @endif </option>
                                        @endif                                       
                                    @endforeach                                            
                                </select>
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
                                    <input class="form-control flatpickr" @if(isset($rdvs->date_prev)) value="{{ $rdvs->date_prev}}" @endif type="date" data-dateFormat="Y-m-d" id="alt" name="date_prev" placeholder="Date de Naissance" />                                                              
                                </div>                                  
                                                                
                            </div>  

                            <div class="form-group">
                                <label>
                                    Heure de debut:
                                </label>                                   
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="alarm" data-size="14" data-loop="true"></i>
                                    </div>
                                    <input class="form-control flatpickr"@if(isset($rdvs->heure_debut_prev))  value="{{ $rdvs->heure_debut_prev }}"@endif type="time" name="debut" data-enabletime=true data-nocalendar=true >
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
                                    <input class="form-control flatpickr" @if(isset($rdvs->heure_fin_prev)) value="{{ $rdvs->heure_fin_prev }}" @endif type="time" name="fin" data-enabletime=true data-nocalendar=true >
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


@endsection

