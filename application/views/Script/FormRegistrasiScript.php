<script>

var varNamaLengkap="";
var varNIK="";
var varTempatLahir="";
var varTanggalLahir="";
var varPendidikan="";
var varPekerjaan="";
var varPenghasilan="";
var varNomorHP="";

function valuesBiodataAyah(){
    varNamaLengkap = document.getElementById("inputNamaLengkapAyah").value;
    varNIK = document.getElementById("inputNIKAyah").value;
    varTempatLahir = document.getElementById("inputTempatLahirAyah").value;
    varTanggalLahir = document.getElementById("dateTanggalLahirAyah").value;
    varPendidikan = document.getElementById("selectPendidikanAyah").value;
    varPekerjaan = document.getElementById("selectPekerjaanAyah").value;
    varPenghasilan = document.getElementById("selectPenghasilanAyah").value;
    varNomorHP = document.getElementById("inputNomorHPAyah").value;
};

function valuesBiodataIbu(){
    varNamaLengkap = document.getElementById("inputNamaLengkapIbu").value;
    varNIK = document.getElementById("inputNIKIbu").value;
    varTempatLahir = document.getElementById("inputTempatLahirIbu").value;
    varTanggalLahir = document.getElementById("dateTanggalLahirIbu").value;
    varPendidikan = document.getElementById("selectPendidikanIbu").value;
    varPekerjaan = document.getElementById("selectPekerjaanIbu").value;
    varPenghasilan = document.getElementById("selectPenghasilanIbu").value;
    varNomorHP = document.getElementById("inputNomorHPIbu").value;
};
function resetValues(){
    varNamaLengkap="";
    varNIK="";
    varTempatLahir="";
    varTanggalLahir="";
    varPendidikan="";
    varPekerjaan="";
    varPenghasilan="";
    varNomorHP="";
};

function setValueBiodataWali()
{
    document.getElementById("inputNamaLengkapWali").value = varNamaLengkap;
    document.getElementById("inputNIKWali").value = varNIK;
    document.getElementById("inputTempatLahirWali").value = varTempatLahir;
    document.getElementById("dateTanggalLahirWali").value = varTanggalLahir;
    document.getElementById("selectPendidikanWali").value = varPendidikan;
    document.getElementById("selectPekerjaanWali").value = varPekerjaan;
    document.getElementById("selectPenghasilanWali").value = varPenghasilan;
    document.getElementById("inputNomorHPWali").value = varNomorHP;
}

$(document).ready(function () {
    $("#divUkuranJilbab *").prop("disabled", true);
});

$("input[name='radioJenisKelaminSantri']").change(function(){
    $("#divUkuranJilbab *").prop("disabled", false);
    if($(this).val() == 'L')
    {
        document.getElementById("selectUkuranJilbab").value = "";
        $("#divUkuranJilbab *").prop("disabled", true);
    }
});

$("input[name='ckAlamatWali']").change(function(){
    var checkBox = document.getElementById("ckAlamatWali");
    var alamatCalonSantri = document.getElementById("inputAlamatSantri").value;
    document.getElementById("inputAlamatWali").value = "";
    if (checkBox.checked == true){
        document.getElementById("inputAlamatWali").value = alamatCalonSantri;
    } 
});

$("input[name='ckBiodataWali']").change(function(){
    resetValues();
    $("#divBiodataWali *").prop("disabled", false);
    if($(this).val() == '1')
    {
        valuesBiodataAyah();
        $("#divBiodataWali *").prop("disabled", false);
    }
    else if($(this).val() == '2')
    {
        valuesBiodataIbu();
        $("#divBiodataWali *").prop("disabled", false);
    }

    setValueBiodataWali();
});

$(function () {
    var selectedDateTanggalLahirSantri=document.getElementById("dateTanggalSantri").value;  
    $('#dateTanggalSantri').datetimepicker({
        format: 'DD MMMM YYYY',
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