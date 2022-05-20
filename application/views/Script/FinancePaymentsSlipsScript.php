<script>
const previewDataFinance = document.getElementById("previewDataFinance");
const btnRemovePreviewDataFinance = document.getElementById("btnRemovePreviewDataFinance");
btnRemovePreviewDataFinance.onclick = function () {
    if (previewDataFinance.style.display !== "none") {
        alert("Hello! I am an alert box!!");
        previewDataFinance.style.display = "none";
    } else {
        alert("Hello! I am an alert box!!");
        previewDataFinance.style.display = "block";
    }
};
</script>