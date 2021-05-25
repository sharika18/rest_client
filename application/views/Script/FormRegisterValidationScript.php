<script>
//VALIDATION FUNCTION
$(function () {
    $(".btnNext").click(function() {
        if ($( "#formSubmit" ).valid()) {
            stepper.next();
          }
    });

    $.validator.setDefaults({
        submitHandler: function () {
            //
        }
    });
    $.validator.addMethod(
        "anakKuValidasi", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) <= document.getElementById("inputDariBerapaSaudara").value);
        },
        "Jumlah Saudara Tidak Boleh Lebih Kecil"
    );
    $.validator.addMethod(
        "jumlahSaudaraValidasi", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) >= document.getElementById("inputAnakKe").value);
        },
        "Jumlah Saudara Tidak Boleh Lebih Kecil"
    );
    $('#formSubmit').validate({
        rules: {
            inputAnakKe: {
                anakKuValidasi: true
            },
            inputDariBerapaSaudara: {
                jumlahSaudaraValidasi: true
            }
        },
        messages: {
            //SANTRI
            fileBuktiPembayaran: {
                required: "Bukti Pembayaran Tidak Boleh Kosong"
            },
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
            },

            //AYAH
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
                required: "Pekerjaan Tidak Boleh Kosong"
            },
            selectPenghasilanAyah: {
                required: "Penghasilan Tidak Boleh Kosong"
            },

            //IBU
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
            },

            //WALI
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