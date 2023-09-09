<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('user/partials/head') ?>
</head>

<body class="goto-here">
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<?php $this->load->view('user/partials/navbar')?>
	</nav>
	<!-- END nav -->

	<div class="container">
		<div class="row">
			<div class="hero-wrap hero-bread"
				style="background-image: url('<?= base_url('assets/user/img/bg_5.jpg')?>">
				<div class="container">
					<div class="row no-gutters slider-text align-items-center justify-content-center">
						<div class="col-md-9 ftco-animate text-center">
							<h1 class="mb-0 bread">Agenda</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section ftco-degree-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 ftco-animate">
					<div class="row">
						<!-- <?php $no = 1;
                        foreach ($agenda as $d) : ?>
						<div class="col-md-12 d-flex ftco-animate">
							<div class="blog-entry align-self-stretch d-md-flex">
								<a href="blog-single.html" class="block-20"
									style="background-image: url('<?= base_url('upload/Agenda/' . $d->agenda_gambar)?>');">
								</a>
								<div class="text d-block pl-md-4">
									<div class="meta mb-3">
										<div><a href="#"><?= date('d-M-Y', strtotime($d->agenda_tanggal)) ?></a></div>
										<div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
									</div>
									<h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about
											the blind texts</a></h3>
									<p>Far far away, behind the word mountains, far from the countries Vokalia and
										Consonantia, there live the blind texts.</p>
									<p><a href="blog-single.html" class="btn btn-primary py-2 px-3">Read more</a></p>
								</div>
							</div>
						</div>
                        <?php endforeach ?> -->

						<?php
						if( ! empty($model['agenda'])){
							foreach($model['agenda'] as $data){ ?>
						<div class="col-md-12 d-flex ftco-animate">
							<div class="blog-entry align-self-stretch d-md-flex">
								<a href="blog-single.html" class="block-20"
									style="background-image: url('<?= base_url('upload/Agenda/' . $data->agenda_gambar)?>');">
								</a>
								<div class="text d-block pl-md-4">
									<div class="meta mb-3">
										<div><a href="#"><span
													class="icon-calendar"></span>&nbsp;<?= date('D, d-M-Y', strtotime($data->agenda_tanggal)) ?></a>
										</div>
										<!-- <div><a href="#">Admin</a></div> -->
										<!-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> -->
									</div>
									<h3 class="heading"><a href="#"><?= $data->agenda_nama ?></a></h3>
									<p><?= substr($data->agenda_deskripsi, 0, 150) . "..." ?></p>
									<p><a href="<?= site_url('User/detailAgenda/' . $data->agenda_id)?>"
											class="btn btn-primary py-2 px-3">Read more</a></p>
								</div>
							</div>
						</div>
						<?php }
						}else{ // Jika data tidak ada
							echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
						}
						?>



						<div class="row mt-5">
							<div class="col text-center" style="margin-left:34em">
								<div class="block-27">
									<?php
	                                // Tampilkan link-link paginationnya
	                                echo $model['aswd'];
	                                ?>
								</div>
							</div>
						</div>


					</div>
				</div> <!-- .col-md-8 -->
				<div class="col-lg-4 sidebar ftco-animate">
					<div class="sidebar-box">
						<form action="<?php echo site_url('user/search') ?>" method="post" class="search-form">
							<div class="form-group">
								<span class="icon ion-ios-search"></span>
								<input type="text" name="search" class="form-control" placeholder="Search...">
							</div>
						</form>
					</div>
					<!-- <div class="sidebar-box ftco-animate">
						<h3 class="heading">Categories</h3>
						<ul class="categories">
							<li><a href="#">Vegetables <span>(12)</span></a></li>
							<li><a href="#">Fruits <span>(22)</span></a></li>
							<li><a href="#">Juice <span>(37)</span></a></li>
							<li><a href="#">Dries <span>(42)</span></a></li>
						</ul>
					</div> -->

					<div class="sidebar-box ftco-animate">
						<h3 class="heading">Agenda Terjadwal</h3>
						<?php $no = 0;
							if (!empty($sch['agenda'])) foreach ($sch['agenda'] as $jdw) : $no++ ?>

								<div class="block-21 mb-4 d-flex">
									<a href="<?= site_url('User/detailAgenda/' . $jdw->agenda_id)?>" class="blog-img mr-4"
										style="background-image: url(<?= base_url('upload/Agenda/' . $jdw->agenda_gambar)?>);"></a>
									<div class="text">
										<h3 class="heading-1"><a href="<?= site_url('User/detailAgenda/' . $jdw->agenda_id)?>"><?= $jdw->agenda_nama ?></a></h3>
										<div class="meta">
											<div><a href="#"><span class="icon-calendar"></span><?= date('d-M-Y', strtotime($jdw->agenda_tanggal)) ?></a></div>
										</div>
									</div>
								</div>
						<?php endforeach ?>
					</div>
				</div>

			</div>
		</div>
	</section> <!-- .section -->

	<?php $this->load->view('user/partials/footer') ?>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div>


	<?php $this->load->view('user/partials/script') ?>

</body>

</html>
