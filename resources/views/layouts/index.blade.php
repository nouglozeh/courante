<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>SAASIB_Sarl</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @include('layouts.partials.linkedcss.__includedcss')
    
    <!--end of page level css-->
    
</head>
<script src="{{ asset('/controllers/app.js') }}"></script>
<body class="skin-josh" ng-app="scholadmin">
    <header class="header">
        <a href="" class="logo">
              <img src="/img/capture.PNG"  width='100%' height='40' alt="Logo">   
        </a>
        <nav class="navbar " role="navigation">
            <!-- Sidebar toggle button-->
            {{--  <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>  --}}
            @include('layouts.partials.menus.__navbar-right')
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    @include('layouts.partials.menus.__topside-bar')
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    @include('layouts.partials.menus.__sidebarmenu')
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class="right-side">
           
            <!-- Main content -->
            <section class="content-header">
               @yield('contentheader')
            </section>
            <section class="content">
                <div class="row">
                    
                </div>
                @yield('contenu')
                <!--/row-->
                
            </section>
        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    
    @include('layouts.partials.linkedjs.__includesjs')
    <!-- end of page level js -->
</body>

</html>
