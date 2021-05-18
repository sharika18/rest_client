<script>

$(function () {
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
  });

$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
      stepper.next();
    }
  });
  $('#formBiodataAyah').validate({
    messages: {
        inputNamaLengkapAyah: {
            required: "Nama Lengkap Tidak Boleh Kosong"
        },
        inputNIKAyah: {
            required: "NIK Tidak Boleh Kosong"
        },
        inputTempatLahirIbu: {
            required: "Tempat Lahir Tidak Boleh Kosong"
        },
        dateTanggalLahirAyah: {
            required: "Tanggal Lahir Tidak Boleh Kosong"
        },
        selectPendidikanAyah: {
            required: "Pendidikan Tidak Boleh Kosong"
        },
        selectPekerjaanAyah: {
            required: "Pekerjaan Boleh Kosong"
        },
        selectPenghasilanAyah: {
            required: "Penghasilan Boleh Kosong"
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