<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/transkrips/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/transkrips/add2') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa*</label>
								<select class="form-control" id="nama_mahasiswa" name="nama_mahasiswa">
   <option selected="0">Pilih mahasiswa</option>
   <?php foreach($mhs as $mahasiswa) : ?>
    <option value="<?php echo $mahasiswa->nama;?>"> <?php echo $mahasiswa->nama; ?></option>
   <?php endforeach; ?>
  </select>
							</div>

							<!--<div class="form-group">
								<label for="nomor_mahasiswa">Nomor Mahasiswa*</label>-->
								<input class="form-control <?php echo form_error('kode_mata_kuliah') ? 'is-invalid':'' ?>"
								 type="hidden" name="kode_mata_kuliah" placeholder="Masukkan kode mata kuliah" />
								<!--<div class="invalid-feedback">
									<?php echo form_error('kode_mata_kuliah') ?>
								</div>
							</div>-->

							<div class="form-group">
								<label for="semester">Semester*</label>
								<input class="form-control <?php echo form_error('semester') ? 'is-invalid':'' ?>"
								 type="number" name="semester" min="0" placeholder="Masukkan semester" />
								<div class="invalid-feedback">
									<?php echo form_error('semester') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="kode_mata_kuliah">Nama Mata Kuliah*</label>
								<select class="form-control" id="kode_mata_kuliah" name="kode_mata_kuliah">
   <option selected="0">Pilih mata kuliah</option>
   <?php foreach($kd_mk as $kodemk) : ?>
    <option value="<?php echo $kodemk->kode_mata_kuliah;?>"> <?php echo $kodemk->nama_mata_kuliah; ?></option>
   <?php endforeach; ?>
  </select>
							</div>

							<div class="form-group">
								<label for="huruf_mutu_mata_kuliah">Huruf Mutu Mata Kuliah*</label>
								<input class="form-control <?php echo form_error('huruf_mutu_mata_kuliah') ? 'is-invalid':'' ?>"
								 type="text" name="huruf_mutu_mata_kuliah" placeholder="Masukkan huruf mutu mata kuliah" />
								<div class="invalid-feedback">
									<?php echo form_error('huruf_mutu_mata_kuliah') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
						</form>

					</div>

					<div class="card-footer small text-muted">
						* Wajib Diisi
					</div>


				</div>
				<!-- /.container-fluid -->

				<!-- Sticky Footer -->
				<?php $this->load->view("admin/_partials/footer.php") ?>

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->


		<?php $this->load->view("admin/_partials/scrolltop.php") ?>

		<?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>
