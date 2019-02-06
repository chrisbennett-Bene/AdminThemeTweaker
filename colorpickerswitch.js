window.addEventListener('load', 
    function() {

        var color = document.querySelectorAll('.colorpicker');
        color.forEach(function (color, index) {
            if (color.type == "text" && color.value) {
                color.type = "color";
            } 
        });
	
    window.addEventListener('contextmenu', function (event) {
        if (event.target.classList.contains('colorpicker')){
            if (event.target.type == "color" && event.target.value) {event.target.type = "text";
						} 
        }
		}, false);	
		
    var initColorpicker =  function (event) {
        if (event.target.classList.contains('colorpicker')){
            if (event.target.type == "text" && event.target.value && event.target.value.length == 7) {
                event.target.type = "color";
            } else if (event.target.type == "text" && event.target.value.length == 4){
            var hex = event.target.value;
						hex = "#" + hex.charAt(1) + hex.charAt(1) + hex.charAt(2) + hex.charAt(2) + hex.charAt(3) + hex.charAt(3);
						event.target.value = hex;
						}
         }
    };

    // Add our event listeners
    window.addEventListener('change', initColorpicker, false);
    window.addEventListener('mouseout', initColorpicker, false);
  
	}, false);