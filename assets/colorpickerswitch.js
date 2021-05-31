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

function docReady(fn) {
    // see if DOM is already available
    if (document.readyState === "complete" || document.readyState === "interactive") {
        // call on next available tick
        setTimeout(fn, 1);
    } else {
        document.addEventListener("DOMContentLoaded", fn);
    }
}    

function addStretchy() {

    var radios = getAll('input[type="radio"], input[type="checkbox"], select');
    radios.forEach(function (radio, index) {
							 					 
        if (radio.classList.contains('InputfieldMaxWidth')) {	
            radio.closest('.Inputfield').classList.add('tweakerStretchy');
        };
     });	
}

function rangeDisplay() {

    var ranges = getAll('input[type="range"]');
    ranges.forEach(function (range, index) {
							 					 
        if (range.classList.contains('displayInline')) {	
            range.closest('.Inputfield').classList.add('displayInline');
        };
     });	
}

function rangeProgress(range) {
		
		var rangeMin     = range.min;	
        var rangeMax     = range.max;
		var rangeValue   = range.value;
        var rangePercent = (rangeValue-rangeMin) / (rangeMax-rangeMin)*100;
		
		range.style.setProperty('--slider-progress', rangePercent +'%');
}

function setRange () {
	var ranges = getAll('input[type="range"].FieldtypeFloatRange');
	ranges.forEach(function (range, index) {
	
	rangeProgress(range);
							 
	});						 
	
}


function showHideInputfield_publicHolidays() {
	if ( !getById('Inputfield_publicHolidaysDisplayAllStates') ) return;
		
	var showAll = getById('Inputfield_publicHolidaysDisplayAllStates').checked;

	console.log("Display All: " + showAll);
    var hiddenItems = getAll('input[id*="Inputfield_publicHolidayRegionSpecific"]:checked');
	var targetState = get('.Inputfield_opening_stateSelect input[checked]').value;	
	console.log("TargetState: " + targetState);
    hiddenItems.forEach(function (hiddenItem, index) {	
	    var count = 0;		
		var stateSelector = hiddenItem.closest('.Inputfield').nextSibling;
		var itemStates    = getAll('input[checked]', stateSelector);
		
		itemStates.forEach(function (itemState, index) {
								
		    var stateName = itemState.value;
			console.log("Selected State: " + stateName);
		    if (stateName == targetState) {count++};

		});	
		
        if (count<1) {hiddenItem.closest('.InputfieldRepeaterItem').classList.add('InputfieldHidden');}	
		if (showAll) {hiddenItem.closest('.InputfieldRepeaterItem').classList.remove('InputfieldHidden');}	
		
    });	
}


docReady(function() {
    addStretchy();
    setRange();
	rangeDisplay();
	showHideInputfield_publicHolidays();
});

window.addEventListener('load', 
    function() {


    var color = getAll('.colorpicker');
        color.forEach(function (color, index) {
            if (color.type == "text" && color.value) {
                color.type = "color";
				color.setAttribute('title', 'Right click to paste hex code');
            } 
        });
	
 window.addEventListener('input', function (event) {
        if (event.target.classList.contains('FieldtypeFloatRange')){
			
			rangeProgress(event.target);

        }
		
		if (event.target.classList.contains('FieldtypeCheckbox')){ showHideInputfield_publicHolidays(); }
		//if (event.target.classList.contains('uk-radio'))         { showHideInputfield_publicHolidays(); }
		
		}, false);	
	
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

    // Add event listeners for colorpicker
    window.addEventListener('change', initColorpicker, false);
    window.addEventListener('mouseout', initColorpicker, false);
  
	}, false);