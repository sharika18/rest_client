<script type="text/javascript">
//FUNCTION
    $(document).ready(function()
    {
        var actionDeleteState   = "";
        var actionEditState     = "";
        //FETCH DATA TO DATATABLE
            var tableJabatan = $("#dgMasterJabatan").DataTable({
                ajax: '<?php echo base_url('Karyawan/getAllJabatanTugas/')?>',
                "destroy": true,
                columns: 
                [
                    { 
                        data: 'jabatanTugas',
                        className: "tdDeskripsi" 
                    },
                    {
                        data: "jabatanTugasID" , 
                        render : function ( data, type, row, meta ) 
                        {
                            return '<button class="btn btn-warning btn-sm item-edit"'+
                                        'data-id="'+data+'" '+
                                    '><i class="fas fa-edit"></i></button>'+
                                    '<button class="btnDeleteJabatan btn btn-danger btn-sm item-delete"'+ 
                                        'data-toggle="modal"'+ 
                                        'data-target="#modalDelete"><i class="far fa-trash-alt"></i>'+
                                    '</button>';
                        }
                    }
                ],
            });

            var tableUnit = $("#dgMasterUnit").DataTable({
                ajax: '<?php echo base_url('Karyawan/getAllUnit/')?>',
                "destroy": true,
                columns: 
                [
                    { 
                        data: 'unit',
                        className: "tdDeskripsi" 
                    },
                    {
                        data: "unitID" , 
                        render : function ( data, type, row, meta ) 
                        {
                            return '<button class="btn btn-warning btn-sm item-edit"'+
                                        'data-id="'+data+'" '+
                                    '><i class="fas fa-edit"></i></button>'+
                                    '<button class="btnDelete btn btn-danger btn-sm item-delete"'+ 
                                        'data-toggle="modal"'+ 
                                        'data-target="#modalDelete"><i class="far fa-trash-alt"></i>'+
                                    '</button>';
                        }
                    }
                ],
            });

            var tablePendidikan = $("#dgMasterPendidikan").DataTable({
                ajax: '<?php echo base_url('Karyawan/getAllPendidikan/')?>',
                "destroy": true,
                columns: 
                [
                    { 
                        data: 'Pendidikan',
                        className: "tdDeskripsi" 
                    },
                    {
                        data: "pendidikanID" , 
                        render : function ( data, type, row, meta ) 
                        {
                            return '<button class="btn btn-warning btn-sm item-edit"'+
                                        'data-id="'+data+'" '+
                                    '><i class="fas fa-edit"></i></button>'+
                                    '<button class="btnDelete btn btn-danger btn-sm item-delete"'+ 
                                        'data-toggle="modal"'+ 
                                        'data-target="#modalDelete"><i class="far fa-trash-alt"></i>'+
                                    '</button>';
                        }
                    }
                ],
            });

            var tableStatus = $("#dgMasterStatusKepegawaian").DataTable({
                ajax: '<?php echo base_url('Karyawan/getAllStatusKaryawan/')?>',
                "destroy": true,
                columns: 
                [
                    { 
                        data: 'status',
                        className: "tdDeskripsi" 
                    },
                    {
                        data: "statusID" , 
                        render : function ( data, type, row, meta ) 
                        {
                            return '<button class="btn btn-warning btn-sm item-edit"'+
                                        'data-id="'+data+'" '+
                                    '><i class="fas fa-edit"></i></button>'+
                                    '<button class="btnDelete btn btn-danger btn-sm item-delete"'+ 
                                        'data-toggle="modal"'+ 
                                        'data-target="#modalDelete"><i class="far fa-trash-alt"></i>'+
                                    '</button>';
                        }
                    }
                ],
            });
        //GET DATA FOR EDIT
            //ON CLICK ACTION BUTTON
            $('#dgMasterJabatan').on('click', '.item-edit', function () 
            {
                actionEditState = "deleteJabatan";
                var data = tableJabatan.row($(this).parents('tr')).data(); 
                $("#inputJabatan").val(data['jabatanTugas']);    
                $("#inputIDJabatan").val(data['jabatanTugasID']);  
            });

            $('#dgMasterUnit').on('click', '.item-edit', function () 
            {
                actionEditState = "editUnit";
                var data = tableUnit.row($(this).parents('tr')).data();   
                $("#inputUnit").val(data['unit']); 
                $("#inputIDUnit").val(data['unitID']);  
            });

            $('#dgMasterPendidikan').on('click', '.item-edit', function () 
            {
                actionEditState = "editPendidikan";
                var data = tablePendidikan.row($(this).parents('tr')).data();   
                $("#inputPendidikan").val(data['Pendidikan']);  
                $("#inputIDPendidikan").val(data['pendidikanID']);  
            });

            $('#dgMasterStatusKepegawaian').on('click', '.item-edit', function () 
            {
                actionEditState = "editStatusKepegawaian";
                var data = tableStatus.row($(this).parents('tr')).data();   
                $("#inputStatusKepegawaian").val(data['status']);  
                $("#inputIDStatusKepegawaian").val(data['statusID']);  
            });
        //GET DATA FOR DELETE
            //ON CLICK ACTION BUTTON
            $('#dgMasterJabatan').on('click', '.item-delete', function () 
            {
                actionDeleteState = "deleteJabatan";
                //alert(actionDeleteState);
                
                var data = tableJabatan.row($(this).parents('tr')).data();   
                $("#inputIDJabatan").val(data['jabatanTugasID']);  

                var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
                var message =   "<p>Apakah kamu yakin ingin menghapus jabatan berikut : <b>"
                                + dataDeskripsi+"</b> ? </p>";
                $("#modalContent").empty();
                $("#modalContent").append(message);
            });

            $('#dgMasterUnit').on('click', '.item-delete', function () 
            {
                actionDeleteState = "deleteUnit";
                alert(actionDeleteState);
                
                var data = tableUnit.row($(this).parents('tr')).data();   
                $("#inputIDUnit").val(data['unitID']);  

                var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
                var message =   "<p>Apakah kamu yakin ingin menghapus unit berikut : <b>"
                                + dataDeskripsi+"</b> ? </p>";
                $("#modalContent").empty();
                $("#modalContent").append(message);
            });

            $('#dgMasterPendidikan').on('click', '.item-delete', function () 
            {
                actionDeleteState = "deletePendidikan";
                alert(actionDeleteState);
                
                var data = tablePendidikan.row($(this).parents('tr')).data();   
                $("#inputIDPendidikan").val(data['pendidikanID']);  

                var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
                var message =   "<p>Apakah kamu yakin ingin menghapus pendidikan berikut : <b>"
                                + dataDeskripsi+"</b> ? </p>";
                $("#modalContent").empty();
                $("#modalContent").append(message);
            });

            $('#dgMasterStatusKepegawaian').on('click', '.item-delete', function () 
            {
                actionDeleteState = "deleteStatusKepegawaian";
                alert(actionDeleteState);
                
                var data = tableStatus.row($(this).parents('tr')).data();   
                $("#inputIDStatusKepegawaian").val(data['statusID']);  

                var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
                var message =   "<p>Apakah kamu yakin ingin menghapus status kepagawaian berikut : <b>"
                                + dataDeskripsi+"</b> ? </p>";
                $("#modalContent").empty();
                $("#modalContent").append(message);
            });
        //CRUD ACTION
            //DELETE
            function deleteData(inputID, urlDelete, divTable)
            {
                var ID  = $(inputID).val();
                $.ajax({
                        type : "POST",
                        url  : urlDelete+ID,
                        success: function(data)
                        {
                            if(data == 'sukses')
                            {
                                var $successMessage = "Data berhasil dihapus";
                                toastr.success($successMessage);
                            }else
                            {
                                var $errorMessage = "Data gagal dihapus";
                                toastr.error($errorMessage);
                            }
                            
                            tableJabatan.ajax.reload();
                            tableUnit.ajax.reload();
                            tablePendidikan.ajax.reload();
                            tableStatus.ajax.reload();
                            $(window).scrollTop($(divTable).offset().top); 
                        },
                        error: function(data)
                        {
                            var $errorMessage = "Fetch API Error";
                            toastr.error($errorMessage);
                        }
                    });
                return false;
            }
        //ADD EVENT LISTENER
            $("#vert-tabs-unit-tab").click(function () {
            document.getElementById('vert-tabs-pendidikan').className = " tab-pane";
            document.getElementById('vert-tabs-statusKepegawian').className = " tab-pane";
            });
            $("#vert-tabs-pendidikan-tab").click(function () {
                document.getElementById('vert-tabs-unit').className = " tab-pane";
                document.getElementById('vert-tabs-statusKepegawian').className = " tab-pane";
            });
            $("#vert-tabs-statusKepegawian-tab").click(function () {
                document.getElementById('vert-tabs-unit').className = " tab-pane";
                document.getElementById('vert-tabs-pendidikan').className = " tab-pane";
            });

            $("#btnCancelJabatan").click(function () {
                $("#inputJabatan").val("");
                $("#inputIDJabatan").val("");
            });
            $("#btnCancelUnit").click(function () {
                $("#inputUnit").val("");
                $("#inputIDUnit").val("");
            });
            $("#btnCancelPendidikan").click(function () {
                $("#inputPendidikan").val("");
                $("#inputIDPendidikan").val("");
            });
            $("#btnCancelStatusKepegawaian").click(function () {
                $("#inputStatusKepegawaian").val("");
                $("#inputIDStatusKepegawaian").val("");
            });

            $("#btnSubmitJabatan").click(function () {
                setModalSubmitAlert("#formSubmitJabatan", '.inputDeskripsiJabatan');
            });
            $("#btnSubmitUnit").click(function () {
                setModalSubmitAlert("#formSubmitUnit", '.inputDeskripsiUnit');
            });
            $("#btnSubmitPendidikan").click(function () {
                setModalSubmitAlert("#formSubmitPendidikan", '.inputDeskripsiPendidikan');
            });
            $("#btnSubmitStatusKepegawaian").click(function () {
                setModalSubmitAlert("#formSubmitStatusKepegawaian", '.inputDeskripsiStatusKepegawaian');
            });

            document.getElementById("btnDelete").addEventListener("click", function()
            {
                var url = "";
                var ID =  "";
                switch (actionDeleteState) {
                    case "deleteJabatan":
                        url = '<?php echo base_url('Karyawan/HapusJabatanTugas/')?>';
                        deleteData("#inputIDJabatan", url, "#divTableJabatan");
                        break;
                    case "deleteUnit":
                        url = '<?php echo base_url('Karyawan/HapusUnit/')?>';
                        deleteData("#inputIDUnit", url, "#divTableUnit");
                        break;
                    case "deletePendidikan":
                        url = '<?php echo base_url('Karyawan/HapusPendidikan/')?>';
                        deleteData("#inputIDPendidikan", url, "#divTablePendidikan");
                        break;
                    case "deleteStatusKepegawaian":
                        url = '<?php echo base_url('Karyawan/HapusStatusKaryawan/')?>';
                        deleteData("#inputIDStatusKepegawaian", url, "#divTableStatusKepegawaian");
                }
            });
    });
</script>