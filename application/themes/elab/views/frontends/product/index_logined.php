<div class="inner-content">
</div>

<script type="text/javascript">
	$(document).ready(function() {
		is_loading: true;

		function load_data_news(more) {
			$.ajax({
				method: 'GET',
				url: "<?php echo base_url() ?>index.php/elab/users/load_news?types_id=000",
				success: function(data) {
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
			});
		}
		load_data_news(false);
	});
</script>