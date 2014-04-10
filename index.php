<?php 
	include 'includes/header.php'; 
?>
	<div class="container">
		<h1>Swatch Internet Time</h1>
		<div class="beats">@<span id="swatchTime"></span> .beats</div>
	</div>

	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script>
		$(document).ready(function() {
			$('#navHome').addClass('active');
		});
	</script>
		
<?php 
	include 'includes/footer.php'; 
?>