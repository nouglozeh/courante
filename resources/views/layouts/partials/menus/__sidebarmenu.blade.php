<ul id="menu" class="page-sidebar-menu">

            <!-- {{-- Route::is('admin.home')?'active':'' --}} -->
                <li class="">
                    <a href="/dashboard">
                        <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#fff" data-loop="true"></i>
                        <span class="title">Tableau de bord</span>
                    </a>
                </li>
                @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null) 
                <li class="">
                    <a href="/visite">
                            <i class="livicon" data-name="eye-open" data-size="20" data-c="#F89A14" data-hc="#fff" data-loop="true"></i>
                            <span class="title">Visite</span>
                            </a>                     
                </li>
                @endif
                @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null) 
                <li class="">
                    <a href="/visiteur">
                            <i class="livicon" data-name="users" data-size="20" data-c="#01bc8c" data-hc="#fff" data-loop="true"></i>
                            <span class="title">Visiteur</span>
                            </a>
                </li>    
                @endif 
                 <li class="">
                    <a href="/Rdv">
                            <i class="livicon" data-name="myspace" data-size="20" data-c="#EF6F6C" data-hc="#fff" data-loop="true"></i>
                            <span class="title">Rendez-Vous</span></a>                      
                </li>                        
                

                @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null) 
                <li class="">
                    <a href="/departement">
                            <i class="livicon" data-name="thumbnails-big" data-size="20" data-c="#EF6F6C" data-hc="#fff" data-loop="true"></i>
                        <span class="title">Agenda</span></a>                                          
                </li>
                 @endif

                @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null) 
                <li class="">
                    <a href="/dossier">
                            <i class="livicon" data-name="folder-open" data-size="20" data-c="#01bc8c" data-hc="#fff" data-loop="true"></i>
                            <span class="title">Dossiers</span></a>                                                                 
                </li>
                @endif
                 @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null) 
                <li class="">
                    <a href="/type_piece">
                            <i class="livicon" data-name="notebook" data-size="20" data-c="#F89A14" data-hc="#fff" data-loop="true"></i>
                            <span class="title">Type de Piéces</span>
                    </a>                                                                
                </li>
                @endif
                @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null) 
                <li class="">
                    <a href="/titre">
                             <i class="livicon" data-name="user-flag" data-size="25" data-c="#418BCA" data-hc="#fff" data-loop="true"></i>
                           
                            <span class="title">Titre</span></a>                                                                 
                </li>
                @if (auth()->user()->role_id != 2 && auth()->user()->role->departement_id == null) 
                <li class="">
                    <a href="/personnel">
                        <i class="livicon" data-name="user" data-size="20" data-c="#F89A14" data-hc="#fff" data-loop="true"></i>
                            <span class="title">Utilisateurs</span></a>                                   
                </li>
                @endif
                @endif
   
</ul>