<script>
$(function () {
    var selectedDateTanggalLahirWali=document.getElementById("dateTanggalLahirWali").value;
    $('#dateTanggalLahirWali').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirWali
    });
  });

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      stepper.next();
    }
  });
  $('#formBiodataWali').validate({
    messages: {
        inputNamaLengkapWali: {
            required: "Nama Lengkap Tidak Boleh Kosong"
        },
        inputNIKWali: {
            required: "NIK Tidak Boleh Kosong"
        },
        inputTempatLahirIbu: {
            required: "Tempat Lahir Tidak Boleh Kosong"
        },
        dateTanggalLahirWali: {
            required: "Tanggal Lahir Tidak Boleh Kosong"
        },
        selectPendidikanWali: {
            required: "Pendidikan Tidak Boleh Kosong"
        },
        selectPekerjaanWali: {
            required: "Pekerjaan Tidak Boleh Kosong"
        },
        selectPenghasilanWali: {
            required: "Penghasilan Tidak Boleh Kosong"
        },
        inputAlamatWali: {
            required: "Alamat Tidak Boleh Kosong"
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