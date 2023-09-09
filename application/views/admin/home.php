<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('admin/partials/head')?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<?php $this->load->view('admin/partials/navbar')?>
		</nav>

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<?php $this->load->view('admin/partials/aside')?>
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Dashboard</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3>0</h3>

									<p>Visitors</p>
								</div>
								<div class="icon">
									<i class="ion ion-android-contacts"></i>
								</div>
								<a href="#" class="small-box-footer">Our Visitor </a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<?php if ($terlaksana == '') { ?>
									<h3>0</h3>
									<?php } else { ?>
									<h3><?= $terlaksana ?></h3>
									<?php } ?>

									<p>Agenda Terlaksana</p>
								</div>
								<div class="icon">
									<i class="ion ion-checkmark-circled"></i>
								</div>
								<a href="<?= site_url('admin/agenda') ?>" class="small-box-footer">More info <i
										class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<?php if ($terjadwal == '') { ?>
									<h3>0</h3>
									<?php } else { ?>
									<h3><?= $terjadwal ?></h3>
									<?php } ?>

									<p>Agenda Terjadwal</p>
								</div>
								<div class="icon">
									<i class="ion ion-clipboard"></i>
								</div>
								<a href="<?= site_url('admin/agenda') ?>" class="small-box-footer">More info <i
										class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<?php if ($gallery == '') { ?>
									<h3>0</h3>
									<?php } else { ?>
									<h3><?= $gallery ?></h3>
									<?php } ?>

									<p>Gallery Bakau Lestari</p>
								</div>
								<div class="icon">
									<i class="ion ion-images"></i>
								</div>
								<a href="<?= site_url('admin/gallery') ?>" class="small-box-footer">More info <i
										class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

					</div>
					<!-- /.row -->
					<!-- Main row -->
					<div class="row">
						<!-- Left col -->
						<section class="col-lg-7">
							<!-- Pesan Masuk -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">
										<i class="fa fa-envelope-square"></i>&nbsp;
										Pesan Masuk
									</h3>

									<div class="card-tools">
										<ul class="pagination pagination-sm">
											<li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
											<li class="page-item"><a href="#" class="page-link">1</a></li>
											<li class="page-item"><a href="#" class="page-link">2</a></li>
											<li class="page-item"><a href="#" class="page-link">3</a></li>
											<li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
										</ul>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<table class="table">
										<thead>
											<tr>
												<th style="width: 10px">#</th>
												<th style="width: 14%">Tanggal</th>
												<th>Nama</th>
												<th>Subject</th>
												<th>Order</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
                        					foreach ($order as $a) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= date('d-m-Y | H:i:s', strtotime($a->tanggal_masuk)) ?></td>
												<td><?= $a->customer_nama ?></td>
												<td><?= $a->customer_subject?></td>
												<td><?= substr($a->customer_order, 0, 80) . "..." ?></td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>

								</div>
								<!-- /.card-body -->
								<div class="card-footer clearfix">
									<button type="button" class="btn btn-primary float-right"> <a
											href="<?= site_url('admin/order') ?>" style="color:white">
											Load More
									</button></a>
								</div>
							</div>
							<!-- /.card -->


							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Order Masuk</h3>
									<div class="card-tools">
										<ul class="nav nav-pills ml-auto">
											<li class="nav-item">
												<a href="#">
													<button type="button" class="btn btn-warning btn-sm">
														<i class="fas fa-angle-double-right"></i> Load More
													</button>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<table class="table table-striped">
										<thead>
											<tr>
												<th style="width: 10px">#</th>
												<th style="width: 14%">Tanggal</th>
												<th>Nama</th>
												<th>Subject</th>
												<th>Order</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1;
                        					foreach ($order as $order) : ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= date('d-m-Y | H:i:s', strtotime($order->tanggal_masuk)) ?></td>
												<td><?= $order->customer_nama ?></td>
												<td><?= $order->customer_subject?></td>
												<td><?= substr($order->customer_order, 0, 80) . "..." ?></td>
											</tr>
											<?php endforeach ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->


						</section>
						<section class="col-lg-5">
							<!-- Calendar -->
							<div class="card bg-gradient-secondary">
								<div class="card-header border-0">
									<h3 class="card-title">
										<i class="far fa-calendar-alt"></i>&nbsp;
										Calendar
									</h3>
									<!-- tools card -->
									<div class="card-tools">
										<!-- button with a dropdown -->
										<!-- <div class="btn-group">
											<button type="button" class="btn btn-secondary btn-sm dropdown-toggle"
												data-toggle="dropdown" data-offset="-52">
												<i class="fas fa-bars"></i>
											</button>
											<!-- <div class="dropdown-menu" role="menu">
												<a href="#" class="dropdown-item">Add new event</a>
												<a href="#" class="dropdown-item">Clear events</a>
												<div class="dropdown-divider"></div>
												<a href="#" class="dropdown-item">View calendar</a>
											</div> -->
										<!-- </div> -->
										<button type="button" class="btn btn-secondary btn-sm"
											data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div>
									<!-- /. tools -->
								</div>
								<!-- /.card-header -->
								<div class="card-body pt-0">
									<!--The calendar -->
									<div id="calendar" style="width: 100%"></div>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<!-- PRODUCT LIST -->
							<div class="card">
								<div class="card-header">
									<h3 class="card-title">Recently Added Agenda</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse">
											<i class="fas fa-minus"></i>
										</button>
										<button type="button" class="btn btn-tool" data-card-widget="remove">
											<i class="fas fa-times"></i>
										</button>
									</div>
								</div>
								<!-- /.card-header -->
								<div class="card-body p-0">
									<ul class="products-list product-list-in-card pl-2 pr-2">
										<?php $no = 1;
										foreach ($agenda as $agenda) : ?>
										<li class="item">
											<div class="product-img">
												<img src="<?= base_url('upload/Agenda/') . $agenda->agenda_gambar ?>"
													alt="Product Image" class="img-size-50">
											</div>
											<div class="product-info">
												<a href="javascript:void(0)"
													class="product-title"><?= $agenda->agenda_nama ?>
													<?php if ($agenda->agenda_status == "sudah terlaksana"){ ?>
														<span class="badge badge-warning float-right">Terlaksana</span>
													<?php } else { ?>
														<span class="badge badge-success float-right">Terjadwal</span>
													<?php } ?>
												</a><br>
														<span class="direct-chat-timestamp" style="color:#6c757d"><?= date('D, d-m-Y', strtotime($agenda->agenda_tanggal)) ?> </span>
												<span class="product-description">
													<?= $agenda->agenda_deskripsi ?>
												</span>
												<!-- <span>HALLOOOO</span> -->
											</div>
										</li>
										<?php endforeach ?>
									</ul>
								</div>
								<!-- /.card-body -->
								<div class="card-footer text-center">
									<a href="<?= site_url('admin/agenda') ?>" class="uppercase">View All</a>
								</div>
								<!-- /.card-footer -->
							</div>
							<!-- /.card -->
						</section>
						<!-- /.Left col -->
					</div>
					<!-- /.row (main row) -->
				</div><!-- /.container-fluid -->
				<?php $this->load->view('admin/partials/logout')?>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
			All rights reserved.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 3.2.0
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<?php $this->load->view('admin/partials/script')?>
	<script>
		$('#calendar').datetimepicker({
			format: 'L',
			inline: true
		});

	</script>
</body>

</html>
