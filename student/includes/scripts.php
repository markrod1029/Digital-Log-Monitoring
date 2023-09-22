<!--
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../dist/js/adminlte.js"></script>
<script src="../dist/js/demo.js"></script>

<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script> -->
 
    <script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <script src="../bower_components/moment/moment.js"></script>


    <script src="../bower_components/chart.js/Chart.js"></script>
    <script src="../bower_components/chart.js/Chart.HorizontalBar.js"></script>
    <script src="../bower_components/moment/min/moment.min.js"></script>
    <script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
<script src="../calendar/js/script.js"></script>

    <!-- Active Script -->
    <script>
    $(function(){
    	/** add active class and stay opened when selected */
    	var url = window.location;

    	// for sidebar menu entirely but not cover treeview
    	$('ul.sidebar-menu a').filter(function() {
    	    return this.href == url;
    	}).parent().addClass('active');

    	// for treeview
    	$('ul.treeview-menu a').filter(function() {
    	    return this.href == url;
    	}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');

    });
    </script>
    <!-- Data Table Initialize -->
    <script>
      $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
          'paging'      : true,
          "lengthChange": false,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          "scrollX": true,
          'autoWidth'   : false,
          
        }).style.marginLeft = "50px";
      })
    </script>
    <!-- Date and Timepicker -->
    <script>
    $(function(){
      //Date picker
      $('#datepicker_add').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      })
      $('#datepicker_edit').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
      }) 
    });
  </script>




