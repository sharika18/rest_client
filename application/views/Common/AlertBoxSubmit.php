<script>
    $(function () {
        $(".btnSubmit").click(function () {
            if ($( "#formSubmit" ).valid()) {
                $("#modalSubmit").modal();
                var act = "<?php echo $_GET['act'] ?>";
                var actValue = act.toLowerCase();
                var message = "";
                    message +=
                        "<p><?php echo $alertBoxSubmitMessage ?></p>";

                $("#modalSubmitContent").empty();
                $("#modalSubmitContent").append(message);
            }
        });
    });
</script>


<div class="modal fade" id="modalSubmit">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $_GET['act'] ?> Data Biaya</h4>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submitForm()">
                    <?php echo $_GET['act'] ?>
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function submitForm() {
  document.getElementById("formSubmit").submit();
}
</script>