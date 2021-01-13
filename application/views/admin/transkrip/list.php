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

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('admin/transkrips/add') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nomor Mahasiswa</th>
										<th>Nama Mahasiswa</th>
										<th>Semester</th>
										<th>Kode Mata Kuliah</th>
										<th>Huruf Mutu Mata Kuliah</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($transkrip as $transkrip): ?>
									<tr>
										<td width="150">
											<?php echo $transkrip->nomor_mahasiswa ?>
										</td>
										<td>
											<?php echo $transkrip->nama_mahasiswa ?>
										</td>
										<td>
											<?php echo $transkrip->semester ?>
										</td>
										<td>
											<?php echo $transkrip->kode_mata_kuliah ?>
										</td>
										<td>
											<?php echo $transkrip->huruf_mutu_mata_kuliah ?>
										</td>
										<td>
											<a href="<?php echo site_url('admin/transkrips/print/'.$transkrip->id_transkrip) ?>"
											 class="btn btn-small"><i class="fas fa-print"></i> Cetak</a>
											<a href="<?php echo site_url('admin/transkrips/edit/'.$transkrip->id_transkrip) ?>"
											 class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
											<a onclick="deleteConfirm('<?php echo site_url('admin/transkrips/delete/'.$transkrip->id_transkrip) ?>')"
											 href="#!" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
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
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
	function deleteConfirm(url){
		$('#btn-delete').attr('href', url);
		$('#deleteModal').modal();
	}
	</script>
</body>

</html>
