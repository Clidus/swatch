// calculate the time of the future
function GetInternetTime() {
	// get date in UTC/GMT
  	var date = new Date();
    var hours = date.getUTCHours();
    var minutes = date.getUTCMinutes();
    var seconds = date.getUTCSeconds();

    // add hour to get time in Switzerland
    hours = (hours == 23) ? 0 : hours + 1;

    // time in seconds
    var timeInSeconds = (((hours * 60) + minutes) * 60) + seconds;

    // there are 86.4 seconds in a beat
    var secondsInABeat = 86.4;

    // calculate beats to two decimal places
	var beats = Math.abs(timeInSeconds / secondsInABeat).toFixed(2);

	// update page
	$('#swatchTime').html(beats);
}

$(function() {
	// display at page load
	GetInternetTime();

	// calculate every second
	setInterval(GetInternetTime, 1000);
});