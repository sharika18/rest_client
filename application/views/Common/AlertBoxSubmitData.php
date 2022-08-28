<script>
    function setModalSubmitAlert(formID, inputDeskripsi)
    {
        if ($(formID).valid()) {
            $("#modalSubmit").modal();
            var deskripsi = $(inputDeskripsi).val();
            var message = "";
                message +=
                    "<p><?php echo $alertBoxSubmitMessage ?></p>";
                message += "<b>"+deskripsi+"</b>";

            $("#modalSubmitContent").empty();
            $("#modalSubmitContent").append(message);
        }
    }
    // $(function () {
    //     $(".btnSubmit").click(function () {
    //         //setModalSubmitAlert("#formSubmit", '.inputDeskripsi');
    //     });
    // });
</script>


<div class="modal fade" id="modalSubmit">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <div class="GFGclass" id="modalSubmitContent"></div>
                <input type="text" value="" id="idToEdit" name="name" hidden/>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btnSave" data-dismiss="modal">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<!-- <script>
function submitForm() {
  document.getElementById("formSubmit").submit();
}
</script> -->