<?php 
	include 'includes/header.php'; 
?>
	<div class="container">
		<h1>Changelog</h1>
		
		<div>
			<p><b>Version 1.2.0 - 2014-04-15</b></p>
			<ul>
				<li><b>Feature:</b> Live Unix/Epoch Time clock.</li>
			</ul>
			<p><b>Version 1.1.0 - 2014-04-15</b></p>
			<ul>
				<li><b>Feature:</b> Convert time to beats page.</li>
				<li><b>Feature:</b> Convert beats to time page.</li>
				<li><b>Change:</b> Made homepage clock larger.</li>
			</ul>
			<p><b>Version 1.0.0 - 2014-04-10</b></p>
			<ul>
				<li><b>Feature:</b> Live Swatch Internet Time clock.</li>
			</ul>
		</div>
	</div>

	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script>
		$(document).ready(function() {
			$('#navChangelog').addClass('active');
		});
	</script>
		
<?php 
	include 'includes/footer.php'; 
?>