<div class="panel">
    <ul>
        @foreach ($visiteurs as $v)
            <li style="padding:5px"><a href="#" onClick="fill({{ $v }})">{{ $v->nom . ' ' . $v->prenom }}</a></li>
        @endforeach
    </ul>
</div>