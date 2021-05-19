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

</script>