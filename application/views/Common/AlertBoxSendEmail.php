<script>
    $(function () {
        $(".btnSendEmail").click(function () {
            if ($("#formSendEmail" ).valid()) {
                $("#modalSendEmail").modal();
                var act = "<?php echo $_GET['act'] ?>";
                var actValue = act.toLowerCase();
                var varSelectedPeriode = document.getElementById("selectPeriode").value;
                var message = "";
                    message +=
                        "<p><?php echo $alertBoxSendEmail ?></p> <b>" + varSelectedPeriode+"</b>";

                $("#modalSendEmailContent").empty();
                $("#modalSendEmailContent").append(message);
            }
        });
    });
</script>


<div class="modal fade" id="modalSendEmail">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Send Email</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <div class="GFGclass" id="modalSendEmailContent"></div>
                <input type="text" value="" id="idToEdit" name="name" hidden/>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submitFormSendEmail()">
                    Send
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function submitFormSendEmail() {
  document.getElementById("formSendEmail").submit();
}
</script>