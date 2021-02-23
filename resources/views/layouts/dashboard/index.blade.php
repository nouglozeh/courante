
@extends('layouts.index')

@section('contentheader')
                <h1> SAASIB SARL </h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Tableau de bord
                        </a>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                    <li class="active"> SAASIB SARL</li>
                </ol>
@endsection

@section('contenu')


 
            <section class="content">
                <div class="row">

                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 text-right">
                                            <span><h4> Vsites </h4></span>
                                            <span> </span>
                                            
                                            <div class="number" id="">{{ $visite }}</div>
                                        </div>
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Etat</small>
                                            <h4 id="myTargetElement1.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">2020</small>
                                            <h4 id="myTargetElement1.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span><h4>Rendez-vous</h4></span>
                                            <div class="number" id="myTargetElement2"> {{ $rdv }}</div>
                                        </div>
                                        
                                         <i class="livicon" data-name="myspace" data-size="70" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Etat</small>
                                            <h4 id="myTargetElement2.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">2020</small>
                                            <h4 id="myTargetElement2.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span><h4>Dossiers</h4></span>
                                            <div class="number" id="myTargetElement3">{{ $dossier }}</div>
                                        </div>
                                          <i class="livicon" data-name="folder-open" data-size="70" data-c="#fff" data-hc="#fff" data-loop="true"></i>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Etat</small>
                                            <h4 id="myTargetElement3.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">2020</small>
                                            <h4 id="myTargetElement3.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span><h4>Visiteurs</h4></span>
                                            <div class="number" id="myTargetElement4">{{ $visiteur }}</div>
                                        </div>
                                        <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <small class="stat-label">Etat</small>
                                            <h4 id="myTargetElement4.1"></h4>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <small class="stat-label">2020</small>
                                            <h4 id="myTargetElement4.2"></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="panel panel-success">

                        <div class="row">
                        
                            <div class="col-lg-6 col-md-6 col-sm-6 margin_10">
                                <canvas id="myChart"></canvas>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 margin_10">
                                <canvas id="myChart1"></canvas>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 margin_10">
                                <canvas id="myChart2"></canvas>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 margin_10">
                                <canvas id="myChart3"></canvas>
                            </div>

                        </div>
                    </div>
                </div>


               
    
      
                            
                        </div>
                    </div>
                </div>
            </section>
        </aside>
        @endsection
    @section('css')
    <!--page level css -->
    <link href="/vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="/css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
    <link rel="/stylesheet" media="all" href="vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css" />
    <link rel="/stylesheet" href="vendors/animate/animate.min.css">
    <link rel="/stylesheet" type="text/css" href="vendors/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="/stylesheet" href="css/pages/only_dashboard.css" />
    <!--end of page level css-->
    @endsection

    @section('js')
     <!-- EASY PIE CHART JS -->
     
    <script src="{{ asset('chartjs')}}/node_modules/chart.js/dist/chart.min.js"></script> 
    <script src="/vendors/jquery.easy-pie-chart/js/easypiechart.min.js"></script>
    <script src="/vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js"></script>
    <script src="/js/jquery.easingpie.js"></script>
    <!--end easy pie chart -->
    <!--for calendar-->
    <script src="/vendors/moment/js/moment.min.js" type="text/javascript"></script>
    <script src="/vendors/fullcalendar/js/fullcalendar.min.js" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="/vendors/flotchart/js/jquery.flot.js" type="text/javascript"></script>
    <script src="/vendors/flotchart/js/jquery.flot.resize.js" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="/vendors/sparklinecharts/jquery.sparkline.js"></script>
    <!-- Back to Top-->
    <script type="/text/javascript" src="vendors/countUp.js/js/countUp.js"></script>
    <!--   maps -->
    <script src="/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/vendors/chartjs/Chart.js"></script>
    <script type="text/javascript" src="vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!--  todolist-->
    <script src="/js/pages/todolist.js"></script>
    <script src="/js/pages/dashboard.js" type="text/javascript"></script>
    <!-- end of page level js -->

    <script> 


    function nbVisite()
    {
        let myDoughnutChart = document.getElementById("myChart").getContext('2d');

        $.get("/dashboard/nbVisite", function(data, status){
            let libelles = [];
            let nombre = [];


            data.forEach(function(d, index){
                libelles.push(d.mois)
                nombre.push(d.nombre)
            })

            let chart1 = new Chart(myDoughnutChart, {
            type: 'pie',
            data: {
                    labels: libelles,
                    datasets: [ {
                            data: nombre,
                            backgroundColor: ['#B67823', '#49A9EA',  '#800080','#FF0000','#800000','#000000','#9D3E0C','#9FE855']
                    }],
                fill: false,
            },
            options: {
                    title: {
                            text: " Etat statistique des visites ",
                            display: true
                        }
                    },
            }); 
        });

    }

    function nbVisiteur()
    {
        let myDoughnutChart = document.getElementById("myChart1").getContext('2d');

        $.get("/dashboard/nbVisiteur", function(data, status){
            let libelles = [];
            let nombre = [];


            data.forEach(function(d, index){
                libelles.push(d.mois)
                nombre.push(d.nombre)
            })

            let chart1 = new Chart(myDoughnutChart, {
            type: 'pie',
            data: {
                    labels: libelles,
                    datasets: [ {
                            data: nombre,
                            backgroundColor: ['#9FE855', '#800080','#FF0000','#800000','#000000','#9D3E0C','#9FE855']
                    }],
                fill: false,
            },
            options: {
                    title: {
                            text: " Etat statistique des visiteurs",
                            display: true
                        }
                    },
            }); 
        });
    }


    function nbRdv()
    { 

    let myDoughnutChart = document.getElementById("myChart2").getContext('2d');

        $.get("/dashboard/nbRdv", function(data, status){
            let libelles = [];
            let nombre = [];


            data.forEach(function(d, index){
                libelles.push(d.mois)
                nombre.push(d.nombre)
            })

            let chart1 = new Chart(myDoughnutChart, {
            type: 'pie',
            data: {
                    labels: libelles,
                    datasets: [ {
                            data: nombre,
                            backgroundColor: ['#800000', '#49A9EA','#FF0000','#800000','#000000','#9D3E0C','#9FE855']
                    }],
                fill: false,
            },
            options: {
                    title: {
                            text: " Etat statistique des Rendez-vous",
                            display: true
                        }
                    },
            }); 
        });

    }


  function nbDossier() 
 {
    let myDoughnutChart = document.getElementById("myChart3").getContext('2d');

        $.get("/dashboard/nbDossier", function(data, status){
            let libelles = [];
            let nombre = [];


            data.forEach(function(d, index){
                libelles.push(d.mois)
                nombre.push(d.nombre)
            })

            let chart1 = new Chart(myDoughnutChart, {
            type: 'pie',
            data: {
                    labels: libelles,
                    datasets: [ {
                            data: nombre,
                            backgroundColor: [ '#49A9EA', '#800080','#FF0000','#800000','#000000','#9D3E0C','#9FE855']
                    }],
                fill: false,
            },
            options: {
                    title: {
                            text: " Etat statistique des Dossiers",
                            display: true
                        }
                    },
            }); 
        });
    }
        
     nbVisite(); 
     nbVisiteur();  
    nbRdv();  
    nbDossier(); 
  
    </script>

    @endsection