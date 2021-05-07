<!-- SCRIPT MASTER BIAYA -->
<script>
  $(function () {
    $("#dgMasterBiaya").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  $(function () {
    $("#dgMasterBiayaDetail").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  $(function () {
    $('#txtStartDate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
  });   

  $(function () {
    $('#txtEndDate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
  });   
</script>