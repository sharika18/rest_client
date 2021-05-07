<script>
$(document).ready(function () {
    $("#formBiodataSantri *").prop("disabled", true);
    $("#formBiodataAyah *").prop("disabled", true);
    $("#formBiodataIbu *").prop("disabled", true);
    $("#formBiodataWali *").prop("disabled", true);

});
document.getElementById('selectJenjang').onchange = function () 
{
    if (this.value == '0') 
    {
        $("#formBiodataSantri *").prop("disabled", true);
        $("#formBiodataAyah *").prop("disabled", true);
        $("#formBiodataIbu *").prop("disabled", true);
        $("#formBiodataWali *").prop("disabled", true);
    }
    else 
    {
        $("#formBiodataSantri *").prop("disabled", false);
        $("#formBiodataAyah *").prop("disabled", false);
        $("#formBiodataIbu *").prop("disabled", false);
        $("#formBiodataWali *").prop("disabled", false);
    }
}

</script>