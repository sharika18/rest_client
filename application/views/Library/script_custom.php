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

    $("#dgFinanceDataFinance").DataTable({
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

  $('#formSubmit').validate({
        rules: {
        },
        messages: {
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
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
    
  })

  $(function () {

  

})
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

//File Input
$(function () {
  bsCustomFileInput.init();
});
</script>