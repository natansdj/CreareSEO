document.observe("dom:loaded", function() {

	if($('status')[$('status').selectedIndex].value == 1){
		$('vtiseo_discontinued').up(1).hide();
		$('vtiseo_discontinued_product').up(1).hide();
	} else {
		$('vtiseo_discontinued').up(1).show();
		$('vtiseo_discontinued_product').up(1).show();
	}

	$('status').observe("change", function(e){
		if($('status')[$('status').selectedIndex].value == 1){
			$('vtiseo_discontinued').up(1).hide();
			$('vtiseo_discontinued').selectedIndex = 0;
			$('vtiseo_discontinued_product').up(1).hide();
		} else {
			$('vtiseo_discontinued').up(1).show();
			$('vtiseo_discontinued').selectedIndex = 1;
			$('vtiseo_discontinued_product').up(1).show();
		}
	});

	var current = $('vtiseo_discontinued')[$('vtiseo_discontinued').selectedIndex].text;

	if(current != "301 Redirect to Product"){
		$('vtiseo_discontinued_product').up(1).hide();
	}

	$('vtiseo_discontinued').observe("change", function(e){
		if($('vtiseo_discontinued')[$('vtiseo_discontinued').selectedIndex].text == "301 Redirect to Product SKU"){
			$('vtiseo_discontinued_product').up(1).show();
		} else {
			$('vtiseo_discontinued_product').up(1).hide();
		}
	});
});