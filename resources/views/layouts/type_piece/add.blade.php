@extends('layouts.index')

@section('contentheader')
                <h1>Lste type de piéce </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Users</a>
                    </li>
                    <li class="active">Les Types de piéce </li>
                </ol>
@endsection
@section('contenu')
<div class="col-md-10">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ajouter un type de piéce</h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable" title="Hide Panel content"></i>
                                 
                                </span>
                            </div>
                            <div class="panel-body">
                               
                        <form id="" method="post" class="form-horizontal" action="/type_piece">
                            @csrf                           
                            <div class="center">                          
                                <div  class="col-md-12">
                                   
                                    <div class="form-group ui-draggable-handle" style="position: static;">
                                        <label for="input-text-1">Type de piéce </label>
                                        <input type="" class="form-control" name="libelle" placeholder="type_piéce">
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
@endsection