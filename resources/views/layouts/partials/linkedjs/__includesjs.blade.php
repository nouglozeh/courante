<!-- global js -->
<script src="/app.js" type="text/javascript"></script>
<script src="/src/Jquery-3.5.1.min.js"></script>
    <!-- EASY PIE CHART JS -->
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
    <script type="text/javascript" src="/vendors/countUp.js/js/countUp.js"></script>
    <!--   maps -->
    <script src="/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/vendors/chartjs/Chart.js"></script>
    <script type="text/javascript" src="/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <!--  todolist-->
    <script src="/js/pages/todolist.js"></script>
    <script src="/js/pages/dashboard.js" type="text/javascript"></script>
    <!-- end of page level js -->


    <script src="/vendors/moment/js/moment.min.js"></script>
    <script src="/vendors/jasny-bootstrap/js/jasny-bootstrap.js" type="text/javascript"></script>
    <script src="/vendors/select2/js/select2.js" type="text/javascript"></script>
    <script src="/vendors/bootstrapwizard/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="/vendors/bootstrapvalidator/js/bootstrapValidator.min.js" type="text/javascript"></script>
    <script src="/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/vendors/iCheck/js/icheck.js"></script>
    <script src="/js/pages/adduser.js" type="text/javascript"></script>



     <!-- begining of page level js -->
     <script src="/vendors/pickadate/js/picker.js" type="text/javascript"></script>
    <script src="/vendors/pickadate/js/picker.date.js" type="text/javascript"></script>
    <script src="/vendors/pickadate/js/picker.time.js" type="text/javascript"></script>
    <script src="/vendors/air-datepicker/js/datepicker.min.js" type="text/javascript"></script>
    <script src="/vendors/air-datepicker/js/datepicker.en.js" type="text/javascript"></script>
    <script type="/text/javascript" src="vendors/flatpickr-calendar/js/flatpickr.min.js"></script>
    <script src="/js/pages/custom_datepicker.js" type="text/javascript"></script>
    <!-- end of page level js -->

    <script>
    
        /*$("#ajouterpiecebtn").click(function(e){
            e.preventDefault();
            var nbpc = parseInt($('#nbrepiece').val())+1;

           $('#nbrepiece').val(nbpc);
             var html = '<div class="form-group ui-draggable-handle" style="position: static;">'+
                                    '<label for="input-text-1">Nom</label>'+
                                    '<input type="" class="form-control" name="nompiece[]" placeholder="Enter le nom de la piece">'+
                                '</div>';
            $('#formcontent').append(html);
           
        });*/

        $("#ajouterpiecebtn").click(function(e){
            e.preventDefault();
            var nbpc = parseInt($('#nbrepiece').val())+1;

            $.get("/type_piece/all", function(data, status){
                //alert(data);
                $('#nbrepiece').val(nbpc);
                var html = '<div class="form-group ui-draggable-handle" style="position: static;">'+
                                        '<label for="input-text-1">Type de pièce</label>'+
                                        '<select class="form-control" name="nompiece[]">'+
                                        data+
                                        '</select>'+
                                    '</div>';
                $('#formcontent').append(html);
            });
        });

    </script>
    
@yield('js')
