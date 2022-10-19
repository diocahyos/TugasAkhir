<script src="<?php echo base_url() ?>includes/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="<?php echo base_url() ?>includes/dist/js/pages/chartist/chartist-plugin-tooltip.js"></script>
<script>
	$(function() {
		"use strict";

		//Simple line chart 
		new Chartist.Line('.ct-area-ln-chart', {
			labels: [
				<?php
				for ($i = 1; $i <= 12; $i += 1) {
					echo $i * 10 . ",";
				}
				?>
			],
			series: [
				[
					<?php
					for ($i = 1; $i <= 12; $i += 1) {
						echo $data[3][$i] . ",";
					}
					?>
				]
			]
		}, {
			low: 10,

			plugins: [
				Chartist.plugins.tooltip()
			],
			showArea: true
		});


	})
</script>