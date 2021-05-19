<script>
$(document).ready(function () {
    $("#divUkuranJilbab *").prop("disabled", true);

});

$("input[name='radioJenisKelaminSantri']").change(function(){
    $("#divUkuranJilbab *").prop("disabled", false);
    if($(this).val() == '1')
    {
        document.getElementById("selectUkuranJilbab").value = "";
        $("#divUkuranJilbab *").prop("disabled", true);
    }
});

$(function () {
    var selectedDateTanggalLahirSantri=document.getElementById("dateTanggalSantri").value;  
    $('#dateTanggalSantri').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirSantri
    });

    var selectedDateTanggalLahirIbu=document.getElementById("dateTanggalLahirIbu").value;
    $('#dateTanggalLahirIbu').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirIbu
    });

    var selectedDateTanggalLahirAyah=document.getElementById("dateTanggalLahirAyah").value;
    $('#dateTanggalLahirAyah').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirAyah
    });

    var selectedDateTanggalLahirWali=document.getElementById("dateTanggalLahirWali").value;
    $('#dateTanggalLahirWali').datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDateTanggalLahirWali
    });
  });

//VALIDATION FUNCTION
$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
        stepper.next();
        }
    });

    $.validator.addMethod(
        "greatherThanJumlahSaudara", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) <= document.getElementById("inputDariBerapaSaudara").value);
        },
        "Jumlah Saudara Tidak Boleh Lebih Besar"
    );

    $('#formRegister').validate({
        rules: {
            inputAnakKe: {
                greatherThanJumlahSaudara: true
            }
        },
        messages: {
            inputNamaLengkapSantri: {
                required: "Nama Lengkap Tidak Boleh Kosong"
            },
            inputNamaPanggilan: {
                required: "Nama Panggilan Tidak Boleh Kosong"
            },
            inputTempatLahirSantri: {
                required: "Tempat Lahir Tidak Boleh Kosong"
            },
            dateTanggalSantri: {
                required: "Tanggal Lahir Tidak Boleh Kosong"
            },
            inputNIKSantri: {
                required: "NIK Tidak Boleh Kosong"
            },
            inputAnakKe: {
                required: "Tidak Boleh Kosong"
            },
            inputDariBerapaSaudara: {
                required: "Tidak Boleh Kosong"
            },
            inputTinggiBadan: {
                required: "Tidak Boleh Kosong"
            },
            inputBeratBadan: {
                required: "Tidak Boleh Kosong"
            },
            inputAlamatSantri: {
                required: "Nama Panggilan Tidak Boleh Kosong"
            },
            selectUkuranBaju: {
                required: "Ukuran Baju Tidak Boleh Kosong"
            },
            selectUkuranCelana: {
                required: "Ukuran Celana Tidak Boleh Kosong"
            },
            selectUkuranJilbab: {
                required: "Ukuran Jilbab Tidak Boleh Kosong"
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