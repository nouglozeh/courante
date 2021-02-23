
<div class="navbar-right">
    <ul class="nav navbar-nav">
       {{--  <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="livicon" data-name="message-flag" data-loop="true" data-color="#42aaca" data-hovercolor="#42aaca" data-size="28"></i>
                <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu dropdown-messages pull-right">

               
                <li class="footer">
                    <a href="#">View all</a>
                </li>
            </ul>
        </li>  --}}
        <li class="dropdown notifications-menu">
            {{--  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f" data-hovercolor="#e9573f" data-size="28"></i>
                <span class="label label-warning">7</span>
            </a>  --}}
            <ul class=" notifications dropdown-menu">
            <li class="dropdown-title">You have 7 notifications</li>
            <li>
                        <!-- inner menu: contains the actual data -->
                        
                    </li>
                    <li class="footer">
                        <a href="#">View all</a>
                    </li>  
                </ul>
            </li>
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               
                <div class="riot">
                    <div>
                   
                        {{auth()->user()->name}}
                        <span>
                            <i class="caret"></i>
                        </span>
                    </div>
                </div>
            </a>
            <ul class="dropdown-menu">            
                <li>                 
                        <a href="/logout">
                            <i class="livicon" data-name="sign-out" data-s="18"></i> Déconecter
                        </a>                  
                </li>
            </ul>
        </li>
    </ul>
</div>