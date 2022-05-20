<script>
//VALIDATION FUNCTION
$(function () {
    $(".btnNext").click(function() {
        if ($( "#formRecoverPassword" ).valid()) {
            stepper.next();
          }
    });

    $.validator.setDefaults({
        submitHandler: function () {
            //
        }
    });
    $.validator.addMethod(
        "confirmPasswordMatch", 
        function(value, element) {
            return this.optional(element) || (value == document.getElementById("passwordPassword").value);
        },
        "Password is not match"
    );
    $('#formRecoverPassword').validate({
        rules: {
            passwordConfirmPassword: {
                confirmPasswordMatch: true
            }
        },
        messages: {
            passwordPassword: {
                required: "NIK Tidak Boleh Kosong"
            },
            passwordConfirmPassword: {
                required: "Tidak Boleh Kosong"
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