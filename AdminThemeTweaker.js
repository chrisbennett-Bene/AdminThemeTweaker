var get           = function (selector, scope) {
                    scope = scope ? scope : document; 
                    return scope.querySelector(selector);
                    };
var getById       = function (selector, scope) {
                    scope = scope ? scope : document; 
                    return scope.getElementById(selector);
                    };
var getAll        = function (selector, scope) {
                    scope = scope ? scope : document; 
                    return scope.querySelectorAll(selector);
                    };

window.addEventListener('load', 
    function() {

    var color = getAll('.colorpicker');
        color.forEach(function (color, index) {
            if (color.type == "text" && color.value) {
                color.type = "color";
				color.setAttribute('title', '#rrggbb or #rgb - Right-click to copy, paste or remove hex code');
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
	
    window.addEventListener('input', function (event) {

        var input = event.target;
		
        if (input.classList.contains('autoSaveOnChange')){
			
            input.closest('.Inputfield').classList.add('saveLoading');
		    
			var saveSubmit   = getById('submit_save') || getById('Inputfield_submit_save_module');

			saveSubmit.click();
        }		
    }, false);
	

    // Add event listeners for colorpicker
    window.addEventListener('change', initColorpicker, false);
    window.addEventListener('mouseout', initColorpicker, false);
  
	}, false);