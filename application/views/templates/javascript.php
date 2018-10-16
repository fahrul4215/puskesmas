<!-- js placed at the end of the document so the pages load faster -->
<script src="<?= base_url('assets/templates/') ?>lib/jquery/jquery.min.js"></script>

<script src="<?= base_url('assets/templates/') ?>lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?= base_url('assets/templates/') ?>lib/jquery.scrollTo.min.js"></script>
<script src="<?= base_url('assets/templates/') ?>lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?= base_url('assets/templates/') ?>lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="<?= base_url('assets/templates/') ?>lib/common-scripts.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/gritter-conf.js"></script>
<!--script for this page-->
<script src="<?= base_url('assets/templates/') ?>lib/sparkline-chart.js"></script>
<script src="<?= base_url('assets/templates/') ?>lib/zabuto_calendar.js"></script>
<script type="application/javascript">
  $(document).ready(function() {
    $("#date-popover").popover({
      html: true,
      trigger: "manual"
    });
    $("#date-popover").hide();
    $("#date-popover").click(function(e) {
      $(this).hide();
    });

    $("#my-calendar").zabuto_calendar({
      action: function() {
        return myDateFunction(this.id, false);
      },
      action_nav: function() {
        return myNavFunction(this.id);
      },
      ajax: {
        url: "show_data.php?action=1",
        modal: true
      },
      legend: [{
        type: "text",
        label: "Special event",
        badge: "00"
      },
      {
        type: "block",
        label: "Regular event",
      }
      ]
    });
  });

  function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
  }
</script>
<script type="text/javascript">
  setTimeout(function(){
    document.getElementById('pesan').style.display = 'none';
  }, 5000);
</script>
<script type="text/javascript" src="<?= base_url('assets/datatables.min.js') ?>"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>
<script src="<?= base_url('assets/templates/') ?>lib/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/templates/') ?>lib/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script src="<?= base_url('assets/templates/') ?>lib/advanced-form-components.js"></script>
<!-- Select Boxes -->
<script type="text/javascript" src="<?= base_url('assets/js/select2.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#cariSelectBox").select2({
      placeholder: "Masukkan Kata untuk mencari",
      allowClear: true
    })
  });
</script>