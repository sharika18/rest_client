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
    $('#txtStartDate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#txtEndDate').datetimepicker({
        format: 'YYYY-MM-DD'
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