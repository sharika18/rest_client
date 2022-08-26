<script type="text/javascript">
//FUNCTION
    $(document).ready(function()
    {
        
        var selectedDate=document.getElementById("dateTMT").value;  
        $("#dateTMT").datetimepicker({
            format: 'YYYY-MM-DD',
            date : selectedDate
        });
        
        resetFormBehavior();

        //VARIABLES
            //FORM
            var inputID             = '';  
            var inputNIP            = '';            
            var dateTMT             = "";         
            var inputNamaLengkap    = "";   
            var emailEmail          = "";      
            var selectPendidikan    = "";      
            var selectJabatanTugas  = "";  
            var selectUnit          = "";  
            var selectStatus        = "";        

            function setFormValue()
            {
                $("#inputID").val(inputID);
                $("#inputNIP").val(inputNIP);
                $("#dateTMT").val(dateTMT);
                $("#inputNamaLengkap").val(inputNamaLengkap);
                $("#emailEmail").val(emailEmail);
                $("#selectPendidikan").val(selectPendidikan);
                $("#selectJabatanTugas").val(selectJabatanTugas);
                $("#selectUnit").val(selectUnit);
                $("#selectStatus").val(selectStatus);
            }

            function setDataValue()
            {
                inputID             = $('#inputID').val();   
                inputNIP            = $('#inputNIP').val();          
                dateTMT             = $('#dateTMT').val();         
                inputNamaLengkap    = $('#inputNamaLengkap').val();   
                emailEmail          = $('#emailEmail').val();      
                selectPendidikan    = $('#selectPendidikan').val();      
                selectJabatanTugas  = $('#selectJabatanTugas').val();  
                selectUnit          = $('#selectUnit').val();  
                selectStatus        = $('#selectStatus').val();
            }
        
        //RESET FUNCTION
            function resetFormValue()
            {
                $("#inputID").val("");
                $("#inputNIP").val("");
                $("#dateTMT").val("");
                $("#inputNamaLengkap").val("");
                $("#emailEmail").val("");
                $("#selectPendidikan").val("");
                $("#selectJabatanTugas").val("");
                $("#selectUnit").val("");
                $("#selectStatus").val("");
            }

            function resetFormBehavior()
            {
                formAction = "Tambah";
                $('#formTitle').html(formAction+" Data");
                getPendidikan();
                getJabatanTugas();
                getUnit();
                getStatus();
            }
        //FETCH DATA TO DATATABLE
            var table = $("#dgMasterKaryawan").DataTable({
                ajax: '<?php echo base_url('Karyawan/getVwKaryawanDetail/')?>',
                "destroy": true,
                columns: 
                [
                    { data: 'NIP' },
                    { 
                        data: 'NamaLengkap',
                        className: "tdDeskripsi" 
                    },
                    { data: 'Email' },
                    { data: 'jabatanTugas' },
                    { data: 'unit' },
                    { data: 'status' },
                    {
                        data: "karyawanID" , 
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
                    // {
                    //     targets: -1,
                    //     data: null,  
                    //     defaultContent: '<button class="btn btn-warning btn-sm item-edit"><i class="fas fa-edit"></i></button>',
                    // },
                ],
            });

        //FETCH DATA TO OPTIONS
            function getPendidikan()
            {
                
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('Karyawan/getAllPendidikan')?>',
                    async : true,
                    dataType : 'json',
                    success : function(data)
                    {
                        // alert(data.length);
                        // data.sort(function(a, b)
                        // {
                        //     var aName = a.pendidikanID.toLowerCase();
                        //     var bName = b.pendidikanID.toLowerCase(); 
                        //     return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                        // });

                        var html = '<option value="">-- Pilih Pendidikan --</option>';
                        var i;
                        for(i=0; i<data.length; i++)
                        {
                            html += '<option value="'+data[i].pendidikanID+'">'+data[i].Pendidikan+'</option>';
                        }
                        $('#selectPendidikan').html(html);
                    },
                    error:function(data){
                    }
                });
            }

            function getJabatanTugas()
            {
                
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('Karyawan/getAllJabatanTugas')?>',
                    async : true,
                    dataType : 'json',
                    success : function(data)
                    {
                        // alert(data.length);
                        data.sort(function(a, b)
                        {
                            var aName = a.jabatanTugas.toLowerCase();
                            var bName = b.jabatanTugas.toLowerCase(); 
                            return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                        });

                        var html = '<option value="">-- Pilih Jabatan / Tugas --</option>';
                        var i;
                        for(i=0; i<data.length; i++)
                        {
                            html += '<option value="'+data[i].jabatanTugasID+'">'+data[i].jabatanTugas+'</option>';
                        }
                        $('#selectJabatanTugas').html(html);
                    },
                    error:function(data){
                    }
                });
            }

            function getUnit()
            {
                
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('Karyawan/getAllUnit')?>',
                    async : true,
                    dataType : 'json',
                    success : function(data)
                    {
                        // alert(data.length);
                        data.sort(function(a, b)
                        {
                            var aName = a.unit.toLowerCase();
                            var bName = b.unit.toLowerCase(); 
                            return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                        });

                        var html = '<option value="">-- Pilih Unit --</option>';
                        var i;
                        for(i=0; i<data.length; i++)
                        {
                            html += '<option value="'+data[i].unitID+'">'+data[i].unit+'</option>';
                        }
                        $('#selectUnit').html(html);
                    },
                    error:function(data){
                    }
                });
            }

            function getStatus()
            {
                
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('Karyawan/getAllStatusKaryawan')?>',
                    async : true,
                    dataType : 'json',
                    success : function(data)
                    {
                        // alert(data.length);
                        data.sort(function(a, b)
                        {
                            var aName = a.status.toLowerCase();
                            var bName = b.status.toLowerCase(); 
                            return ((aName < bName) ? -1 : ((aName > bName) ? 1 : 0));
                        });

                        var html = '<option value="">-- Pilih Status --</option>';
                        var i;
                        for(i=0; i<data.length; i++)
                        {
                            html += '<option value="'+data[i].statusID+'">'+data[i].status+'</option>';
                        }
                        $('#selectStatus').html(html);
                    },
                    error:function(data){
                    }
                });
            }

        //GET DATA FOR EDIT
            //FUNCTION CALL CONTROLLER
            function getKaryawanByNIP(NIP)
            { 
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('Karyawan/getKaryawanByNIP/')?>'+NIP,
                    async : true,
                    dataType : 'json',
                    success : function(data)
                    {
                        var i;
                        for(i=0; i<data.length; i++)
                        {
                                inputID             = data[i].karyawanID;
                                inputNIP            = data[i].NIP;            
                                dateTMT             = data[i].TanggalMulaiTugas;         
                                inputNamaLengkap    = data[i].NamaLengkap;   
                                emailEmail          = data[i].Email;      
                                selectPendidikan    = data[i].pendidikanID;      
                                selectJabatanTugas  = data[i].jabatanTugasID;  
                                selectUnit          = data[i].unitID;  
                                selectStatus        = data[i].statusID; 

                                setFormValue();
                        }
                    },
                    error:function(data)
                    {
                        table.ajax.reload(); 
                    }

                });
            }

            //ON CLICK ACTION BUTTON
            $('#dgMasterKaryawan').on('click', '.item-edit', function () 
            {
                formAction = "Edit";
                $('#formTitle').html(formAction+" Data");
                var data = table.row($(this).parents('tr')).data();     
                getKaryawanByNIP(data['NIP']);
                $(window).scrollTop($('#divForm').offset().top);
            });
        
        //GET DATA FOR DELETE
            //ON CLICK ACTION BUTTON
            $('#dgMasterKaryawan').on('click', '.item-delete', function () 
            {
                var data = table.row($(this).parents('tr')).data();   
                $("#inputID").val(data['karyawanID']);  
            });

        //CRUD ACTION
            //SAVE
            function saveData()
            {
                setDataValue(); 

                $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('Karyawan/TambahKaryawan')?>",
                        //dataType : "JSON",
                        data : 
                        {
                            inputNIP            : inputNIP,          
                            dateTMT             : dateTMT,        
                            inputNamaLengkap    : inputNamaLengkap,   
                            emailEmail          : emailEmail,        
                            selectPendidikan    : selectPendidikan,      
                            selectJabatanTugas  : selectJabatanTugas,  
                            selectUnit          : selectUnit,        
                            selectStatus        : selectStatus 
                        },
                        success: function(data)
                        {
                            if(data == 'sukses')
                            {
                                var $successMessage = "Karyawan <b>"+inputNamaLengkap+"</b> berhasil disimpan";
                                toastr.success($successMessage);
                            }else
                            {
                                var $errorMessage = "Karyawan <b>"+inputNamaLengkap+"</b> gagal disimpan";
                                toastr.error($errorMessage);
                            }
                            table.ajax.reload();
                            $(window).scrollTop($('#divTable').offset().top); 
                        },
                        error: function(data)
                        {
                            var $errorMessage = "Fetch API Error";
                            toastr.error($errorMessage);
                        }
                    });
                    return false;
            }

            //EDIT
            function editData()
            {
                setDataValue();
                $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('Karyawan/EditKaryawan')?>",
                        //dataType : "JSON",
                        data : 
                        {
                            inputID             : inputID,
                            inputNIP            : inputNIP,          
                            dateTMT             : dateTMT,        
                            inputNamaLengkap    : inputNamaLengkap,   
                            emailEmail          : emailEmail,        
                            selectPendidikan    : selectPendidikan,      
                            selectJabatanTugas  : selectJabatanTugas,  
                            selectUnit          : selectUnit,        
                            selectStatus        : selectStatus 
                        },
                        success: function(data)
                        {
                            if(data == 'sukses')
                            {
                                var $successMessage = "Karyawan <b>"+inputNamaLengkap+"</b> berhasil diubah";
                                toastr.success($successMessage);
                            }else
                            {
                                var $errorMessage = "Karyawan <b>"+inputNamaLengkap+"</b> gagal diubah";
                                toastr.error($errorMessage);
                            }
                            table.ajax.reload();
                            $(window).scrollTop($('#divTable').offset().top); 
                        },
                        error: function(data)
                        {
                            var $errorMessage = "Fetch API Error";
                            toastr.error($errorMessage);
                        }
                    });
                    return false;
            }
            
            //DELETE
            function deleteData()
            {
                var ID  = $('#inputID').val();
                $.ajax({
                        type : "POST",
                        url  : '<?php echo base_url('Karyawan/HapusKaryawan/')?>'+ID,
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

                            table.ajax.reload();
                            $(window).scrollTop($('#divTable').offset().top); 
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
            document.getElementById("btnCancel").addEventListener("click", function()
            {
                resetFormValue();
                resetFormBehavior();
            });

            document.getElementById("btnSave").addEventListener("click", function()
            {
                if(formAction == 'Tambah'){
                    saveData();
                    //alert("Save");
                }else if(formAction == 'Edit'){
                    editData();
                    //alert("Edit");
                }
                resetFormValue();
                resetFormBehavior();
            });

            document.getElementById("btnDelete").addEventListener("click", function()
            {
                deleteData();
                resetFormValue();
                resetFormBehavior();
            });
    
    });
</script>