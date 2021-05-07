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
    
    var selectedDate=document.getElementById("txtStartDate").value;  
    $('#txtStartDate').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDate
    });
  });   

  $(function () {

    var selectedDate=document.getElementById("txtEndDate").value;
    $('#txtEndDate').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDate
    });
  });   
</script>