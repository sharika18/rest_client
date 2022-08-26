<script>
    $(function () {
        var table = $("<?php echo $idDataTable ?>").DataTable();
        $('<?php echo $idDataTable ?>').on( 'click', '.btnDelete', function () {
            //alert("idtobeleted :");
            $(this).toggleClass('selected');
            var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
            var idToBeDeleted = $(this).data('id');
            //alert(ID);
            var message = "";
                message +=
                        "<p><?php echo $deleteAlertMessage ?> <b>"
                            + dataDeskripsi+"</b> ? </p>";
            $("#modalContent").empty();
            $("#modalContent").append(message);
            $("#id").val(idToBeDeleted);
        } );
    });
</script>

<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <div class="GFGclass" id="modalContent"></div>
                <!-- <input type="hidden" value="" id="id" name="name"/> -->
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnDelete">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>