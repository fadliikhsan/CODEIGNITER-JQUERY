<?php foreach($mahasiswa as $baris): ?>
<form id='formmahasiswa' class="form-horizontal">
<input type="hidden" name="id_mhs" id="id_mhs" value="<?php echo $baris->id_mhs ?>">
<div class="control-group">
	<label class="control-label">Nim</label>
	<div class="controls">
		<input type="text" name="nim" id="nim" value="<?php echo $baris->nim ?>">
	</div>
</div>
<div class="control-group">
	<label class="control-label">Nama</label>
	<div class="controls">
		<input type="text" name="nama" style="width:400px;" id="nama" value="<?php echo $baris->nama ?>">
	</div>
</div>
<div class="control-group">
	<label class="control-label">Jurusan</label>
	<div class="controls">
		<input type="text" name="jurusan" id="jurusan" value="<?php echo $baris->jurusan ?>">
	</div>
</div>
<div class="control-group">
	<label class="control-label">Angkatan</label>
	<div class="controls">
		<input type="text" name="angkatan" id="angkatan" value="<?php echo $baris->angkatan ?>">
	</div>
</div>
</form>
<?php endforeach ?>