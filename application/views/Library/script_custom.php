<!-- SCRIPT MASTER BIAYA -->
<script>
  //DataTable
  $(function () {
    var masterBiayaTable = $("#dgMasterBiaya").DataTable({
      "destroy": true,
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "columnDefs": [
            {
                "targets": [ 0],
                "visible": false,
                "searchable": false
            }
        ]
    });
    
    $("#dgMasterBiayaDetail").DataTable({
      "destroy": true,
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "columnDefs": [
            {
                "targets": [ 0],
                "visible": false,
                "searchable": false
            }
        ]
    });
  });
 
  //Date picker
  $(function () {
    var selectedDate=document.getElementById("txtStartDate").value;  
    $('#txtStartDate').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDate
    });

    var selectedDate=document.getElementById("txtEndDate").value;
    $('#txtEndDate').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDate
    });

    var selectedDateTanggalLahirSantri=document.getElementById("dateTanggalLahirSantri").value;  
    $('#dateTanggalLahirSantri').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirSantri
    });

    var selectedDateTanggalLahirAyah=document.getElementById("dateTanggalLahirAyah").value;
    $('#dateTanggalLahirAyah').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirAyah
    });

    var selectedDateTanggalLahirIbu=document.getElementById("dateTanggalLahirIbu").value;
    $('#dateTanggalLahirIbu').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirIbu
    });

    var selectedDateTanggalLahirWali=document.getElementById("dateTanggalLahirWali").value;
    $('#dateTanggalLahirWali').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirWali
    });
  })

  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });
</script>