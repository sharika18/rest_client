<script>
    $(function () {
        var table = tableData;
        
        $('<?php echo $idDataTable ?>').on( 'click', '.btnSendEmailFromGrid', function () {
           $(this).toggleClass('selected');
            var idToBeDeleted = table.row($(this).parents("tr")).data()[0];
            var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
            var dataPeriode =  $(this).parents("tr").find(".tdPeriode").text();
            var dataNIP =  $(this).parents("tr").find(".tdNIP").text();
            var message = "";
                message +=
                    "<p>Apakah kamu yakin ingin mengirim slip gaji ke karyawan : <b>"
                            + dataDeskripsi+"</b> Untuk periode : <b>"
                            + dataPeriode+"</b> ?</p>";
            $("#modalContent").empty();
            $("#modalContent").append(message);
            $("#periode").val(dataPeriode);
            $("#NIP").val(dataNIP);
        } );
    });
</script>

<div class="modal fade" id="modalSendEmailFromGrid">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Send Payroll Slip</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        
            <div class="modal-body">
                <div class="GFGclass" id="modalContent"></div>
                <input type="text" value="" id="periode" name="name" hidden/>
                <input type="text" value="" id="NIP" name="name" hidden/>
            </div>

            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a  href=""
                    onclick="this.href=
                            '<?=$sendEmailControllerPath?>'+document.getElementById('periode').value+'/'+document.getElementById('NIP').value"
                    class="btn btn-primary">Send</a>
            </div>
        </div>
    </div>
</div>