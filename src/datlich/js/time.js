$(function()
{
	var timertext = $("[timer]");
	setInterval(function()
	{
		$.post("kiemtra.php", {type : "timerupdate"}, function(data){
			timertext.html("Thời gian: "+ data +" seconds.")
		});
	}, 1000);
});