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

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('admin/transkrips/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url(" admin/transkrips/edit") ?>" method="post"
							enctype="multipart/form-data" >

							<!--<input type="hidden" name="id" value="<?php echo $product->product_id?>" />-->

							<div class="form-group">
								<label for="nomor_mahasiswa">Nomor Mahasiswa</label>
								<input class="form-control <?php echo form_error('nomor_mahasiswa') ? 'is-invalid':'' ?>"
								 type="text" name="nomor_mahasiswa" placeholder="Masukkan nomor mahasiswa" value="<?php echo $transkrip->nomor_mahasiswa ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nomor_mahasiswa') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="nama_mahasiswa">Nama Mahasiswa</label>
								<input class="form-control <?php echo form_error('nama_mahasiswa') ? 'is-invalid':'' ?>"
								 type="text" name="nama_mahasiswa" placeholder="Masukkan nama mahasiswa" value="<?php echo $transkrip->nama_mahasiswa ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('nama_mahasiswa') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="semester">Semester</label>
								<input class="form-control <?php echo form_error('semester') ? 'is-invalid':'' ?>"
								 type="number" name="semester" min="0" placeholder="Masukkan Semester" value="<?php echo $transkrip->semester ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('semester') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="kode_mata_kuliah">Kode Mata Kuliah</label>
								<input class="form-control <?php echo form_error('kode_mata_kuliah') ? 'is-invalid':'' ?>"
								 type="text" name="kode_mata_kuliah" min="0" placeholder="Masukkan kode mata kuliah" value="<?php echo $transkrip->kode_mata_kuliah ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('kode_mata_kuliah') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="huruf_mutu_mata_kuliah">Huruf Mutu Mata Kuliah</label>
								<input class="form-control <?php echo form_error('huruf_mutu_mata_kuliah') ? 'is-invalid':'' ?>"
								 type="text" name="huruf_mutu_mata_kuliah" min="0" placeholder="Masukkan huruf mutu mata kuliah" value="<?php echo $transkrip->huruf_mutu_mata_kuliah ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('huruf_mutu_mata_kuliah') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
						</form>

					</div>

					<!--<div class="card-footer small text-muted">
						* Wajib Diisi
					</div>-->


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
