<script>
$(document).ready(function () {
    $("#divUkuranJilbab *").prop("disabled", true);

});

$("input[name='radioJenisKelaminSantri']").change(function(){
    $("#divUkuranJilbab *").prop("disabled", false);
    if($(this).val() == '1')
    {
        document.getElementById("selectUkuranJilbab").value = "0";
        $("#divUkuranJilbab *").prop("disabled", true);
    }
});

$("#dateTanggalLahirSantri").on("dp.change",function (e) {
            alert('ok');
});
</script>