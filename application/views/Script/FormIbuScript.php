<script>

$(function () {
    var selectedDateTanggalLahirIbu=document.getElementById("dateTanggalLahirIbu").value;
    $('#dateTanggalLahirIbu').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirIbu
    });
  });

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      stepper.next();
    }
  });
  $('#formRegister').validate({
    messages: {
        inputNamaLengkapIbu: {
            required: "Nama Lengkap Tidak Boleh Kosong"
        },
        inputNIKIbu: {
            required: "NIK Tidak Boleh Kosong"
        },
        inputTempatLahirIbu: {
            required: "Tempat Lahir Tidak Boleh Kosong"
        },
        dateTanggalLahirIbu: {
            required: "Tanggal Lahir Tidak Boleh Kosong"
        },
        selectPendidikanIbu: {
            required: "Pendidikan Tidak Boleh Kosong"
        },
        selectPekerjaanIbu: {
            required: "Pekerjaan Tidak Boleh Kosong"
        },
        selectPenghasilanIbu: {
            required: "Penghasilan Tidak Boleh Kosong"
        }
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
});
</script>