<style>
	.hide-button .like {
		color: #212121;
	}

	.hide-button .like.active {
		color: #e13364;
	}

	.detail a {
		color: #212121;
	}

	.like-stand i {
		font-size: 20px;
		color: #757575 !important;
	}

	.like-stand.active i {
		color: #e13364 !important;
	}
</style>

<div class="portfolio-user col-sm-12" style="margin-top: -3px; float: none;">
	<div class="core col-sm-9">
		<div class="wrapper">
			<img src="<?php echo base_url() . $this->classrooms_model->get_by_user_id($owner_id)[0]->avt; ?>" alt="">
			<!--
			<div class="detail">
				<?php
				if (isset($_SESSION['user']) && $this->like_stand_model->get_by_check($stand->id, $_SESSION['user'][0]->id) != null) {
					$check_like = 'active';
				} else {
					$check_like = '';
				} ?>
				<p onclick="like_stand(this,<?php echo $stand->id; ?>)"><a class="like-stand <?php echo $check_like; ?>" href="javascript:void(0)"><?php echo $stand->like_counter; ?> <i class="material-icons">favorite</i></a></p>
				<h3><?php echo $this->users_model->get_by_id($stand->id_user)[0]->user_name; ?></h3>
				<span style="margin-top: 10px;"><?php echo $stand->name; ?></span>
				<p class="pull-right"><a class="btn btn-default" href="<?php echo base_url() . 'gian-hang-ca-nhan/dang-san-pham'; ?>">Đăng sản phẩm</a></p>
			</div>
			-->
		</div>
		<div class="">
			<ul class="pull-right col-xs-12 col-md-4">

				<li class="col-xs-4"><a href="<?php echo base_url() ?>gian-hang-ca-nhan/gioi-thieu?id=<?php echo $stand->id_user ?>">Giới thiệu</a></li>
				<li class="col-xs-4"><a href="<?php echo base_url() ?>gian-hang-ca-nhan/lien-he?id=<?php echo $stand->id_user ?>">Liên hệ</a></li>
				<li class="col-xs-4"><a href="<?php echo base_url() ?>gian-hang-ca-nhan/bang-tin?id=<?php echo $stand->id_user ?>">Bảng tin</a></li>
			</ul>
		</div>
	</div>
</div>

<div id="content" class="store-page">
	<div class="container">
		<div class="core col-md-10">
			<?php
			$CI = &get_instance();
			if ($CI->session->flashdata('msg_ok')) {
				echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>' . $CI->session->flashdata('msg_ok') . '</div>';
			}
			if ($CI->session->flashdata('msg_failed')) {
				echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">×</button>' . $CI->session->flashdata('msg_failed') . '</div>';
			}
			?>
		</div>

		<div class="core col-md-10">
			<div class="row">

				<div class="right-sidebar col-sm-4 col-md-4 pull-right">
					<button class="find-btn">
						<i class="material-icons">apps</i>
					</button>
					<div class="wrapper">
						<p>Danh mục sản phẩm</p>
						<ul>
							<li><a href="javascript:void(0)" class="btn-categories" type-id="0">All</a></li>
							<?php $this->load->model('type_model');
							$mn_sidebar = $this->type_model->get_by_sidebar();
							//print_r($mn_sidebar);
							foreach ($mn_sidebar as $key) {
								if ($key->bottom_link == 1) { ?>
									<li><a href="javascript:void(0)" class="btn-categories" type-id="<?php echo $key->id ?>"><?php echo $key->name; ?></a></li>
							<?php }
							} ?>
						</ul>
					</div>
				</div>

				<div class="main-content col-sm-8 col-md-8">
					<div class="inner-content">

					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		first = 0;
		is_loading = true;
		type_id = '';

		function load_products(more) {
			$.ajax({
				method: 'GET',
				url: "<?php echo base_url() ?>default/products/load_stand_products",
				data: {
					first: first,
					id: <?php if (isset($_GET['id'])) {
							echo $_GET['id'];
						} else {
							echo '""';
						} ?>,
					type_id: type_id
				},
				beforeSend: function() {
					$('.loading').show();
				},
				success: function(data) {
					$('.loading').hide();
					if (data.trim() == '') {
						is_loading = false;
					} else {
						if (!more) {
							$('.inner-content').html(data);
						} else {
							$('.inner-content').append(data);
						}
					}
				}
			})
		}

		//0 is not sugget
		//1 is sugget
		load_products(false);


		$(window).scroll(function() {
			if ($(window).scrollTop() + window.innerHeight == $(document).height() && is_loading) {
				first += 10;
				load_products(true);
			}
		});

		$('.btn-categories').click(function() {
			first = 0;
			$('.inner-content').html('');
			type_id = $(this).attr('type-id');
			load_products(false);
		})
	});
</script>