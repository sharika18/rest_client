<script>
    $(function () {
        $(".btnDeleteSlip").click(function () {
            if ($("#formSendEmail" ).valid()) {
                $("#modalDeleteSlip").modal();
                var act = "<?php echo $_GET['act'] ?>";
                var actValue = act.toLowerCase();
                var varSelectedPeriode = document.getElementById("selectPeriode").value;
                var message = "";
                message +=
                        "<p><?php echo $alertBoxDeleteSlip ?></p> <b>" + varSelectedPeriode+"</b>";

                $("#modalDeleteSlipContent").empty();
                $("#modalDeleteSlipContent").append(message);
            }
        });
    });
</script>


<div class="modal fade" id="modalDeleteSlip">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Delete Slip Per Periode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <div class="GFGclass" id="modalDeleteSlipContent"></div>
                <input type="text" value="" id="idToEdit" name="name" hidden/>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a  href=""
                    onclick="this.href=
                            '<?=$deleteControllerPath?>'+document.getElementById('selectPeriode').value"
                    class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>