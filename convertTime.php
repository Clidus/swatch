<?php 
	include 'includes/header.php'; 

	if(isset($_POST['date'])) 
	{
		// if post, use selected datetime
		$date = new DateTime($_POST['date'] . ' ' . $_POST['time'], new DateTimeZone($_POST['timezone']));
    } else {
		// else use current time in London
		$date = new DateTime();
		$date->setTimeZone(new DateTimeZone('Europe/London'));
    }

	// build array of time zones
	$timeZones = array(
 		"America/Los_Angeles" => "L.A.",
 		"America/Chicago" => "Chicago",
 		"America/New_York" => "New York",
 		"UTC" => "UTC",
 		"Europe/London" => "London",
 		"Europe/Amsterdam" => "Amsterdam",
 		"Asia/Tokyo" => "Tokyo",
 		"Australia/Sydney" => "Sydney");

?>

	<div class="container">
		<h1>Convert Time to Beats</h1>
		
		<form class="form-inline" role="form" method="post">
			<div class="form-group">
				<input type="date" class="form-control" id="date" name="date" value="<?php echo $date->format('Y-m-d') ?>">
			</div>
			<div class="form-group">
				<input type="time" class="form-control" id="time" name="time" value="<?php echo $date->format('H:i:s') ?>" step="1">
			</div>
			<div class="form-group">
				<select class="form-control" id="timezone" name="timezone">
					<?php 
						foreach($timeZones as $key => $value)
						{
							echo '<option value="' . $key . '">' . str_replace('_',' ',$value) . '</option>';
						}
					?>
				</select>
			</div>

			<button type="submit" class="btn btn-default">Convert</button>
		</form>

		<?php		
			// there are 86.4 seconds in a beat
			$secondsInABeat = 86.4;

			// convert date time to UTC 
			$date->setTimeZone(new DateTimeZone('UTC'));

			// get hours, minutes and seconds
			$hours = $date->format('H');
			$minutes = $date->format('i');
			$seconds = $date->format('s');

			// add hour to get time in Switzerland
			$hours = ($hours == 23) ? 0 : $hours + 1;

			// time in seconds
			$timeInSeconds = ((($hours * 60) + $minutes) * 60) + $seconds;

			// calculate beats to two decimal places
			$beats = round($timeInSeconds / $secondsInABeat, 0);
		?>

		<div class="timezones">
			<div class="row">
				<div class="col-xs-4"></div>
				<div class="col-xs-4"><b>Date</b></div>
				<div class="col-xs-4"><b>Time</b></div>
			</div>
			<div class="row">
				<div class="col-xs-4"><b>Swatch</b></div>
				<div class="col-xs-4"><?php echo $date->format('d-m-Y') ?></div>
				<div class="col-xs-4">@<?php echo $beats ?></div>
			</div>

			<?php
				// build grid of timezones
				foreach($timeZones as $key => $value)
				{
					$date->setTimeZone(new DateTimeZone($key));
					echo '
					<div class="row">
						<div class="col-xs-4"><b>' . $value . '</b></div>
						<div class="col-xs-4">' . $date->format('d-m-Y') . '</div>
						<div class="col-xs-4">' . $date->format('H:i:s') . '</div>
					</div>';
				}
			?>
		</div>
	</div>

	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#navConvertTime').addClass('active');
			<?php
				// set default value for time zone dropdown
				if(isset($_POST['timezone'])) 
				{
					echo "$('#timezone').val('" . $_POST['timezone'] . "');";
				} else {
					echo "$('#timezone').val('Europe/London');";
				}
			?>
		});
	</script>
		
<?php 
	include 'includes/footer.php'; 
?>