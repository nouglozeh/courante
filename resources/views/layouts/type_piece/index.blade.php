@extends('layouts.index')

@section('contentheader')
                <h1>Lste des types de piéce</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                    <li class="active">les Types de piéce</li>
                </ol>
@endsection
@section('contenu')

<div class="col-md-12">
    <div class="panel panel-success">
        <div class="panel-heading clearfix">
            <h3 class="panel-title pull-left add_remove_title">
                <i class="livicon" data-name="list" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Liste des types de piéces
                  </h3>
                      <div class="col-12">
                         <button class="btn btn-primary pull-right mb-12 mr-3"> Ajouter
                        <a href="/type_piece/create"> 
                         <i class="livicon" data-name="plus" data-size="25" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                             </button>
                        </a>
                         </div>
                         </div> 
                           <div class="panel-body"> 
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <tr class="filters">
                                        <th>Libellé</th>                                     
                                        <th>Actions</th>                                    
                                    </tr>
                                </thead>
                              <tbody>
                                    @foreach($type_piece as $tp)
                                     <tr>
                                       
                                        <td>                                
                                       @if(isset($tp)) 
                                            {{ $tp->libelle }}
                                        @endif
                                        </td>                                                                                               
                                        <td>
                                         <a href="{{ '/type_piece/'.$tp->id.'/edit' }}" class="btn-xs purple">
                                         <i class="livicon" data-name="pen" data-loop="true" data-color="#000" data-hovercolor="black" data-size="14"></i>                                
                                         </a>
                                         <a href="{{ '/type_piece/'.$tp->id.'/delete' }}" class="btn-xs black">
                                        <i class="livicon" data-name="trash" data-loop="true" data-color="#000" data-hovercolor="black" data-size="14"></i>                               
                                        </a>
                                       </td>
                                     </tr>
                                    @endforeach
                              </tbody> 
            </table>
                    
         </div>
     </div>
 </div>

@endsection