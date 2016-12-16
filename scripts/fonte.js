$(document).ready(function() {

	// aumentando a fonte
	$(".inc-font").click(function () {
		var size = $(".hentry").css('font-size');

		size = size.replace('px', '');
		size = parseInt(size) + 1.4;

		$(".hentry").animate({'font-size' : size + 'px'});
	});

	//diminuindo a fonte
	$(".dec-font").click(function () {
		var size = $(".hentry").css('font-size');

		size = size.replace('px', '');
		size = parseInt(size) - 1.4;

		$(".hentry").animate({'font-size' : size + 'px'});
	});

	// resetando a fonte
	$(".res-font").click(function () {
		$(".hentry").animate({'font-size' : '12px'});
	});

});