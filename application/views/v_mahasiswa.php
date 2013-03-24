<html>
<head>
    <title><?php echo $judul ?></title>
    <link href="<?php echo base_url();?>asset/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
		<script>
			$().ready(function(){                        
				$("#tombolTambah").click(function(){	/*Ketika tombol tambah di klik*/
					$.ajax({
						url : "<?php echo base_url(); ?>cmahasiswa/add_mahasiswa", /*Mengarahkan ke fungsi add_mahasiswa yang berada pada controller cmahasiswa*/
						beforeSend: function(){
											$("#loading").html('<img src="<?php echo base_url(); ?>asset/img/loading51.gif">');										
										},
						success:    function(html){
										$("#data").html(html);
										$("#btnSimpan").show();
										$("#btnKembali").show();
										$("#tombolTambah").hide();
									}                
					});            
				});        
            
				$("#btnSimpan").click(function(){     /*Ketika tombol Simpan di klik*/            
					var nim 		= $("#nim").val();
					var nama 		= $("#nama").val();
					var jurusan 	= $("#jurusan").val();
					var angkatan 	= $("#angkatan").val();
					
					/*Pengecekan form. tidak boleh kosong*/
					if($("#nim").val() == "" || $("#nama").val() == "" || $("#jurusan").val() == "" || $("#angkatan").val() == "")
						$.ajax({
							success: function(html){
								$("#notifikasi").html('Data gagal disimpan');
								$("#notifikasi").fadeIn(1500);
								$("#notifikasi").fadeOut(1500);	
							}						
						});
					else
						$.ajax({
							url : "<?php echo base_url() ?>cmahasiswa/add_mahasiswa", /*POST data yang dikirim ke fungsi add_mahasiswa*/
							type: "POST",
							beforeSend: function(){
												$("#loading").fadeIn(3000).html('<img src="<?php echo base_url(); ?>asset/img/loading51.gif">');
											},
							data    : "nim="+nim+"&nama="+nama+"&jurusan="+jurusan+"&angkatan="+angkatan,
							success:    function(html){
										$("#tombolTambah").show();                                 
										$("#btnKembali").hide();
										$("#btnSimpan").hide();
											$("#data").load("<?php echo base_url() ?>cmahasiswa #data");
											$("#notifikasi").html('Data berhasil disimpan');                                    
											$("#notifikasi").fadeIn(2500);
											$("#notifikasi").fadeOut(2500);                                
										}                
						});            
				});
            
			
				$("#btnKembali").click(function(){  /*Ketika tombol kembali di klik*/                              
					$.ajax({
						url : "<?php echo base_url() ?>cmahasiswa",
						beforeSend: function(){
                                        $("#data").html("Loading...");
                                    },                
						success:    function(html){
									$("#tombolTambah").show();
									$("#btnSimpan").hide();  
									$("#btnKembali").hide();																		                                
									$("#data").load("<?php echo base_url() ?>cmahasiswa #data");                                                                                                    
                                }                
					});            
				});
                        
                $("#tombolUpdate").click(function(){                    
                    var id_mhs 		= $("#id_mhs").val();
                    var nim 		= $("#nim").val();
                    var nama 		= $("#nama").val();
                    var jurusan 	= $("#jurusan").val();
                    var angkatan 	= $("#angkatan").val();  
					if($("#id_mhs").val() == "" || $("#nim").val() == "" || $("#nama").val() == "" || $("#jurusan").val() == "" || $("#angkatan").val() == "")
						$.ajax({
							success: function(html){
								$("#notifikasi").html('Data gagal disimpan');
								$("#notifikasi").fadeIn(1500);
								$("#notifikasi").fadeOut(1500);	
							}						
						});
					else
                    $.ajax({
                        url : "<?php echo base_url() ?>cmahasiswa/update",
                        type: "post",
                        beforeSend: function(){
                                            $("#data").html("Loading...");
                                        },
                        data    : "id_mhs="+id_mhs+"&nim="+nim+"&nama="+nama+"&jurusan="+jurusan+"&angkatan="+angkatan,
                        success:    function(html){
                                    $("#tombolTambah").show();                                 
                                    $("#tombolUpdate").hide();                                 
                                        $("#data").load("<?php echo base_url() ?>cmahasiswa/ #data");
                                        $("#notifikasi").html('Data NIM '+nim+' berhasil diEdit');                                    
                                        $("#notifikasi").fadeIn(2500);
                                        $("#notifikasi").fadeOut(2500);                
                                    }                
                    });            
                });                                        
        });
        
        function edit(id_mhs){
            $().ready(function(){  
				//console.log(nim);				
                $.ajax({
                    url : "<?php echo base_url() ?>cmahasiswa/edit/"+id_mhs,					
                    beforeSend: function(){
                                        $("#data").html("Loading...");
                                    },                
                    success:    function(html){
                                $("#tombolUpdate").show();                                 
                                 $("#tombolTambah").hide();                                 
                                    $("#data").html(html);                                                                                                    
                                }                
                });  			
            });        
        }
        
        function hapus(id_mhs){
            if(confirm('Yakin Menghapus?')){
            $().ready(function(){                                        
                $.ajax({                    
                    url : "<?php echo base_url() ?>cmahasiswa/delete/"+id_mhs,        
                    beforeSend: function(){
                                        $("#data").html("Loading...");
                                    },                                                
                    success:    function(html){
                                $("#tombolUpdate").hide();                                 
                                 $("#tombolTambah").show();                                 
                                    $("#data").load('<?php echo base_url() ?>cmahasiswa #data'); 
									$("#notifikasi").html('Data berhasil dihapus');                                    
                                    $("#notifikasi").fadeIn(2000);
                                    $("#notifikasi").fadeOut(2000);
                                }                
                });                    
            });    
        }        
        }
            
    </script>
</head>
<body>    
    <div id="wraper">
    
        <div id="header">
            <center><h2>Codeigniter jQuery CRUD</h2></center>
        </div>               
        <div id="content">
			<div id="notifikasi" style="display:none"></div>
            <div id="paneltombol">
                <input type="button" class="btn" 				id="btnSimpan" 		value="Simpan" style="display:none">
				<input type="button" class="btn" 				id="btnKembali" 	value="Kembali" style="display:none">
                <input type="button" class="btn btn-inverse" 	id="tombolTambah"	name="tombolTambah" value="Tambah Data">
                <input type="button" class="btn" 				id="tombolUpdate" 	name="tombolUpdate" value="Update" style="display:none">
            </div>            
            <div id="data">  
				<div id="loading" style="display:none"></div>				
                <table border="0" width="100%" cellspacing="0" class="table table-bordered">
                <tr>
					<th><center>No</center></th>
                    <th><center>Nim</center></th>
                    <th><center>Nama</center></th>
                    <th><center>Jurusan</center></th> 
                    <th><center>Angkatan</center></th>                    
                    <th colspan="2"><center>Aksi</center></th>
                </tr>
                <?php 
				$i=1;
				foreach($mahasiswa as $baris){?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $baris->nim ?></td>
                    <td><?php echo $baris->nama ?></td>
                    <td><?php echo $baris->jurusan ?></td>
                    <td><center><?php echo $baris->angkatan ?><center></td>	                  
                    <td width="80"><center><a class="btn btn-small" href="#" onclick="edit('<?php echo $baris->id_mhs ?>')"><i class="icon-pencil"></i> EDIT</a></center></td>
                    <td width="80"><center><a class="btn btn-small" href="#" onclick="hapus('<?php echo $baris->id_mhs ?>')"><i class="icon-trash"></i> HAPUS</a></center></td>
                </tr>
                <?php
				$i++;
				}?>
                </table>
            </div>
                    
        </div>    
    </div>
</body>
</html>