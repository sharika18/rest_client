<script type="text/javascript">
//FUNCTION
    $(document).ready(function()
    {
        
        var selectedDate=document.getElementById("dateTMT").value;  
        $("#dateTMT").datetimepicker({
            format: 'YYYY-MM-DD',
            date : selectedDate
        });
        var selectedDateTanggalLahirKaryawan=document.getElementById("dateTanggalLahirKaryawan").value;  
        $('#dateTanggalLahirKaryawan').datetimepicker({
            format: 'YYYY-MM-DD',
            date : selectedDateTanggalLahirKaryawan
        });
        resetFormBehavior();

        //VARIABLES
            //FORM
            var inputID                         = '';
            var inputKaryawanJabatan             = '';
            var inputKaryawanJabatan2            = '';  
            var inputNIP                        = '';            
            var dateTMT                         = "";         
            var inputNamaLengkap                = "";   
            var emailEmail                      = ""; 
            var radioJenisKelaminKaryawan       = "";   
            var inputTempatLahirKaryawan        = "";      
            var dateTanggalLahirKaryawan        = "";
            var selectStatusMukim               = "";    
            var selectStatus                    = "";       
            var selectPendidikan                = "";      
            var selectJabatanTugas              = "";  
            var selectUnit                      = "";
            var selectJabatanTugas2             = "";  
            var selectUnit2                     = "";       

            function setFormValue()
            {
                $("#inputID").val(inputID);
                $("#inputKaryawanJabatan").val(inputKaryawanJabatan);
                $("#inputKaryawanJabatan2").val(inputKaryawanJabatan2);
                $("#inputNIP").val(inputNIP);
                $("#dateTMT").val(dateTMT);
                $("#inputNamaLengkap").val(inputNamaLengkap);
                $("#emailEmail").val(emailEmail);
                $('input:radio[name="radioJenisKelaminKaryawan"][value="'+radioJenisKelaminKaryawan+'"]').prop('checked', true);
                $("#inputTempatLahirKaryawan").val(inputTempatLahirKaryawan);
                $("#dateTanggalLahirKaryawan").val(dateTanggalLahirKaryawan);
                $("#selectStatusMukim").val(selectStatusMukim);
                $("#selectStatus").val(selectStatus);
                $("#selectPendidikan").val(selectPendidikan);
                $("#selectJabatanTugas").val(selectJabatanTugas);
                $("#selectUnit").val(selectUnit);
                $("#selectJabatanTugas2").val(selectJabatanTugas2);
                $("#selectUnit2").val(selectUnit2);
            }

            function setDataValue()
            {
                inputID                     =	$("#inputID").val();
                inputKaryawanJabatan         =	$("#inputKaryawanJabatan").val();
                inputKaryawanJabatan2        =	$("#inputKaryawanJabatan2").val();
                inputNIP                    =	$("#inputNIP").val();
                dateTMT                     =	$("#dateTMT").val();
                inputNamaLengkap            =	$("#inputNamaLengkap").val();
                emailEmail                  =	$("#emailEmail").val();
                radioJenisKelaminKaryawan 	=   $('input[name="radioJenisKelaminKaryawan"]:checked').val();
                inputTempatLahirKaryawan    =	$("#inputTempatLahirKaryawan").val();
                dateTanggalLahirKaryawan    =	$("#dateTanggalLahirKaryawan").val();
                selectStatusMukim           =	$("#selectStatusMukim").val();
                selectStatus                =	$("#selectStatus").val();
                selectPendidikan            =	$("#selectPendidikan").val();
                selectJabatanTugas          =	$("#selectJabatanTugas").val();
                selectUnit                  =	$("#selectUnit").val();
                selectJabatanTugas2         =	$("#selectJabatanTugas2").val();
                selectUnit2                 =	$("#selectUnit2").val();

            }
        
        //RESET FUNCTION
            function resetFormValue()
            {
                $("#inputID").val("");
                $("#inputKaryawanJabatan").val("");
                $("#inputKaryawanJabatan2").val("");
                $("#inputNIP").val("");
                $("#dateTMT").val("");
                $("#inputNamaLengkap").val("");
                $("#emailEmail").val("");
                $('input[name="radioJenisKelaminKaryawan"]:checked').val("L");
                $("#inputTempatLahirKaryawan").val("");
                $("#dateTanggalLahirKaryawan").val("");
                $("#selectStatusMukim").val("");
                $("#selectStatus").val("");
                $("#selectPendidikan").val("");
                $("#selectJabatanTugas").val("");
                $("#selectUnit").val("");
                $("#selectJabatanTugas2").val("");
                $("#selectUnit2").val("");

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
                responsive: {
                    details: {
                    type: 'column'
                    }
                },
                columnDefs: [{
                    className: 'control',
                    orderable: false,
                    targets: 0
                }],
                columns: 
                [
                    {data:'firstColumn'},
                    { data: 'NIP' },
                    { 
                        data: 'NamaLengkap',
                        className: "tdDeskripsi" 
                    },
                    { data: 'TanggalMulaiTugas' },
                    { data: 'jenisKelamin' },
                    { data: 'tempatLahir' },
                    { data: 'tanggalLahir' },
                    { data: 'Email' },
                    { data: 'Pendidikan' },
                    { data: 'status' },
                    { data: 'jabatanTugas' },
                    { data: 'unit' },
                    { data: 'jabatanTugas2' },
                    { data: 'unit2' },
                    { data: 'DetailMukim' },
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
                    url   : '<?php echo base_url('Karyawan/getAllPendidikan/dataOption')?>',
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
                    url   : '<?php echo base_url('Karyawan/getAllJabatanTugas/dataOption')?>',
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
                        $('#selectJabatanTugas2').html(html);
                    },
                    error:function(data){
                    }
                });
            }

            function getUnit()
            {
                
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('Karyawan/getAllUnit/dataOption')?>',
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
                        $('#selectUnit2').html(html);
                    },
                    error:function(data){
                    }
                });
            }

            function getStatus()
            {
                
                $.ajax({
                    type  : 'ajax',
                    url   : '<?php echo base_url('Karyawan/getAllStatusKaryawan/dataOption')?>',
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
                                inputID                     =   data[i].karyawanID;
                                inputKaryawanJabatan        =   data[i].karyawanJabatanID1;
                                inputKaryawanJabatan2       =   data[i].karyawanJabatanID2;
                                inputNIP                    =   data[i].NIP;            
                                dateTMT                     =   data[i].TanggalMulaiTugas;         
                                inputNamaLengkap            =   data[i].NamaLengkap;   
                                emailEmail                  =   data[i].Email; 
                                radioJenisKelaminKaryawan 	=   data[i].jenisKelamin;
                                inputTempatLahirKaryawan    =   data[i].tempatLahir;
                                dateTanggalLahirKaryawan    =   data[i].tanggalLahir;
                                selectStatusMukim           =   data[i].statusMukim;
                                selectStatus                =   data[i].statusID;
                                selectPendidikan            =   data[i].pendidikanID; 
                                selectJabatanTugas          =   data[i].jabatanTugasID;  
                                selectUnit                  =   data[i].unitID;  
                                selectJabatanTugas2         =   data[i].jabatanTugasID2;
                                selectUnit2                 =   data[i].unitID2;  
                                 

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
                $("#inputID").val(data['NIP']);  

                var dataDeskripsi =  $(this).parents("tr").find(".tdDeskripsi").text();
                var message =   "<p><?php echo $deleteAlertMessage ?><b>"
                                + dataDeskripsi+"</b> ? </p>";
                $("#modalContent").empty();
                $("#modalContent").append(message);
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
                            inputID                     :   inputID,                   
                            inputKaryawanJabatan        :   inputKaryawanJabatan,       
                            inputKaryawanJabatan2       :   inputKaryawanJabatan2,      
                            inputNIP                    :   inputNIP,                  
                            dateTMT                     :   dateTMT,                         
                            inputNamaLengkap            :   inputNamaLengkap,         
                            emailEmail                  :   emailEmail,                
                            radioJenisKelaminKaryawan 	:   radioJenisKelaminKaryawan, 
                            inputTempatLahirKaryawan    :   inputTempatLahirKaryawan,  
                            dateTanggalLahirKaryawan    :   dateTanggalLahirKaryawan,  
                            selectStatusMukim           :   selectStatusMukim,         
                            selectStatus                :   selectStatus,              
                            selectPendidikan            :   selectPendidikan,         
                            selectJabatanTugas          :   selectJabatanTugas,        
                            selectUnit                  :   selectUnit,                
                            selectJabatanTugas2         :   selectJabatanTugas2,       
                            selectUnit2                 :   selectUnit2 
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
                            inputID                     :   inputID,                   
                            inputKaryawanJabatan        :   inputKaryawanJabatan,       
                            inputKaryawanJabatan2       :   inputKaryawanJabatan2,      
                            inputNIP                    :   inputNIP,                  
                            dateTMT                     :   dateTMT,                         
                            inputNamaLengkap            :   inputNamaLengkap,         
                            emailEmail                  :   emailEmail,                
                            radioJenisKelaminKaryawan 	:   radioJenisKelaminKaryawan, 
                            inputTempatLahirKaryawan    :   inputTempatLahirKaryawan,  
                            dateTanggalLahirKaryawan    :   dateTanggalLahirKaryawan,  
                            selectStatusMukim           :   selectStatusMukim,         
                            selectStatus                :   selectStatus,              
                            selectPendidikan            :   selectPendidikan,         
                            selectJabatanTugas          :   selectJabatanTugas,        
                            selectUnit                  :   selectUnit,                
                            selectJabatanTugas2         :   selectJabatanTugas2,       
                            selectUnit2                 :   selectUnit2  
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

            $(".btnSubmit").click(function () {
                setModalSubmitAlert("#formSubmit", '.inputDeskripsi');
            })
    
    });
</script>