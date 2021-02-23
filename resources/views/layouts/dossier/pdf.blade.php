
<center><h3>Liste des pièces </h3></CENTER>
@if(isset($dossier->visiteurs))
    <table class="table table-bordered" id="table">
    @foreach($dossier->visiteurs as $visi)
        <tr>
            <td>
            @if(isset($visi->nom))
                {{ $visi->nom . ' ' }}
            @endif
            @if(isset($visi->prenom))
                {{ $visi->prenom}}
            @endif      
            </td>                                                                         
        </tr>
    @endforeach
    </table>
@endif

<br/>

@if(isset($dossier))
    <table class="table table-bordered" id="table">
    
        <tr class="filters">
            <th>Nom du Dossier : </th>   
             <td>                                                                 
            {{ $dossier->nom }}
            </td> 
             <th>Date : </th>   
             <td>                                                                 
            {{ $dossier->created_at }}

            </td>                                                                        
        </tr>
    </table>
@endif

<br/>

<table class="table table-bordered" id="table" style="width:100%;">
    <thead>
        <tr class="filters">
            <th> Numéro </th>
            <th>Nom de la pièce</th>                                                                       
        </tr>  
    </thead>
    <tbody style="text-align:center;">
            @if(isset($dossier->pieces))
                @foreach($dossier->pieces as $piece)
                    <tr>
                        <td>
                            {{$loop->index + 1}} 
                        </td> 
                        <td>
                            @if(isset($piece->nom))
                                {{ $piece->nom }}
                            @endif    
                        </td>                                                                         
                    </tr>
                @endforeach
            @endif   
    </tbody>
</table>

<h3 style="text-align:rigth"> Nombre de pièces  :   {{ count($dossier->pieces) }}</h3>