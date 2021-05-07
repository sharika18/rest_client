<!-- SCRIPT MASTER BIAYA -->
<script>
  //DataTable
  $(function () {
    $("#dgMasterBiaya").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#dgMasterBiayaDetail").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  //Date range picker
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
    $('#dateTanggalLahirSantri').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#dateTanggalLahirAyah').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#dateTanggalLahirIbu').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#dateTanggalLahirWali').datetimepicker({
        format: 'YYYY-MM-DD'
    });
  })

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });
</script>