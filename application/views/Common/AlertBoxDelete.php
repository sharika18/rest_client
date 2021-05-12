<script>
    $(function () {
        var table = $("<?php echo $idDataTable ?>").DataTable();
        $('<?php echo $idDataTable ?>').on( 'click', '.btnDelete', function () {
           $(this).toggleClass('selected');
            var idToBeDeleted = table.row($(this).parents("tr")).data()[0];
            var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
            var message = "";
                message +=
                    "<p>Apakah kamu yakin ingin menghapus data berikut : <b>"
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
                <h4 class="modal-title">Hapus Data Biaya</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <div class="GFGclass" id="modalContent"></div>
                <input type="text" value="" id="id" name="name" hidden/>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a  href=""
                    onclick="this.href=
                            '<?=$deleteControllerPath?>'+document.getElementById('id').value+'<?=$deleteHrefParam?>'"
                    class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>