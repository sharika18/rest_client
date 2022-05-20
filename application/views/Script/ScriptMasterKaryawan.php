<script>
//VALIDATION FUNCTION
$(function () {
    $.validator.setDefaults({
        submitHandler: function () {
            //
        }
    });
    $.validator.addMethod(
        "checkJabatanTugas", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) > 0);
        },
        "Jabatan / Tugas belum dipilih"
    );
    $.validator.addMethod(
        "checkStatusKepegawaian", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) > 0);
        },
        "Status Kepegawaian belum dipilih"
    );
    $.validator.addMethod(
        "checkUnit", 
        function(value, element) {
            return this.optional(element) || (parseFloat(value) > 0);
        },
        "Unit belum dipilih"
    );
    $('#formSubmit').validate({
        rules: {
            selectJabatanTugas: {
                checkJabatanTugas: true
            },
            selectStatus: {
                checkStatusKepegawaian: true
            },
            selectUnit: {
                checkUnit: true
            }
           
        },
        messages: {
            dateTMT: {
                required: "TMT Tidak Boleh Kosong"
            },
            inputNIP: {
                required: "NIP Tidak Boleh Kosong"
            },
            inputNamaLengkap: {
                required: "Nama Lengkap Tidak Boleh Kosong"
            },
            emailEmail: {
                required: "Email Tidak Boleh Kosong"
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

//CREATE NIP
$(function () {
    var selectedDate=document.getElementById("dateTMT").value;  
    
    $("#dateTMT").datetimepicker({
        format: 'YYYY-MM-DD',
        date : selectedDate
    });

    // $("#divDateTMT").on("change.datetimepicker", ({date}) => {
    //     var selectedDateTMT = document.getElementById("dateTMT").value; //Get the current date
    //     var formmatDateTMT = moment(selectedDateTMT).format('YYYYMMDD');  
    //     $('#inputNIP').val(formmatDateTMT);
    // })
});
</script>