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
						<a href="<?php echo site_url('admin/mahasiswas/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

						<form action="<?php base_url('admin/mahasiswas/add') ?>" method="post" enctype="multipart/form-data" >
							<div class="form-group">
								<label for="nomor_mahasiswa">Nomor Mahasiswa</label>
								<input class="form-control <?php echo form_error('nomor_mahasiswa') ? 'is-invalid':'' ?>"
								 type="text" name="nomor_mahasiswa" placeholder="Masukkan nomor mahasiswa" />
								<div class="invalid-feedback">
									<?php echo form_error('nomor_mahasiswa') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="nama">Nama</label>
								<input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
	 							 type="text" name="nama" placeholder="Masukkan nama" />
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="semester">Semester</label>
								<input class="form-control <?php echo form_error('semester') ? 'is-invalid':'' ?>"
								 type="number" name="semester" min="0" placeholder="Masukkan semester" />
								<div class="invalid-feedback">
									<?php echo form_error('semester') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="jurusan">Nama Jurusan</label>
								<input class="form-control <?php echo form_error('jurusan') ? 'is-invalid':'' ?>"
								 type="text" name="jurusan" placeholder="Masukkan jurusan" />
								<div class="invalid-feedback">
									<?php echo form_error('jurusan') ?>
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
