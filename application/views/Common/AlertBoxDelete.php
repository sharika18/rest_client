<script>
    $(function () {
        var table = $("#dgMasterBiaya").DataTable();
        //$('#dgMasterBiaya tbody').on( 'click', 'tr', function () {
          //  $(this).toggleClass('selected');
            //var pos = table.row(this).index();
            //var row = table.row(pos).data()[0];
            //alert(row);
        //} );

        $(".btnDelete").click(function () {
            var pos = table.row(this).index();
            var row = table.row(pos).data()[0];
            alert(row);
            var iddToBeDeleted = table.row($(this).parents("tr")).data()[0];
            var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
            var message = "";
                message +=
                    "<p>Apakah kamu yakin ingin menghapus data berikut : <b>"
                            + dataDeskripsi+"</b> ? </p>";

            $("#modalContent").empty();
            $("#modalContent").append(message);

            $("#id").val(iddToBeDeleted);
        });
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
                            '<?php echo base_url()?>Biaya/Hapus/'+document.getElementById('id').value+'?modul=masterBiaya&act=Hapus'"
                    class="btn btn-primary">Delete</a>
            </div>
        </div>
    </div>
</div>