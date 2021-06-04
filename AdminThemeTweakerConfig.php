<?php namespace ProcessWire;

class AdminThemeTweakerConfig extends ModuleConfig {

  public function getDefaults() {

	return array(
		'showThemeTweaker' => true,
		'toggleCheckbox' => '',
		'styleScrollbar' => true,
		'spacesave_heading' => true,
		'spacesave_tabs' => true,
		'body_bckgnd_color' => '#555555',
		'content_bckgnd_color' => '#333333',
		'show_shadows' => true,
		'show_zebra' => true,
		'content_radius' => .5,
		'input_radius' => .33,
		'button_radius' => .5,
		'button_bckgndcolor'  => '#228B22',
		'buttonhover_bckgndcolor'  => '#176117',
		'buttonactive_bckgndcolor'  => '#64ad64', 
		'masthead_height' => 50,
		'inputfield_padding' => .75,
		'input_margin' => .5,
		'pagelist_item_showbckgnd' => true,
		'pagelist_item_showborder' => true,
		'pagelist_fontsize' => 1.25,
		'pagelistsub_fontsize' => 1		
    );
  }

public function getInputfields() {
// get inputfields
$inputfields = parent::getInputfields();

// fieldset InfoWrapper
$wrapper = new InputfieldWrapper();
$wrapper->label = __('What is Admin Theme Tweaker and how do I use it?');
$wrapper->collapsed = Inputfield::collapsedYes;
$wrapper->icon('info-circle');

// field show info what
	$field = $this->modules->get('InputfieldMarkup');
	$field->name = 'whatis';
	$field->label = __('What is Admin Theme Tweaker?');
    $field->collapsed = Inputfield::collapsedNever;
	$field->icon('info');
	$field->value = '
<h2>Change your admin theme style quickly</h2>
<h3>Smart defaults and auto-generated contrast to get you up and running, with extensive fine-tuning options if required</h3>
<p>Admin Theme Tweaker will quickly alter your default Uikit admin styling from the moment it is installed, with a default configuration designed to illustrate features and give you a head start on configuring your custom admin.</p>
<p>Everything is geared towards automatically generating sufficient contrast based on backgrounds you choose. Set two colors and you are away.</p>
<h3>How is it different from the other awesome themes and stylers that are available?</h3>
<p>It is different from the many other quality theme stylers and styles available, because it does not touch your templates or the default Uikit CSS.</p>
<p>You can upgrade the entire core as often as you like and Admin Theme Tweaker will keep on doing what it does.</p>
<p>It is an addition to -  not a replacment for -  the default styles, using the Cascading part of CSS with a php "engine" drawing variables and outputting the CSS.</p>
<p>That said, it does quite a bit more, allowing a degree of flexibility and customisation that is - to be honest - a little over the top.</p> 
<p>You can click it on and off. You can change a heap of things and get your hands dirty or just change a couple of values.</p>
<p>If you want to change the margin around inputs, you can and the automatic floating of the inputfields will work better than the default, offering accuracy down to 5% for column widths and including all common "thirds" options.</p>
<p>You do not need to touch a compiler, or CSS, or look at a LESS file, or scratch your head wondering where to find and how to overwrite the default CSS selectors.</p>
<p>Understandably this becomes more difficult as the background moves towards the neutral colors midway between black and white, so extensive fine-tuning options are provided.</p>		
';
    $field->columnWidth = 50;

$wrapper->add($field);

	// field show info what
	$field = $this->modules->get('InputfieldMarkup');
	$field->name = 'use';
	$field->label = __('How do I use it?');
    $field->collapsed = Inputfield::collapsedNever;
	$field->icon('info');
	$field->value = '
		<h2>Using Admin Theme Tweaker</h2>
		<ol>
		<li>Install it. Styling will change with preset values to get you started</li>
		<li>Set two background colors if you like</li>
		<li>Fine-tune your custom styles</li>
		</ol>
		<p>Text colors, borders, tints, input backgrounds and all manner of things will automatically change.</p>
		<h2>Smart switching colorpicker for easy color changes</h2>
		<h3>Smart swatches and colorpicker for flexible color choice</h3>
		<p><kbd>Right-Click</kbd> on any colorpicker swatch to bring up hex value input instead, so you can easily add exact values or remove values altogether to go back to default values.</p>
		<p>This is important as type="color" inputs require a value and will default to black if none is given. It\'s just the way they work. For example, instead of the desired result of no color, an empty value for a type="color" input results in this: <input type="color" class="colorpicker"></p>
		<p>By using a little javascript we switch to type="color" only when the field has a value and allow it to switch back to type="text" on contextmenu.</p>
		<p>This allows us to enjoy the the best of both worlds: pretty color swatches and a colorpicker if we want them and the ability to input hex codes - including shothand which we will automatically expand for colorpicker - or remove values altogether. Without a smart switch for colorpicker, direct input of hexcodes, shorthand hex codes and the valuable option of "no value" are not possible.</p>
		<p>In addition, switching to hex codes via <kbd>Right-Click</kbd> / contextmenu allows you to simply press <kbd>Enter</kbd> to save and update your changes. We like simple!</p>
		<h3>Fine-tune your styling, if desired.</h3>
		<p>You can click it on and off. You can change a heap of things and get your hands dirty or just change a couple of values.</p>
		<p>If you want to change the margin around inputs, you can and the automatic floating of the inputfields will work better than the default, offering accuracy down to 5% for column widths and including all common "thirds" options.</p>
		<p>You do not need to touch a compiler, or CSS, or look at a LESS file, or scratch your head wondering where to find and how to overwrite the default CSS selectors.</p>
	';
	$field->columnWidth = 50;

$wrapper->add($field);
$inputfields->add($wrapper);

	// field show Theme Tweaker Styling
	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'showThemeTweaker';
	$field->label = __('Show Uikit Theme Tweaker styling');
	$field->columnWidth = 30;
    $field->attr('class', 'autoSaveOnChange');
	
    $inputfields->add($field);
	
// fieldset quick colors
$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Quick Colors');
$fieldset->showIf = 'showThemeTweaker=1';
$fieldset->class = 'pickers';
$fieldset->description = 'Use Hex codes such as #555555 or #555';
$fieldset->icon('paint-brush');
		
	// field body background color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'body_bckgnd_color';
	$field->label = __('Body Background Color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->columnWidth = 50;
	$field->icon('cogs');
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field content background color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'content_bckgnd_color';
	$field->label = __('Content Background Color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->columnWidth = 50;
	$field->icon('cogs');
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
$inputfields->add($fieldset);

// fieldset General Settings Wrapper
$wrapper = new InputfieldWrapper();
$wrapper->label = __('General Settings');
//$wrapper->collapsed = Inputfield::collapsedYes;
$wrapper->icon('cogs');


	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'toggleCheckbox';
	$field->label = __('Use toggles for checkboxes');
	$field->columnWidth = 30;
    $field->attr('class', 'autoSaveOnChange');
	
    $wrapper->add($field);
	
	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'styleScrollbar';
	$field->label = __('Style scrollbar');
	$field->columnWidth = 30;
    $field->attr('class', 'autoSaveOnChange');
	
    $wrapper->add($field);

$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Space Saving Page Titles and Tabs');
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->columnWidth = 50;
$fieldset->icon('compress');
		
	// field Space-saving Heading
	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'spacesave_heading';
	$field->label = __('Space-saving Page Title');
    $field->attr('class', 'autoSaveOnChange');
	$fieldset->add($field);
		
	// field Space-saving Tabs
	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'spacesave_tabs';
	$field->label = __('Space-saving Tabs');
    $field->attr('class', 'autoSaveOnChange');
	$fieldset->add($field);
		
$wrapper->add($fieldset);

$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Subtle Shadows and Table striping');
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->columnWidth = 50;
$fieldset->icon('clone');

	// field Shadows
	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'show_shadows';
	$field->label = __('Show subtle Shadows');
    $field->attr('class', 'autoSaveOnChange');
	$fieldset->add($field);
		
	// field Table striping
	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'show_zebra';
	$field->label = __('Show subtle table striping');
    $field->attr('class', 'autoSaveOnChange');
	$fieldset->add($field);

$wrapper->add($fieldset);

$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Add some curves');
$fieldset->class = 'pickers';
$fieldset->description = 'Set radius in em/rem';
$fieldset->showIf = 'showThemeTweaker=1';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->columnWidth = 50;
$fieldset->icon('circle-o-notch');

	// field General Radius
	$field = $this->modules->get('InputfieldFloat');
	$field->name = 'content_radius';
	$field->label = __('Content');
	$field->size = 2;
	$field->columnWidth = 33;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);

	$field = $this->modules->get('InputfieldFloat');
	$field->name = 'input_radius';
	$field->label = __('Inputs');
	$field->size = 2;
	$field->columnWidth = 33;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	$field = $this->modules->get('InputfieldFloat');
	$field->name = 'button_radius';
	$field->label = __('Buttons');
	$field->size = 2;
	$field->columnWidth = 33;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);

$wrapper->add($fieldset);

$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Spacing between inputs');
$fieldset->description = 'Set spacing between inputs in em/rem';
$fieldset->class = 'pickers';
$fieldset->showIf = 'showThemeTweaker=1';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->columnWidth = 50;
$fieldset->icon('expand');

	// field input margin
	$field = $this->modules->get('InputfieldFloat');
	$field->name = 'input_margin';
	$field->label = __('Inputfield margins');
	$field->columnWidth = 50;
	$field->size = 2;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field inputfield padding
	$field = $this->modules->get('InputfieldFloat');
	$field->name = 'inputfield_padding';
	$field->label = __('Inputfield padding');
	$field->columnWidth = 50;
	$field->size = 2;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);

$wrapper->add($fieldset);
$inputfields->add($wrapper);


// fieldset Fine-tuning Wrapper
$wrapper = new InputfieldWrapper();
$wrapper->label = __('Fine-tuning');
//$wrapper->collapsed = Inputfield::collapsedYes;
$wrapper->icon('pencil');

$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Masthead settings');
$fieldset->class = 'pickers';
$fieldset->description = 'Over-ride automatic tint of masthead background and set height, if required';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->columnWidth = 50;
$fieldset->icon('paint-brush');

	// field Masthead Bckgnd Color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'masthead_bckgnd_color';
	$field->label = __('Background');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->columnWidth = 70;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field Masthead Height
	$field = $this->modules->get('InputfieldFloat');
	$field->name = 'masthead_height';
	$field->label = __('Height');
	$field->class = 'auto';
	$field->maxlength = 2;
	$field->size = 2;
	$field->columnWidth = 30;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);

$wrapper->add($fieldset);

$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Footer colors');
$fieldset->class = 'pickers';
$fieldset->description = 'Over-ride automatic tint of footer background, if required';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->columnWidth = 50;
$fieldset->icon('paint-brush');

	// field Footer Bckgnd Color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'footer_bckgnd_color';
	$field->label = __('Footer Background');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field Footer txt Color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'footer_color';
	$field->label = __('Footer Text');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);

$wrapper->add($fieldset);
	
// fieldset button color
$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Button Colors');
$fieldset->description = 'Set background color for Button states';
$fieldset->class = 'pickers';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->icon('paint-brush');
$fieldset->columnWidth = 50;
		
	// field button background color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'button_bckgndcolor';
	$field->label = __('Button Background');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field button:hover background color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'buttonhover_bckgndcolor';
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->label = __('Button Hover');
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field button:active background color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'buttonactive_bckgndcolor';
	$field->label = __('Button Active');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);

$wrapper->add($fieldset);

// fieldset link color
$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Link Colors');
$fieldset->class = 'pickers';
$fieldset->description = 'Set text color of Link states in hex code';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->icon('paint-brush');
$fieldset->columnWidth = 50;
		
	// field link color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'link_color';
	$field->label = __('Link Color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field link:hover color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'linkhover_color';
	$field->label = __('Link Hover');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
	
$wrapper->add($fieldset);

// fieldset headings color
$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Heading Colors');
$fieldset->class = 'pickers';
$fieldset->description = 'Set Heading colors in hex code.';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->icon('paint-brush');
$fieldset->columnWidth = 50;
		
	// field Current Page color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'currentpage_color';
	$field->label = __('Current Page Color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field Heading color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'heading_color';
	$field->label = __('Heading Color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
	
$wrapper->add($fieldset);

// fieldset label color
$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Label Colors');
$fieldset->class = 'pickers';
$fieldset->description = 'Set Label color in hex code';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->icon('paint-brush');
$fieldset->columnWidth = 50;
		
	// field Label color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'label_color';
	$field->label = __('Label Color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field Label(collapsed) color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'labelcollapsed_color';
	$field->label = __('Collapsed Label');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
	
$wrapper->add($fieldset);

// fieldset input Styling
$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Input styling');
$fieldset->class = 'pickers';
$fieldset->description = 'Colors for inputs and selects.';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->icon('paint-brush');
$fieldset->columnWidth = 100;
			
	// field input bordercolor
	$field = $this->modules->get('InputfieldText');
	$field->name = 'input_bordercolor';
	$field->label = __('Input border color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->columnWidth = 25;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field input bckgnd color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'input_bckgndcolor';
	$field->label = __('Input Background color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->columnWidth = 25;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field input color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'input_color';
	$field->label = __('Input text color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->columnWidth = 25;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field input bordercolor:focus
	$field = $this->modules->get('InputfieldText');
	$field->name = 'input_bordercolor_focus';
	$field->label = __('Input border focus color ');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->columnWidth = 25;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// field input bckgndcolor:focus
	$field = $this->modules->get('InputfieldText');
	$field->name = 'input_bckgndcolor_focus';
	$field->label = __('Input Background focus color');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->columnWidth = 25;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);

$wrapper->add($fieldset);
$inputfields->add($wrapper);

// fieldset Page List Wrapper
$wrapper = new InputfieldWrapper();
$wrapper->label = __('Page List options');
//$wrapper->collapsed = Inputfield::collapsedYes;
$wrapper->icon('cogs');

	// field show Page List Item Backgrounds
	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'pagelist_item_showbckgnd';
	$field->label = __('Show backgrounds for Page List Items');
    $field->attr('class', 'autoSaveOnChange');
	$field->columnWidth = 50;

$wrapper->add($field);

	// field show Page List Item Borders
	$field = $this->modules->get('InputfieldCheckbox');
	$field->name = 'pagelist_item_showborder';
	$field->label = __('Show borders for Page List Items');
    $field->attr('class', 'autoSaveOnChange');
	$field->columnWidth = 50;

$wrapper->add($field);

$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Main pages font size');
$fieldset->class = 'pickers';
$fieldset->description = 'Set font sizes in rem';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->columnWidth = 50;
$fieldset->icon('cogs');

	// Page List Item font size
	$field = $this->modules->get('InputfieldFloat');
	$field->name = 'pagelist_fontsize';
	$field->label = __('Main pages font size');
	$field->size = 2;
	$field->columnWidth = 50;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	$field = $this->modules->get('InputfieldFloat');
	$field->name = 'pagelistsub_fontsize';
	$field->label = __('Sub pages font size');
	$field->size = 2;
	$field->columnWidth = 50;
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);

$wrapper->add($fieldset);

$fieldset = $this->modules->get('InputfieldFieldset');
$fieldset->label = __('Page List colors');
$fieldset->class = 'pickers';
$fieldset->collapsed = Inputfield::collapsedNever;
$fieldset->columnWidth = 50;
$fieldset->icon('paint-brush');

	// Page List background color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'pagelist_item_bckgnd';
	$field->label = __('Page List background');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->icon('cogs');
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// Page List Hover background color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'pagelist_item_bckgndhover';
	$field->label = __('Page List Hover');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->icon('cogs');
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
	// Page List Hover background color
	$field = $this->modules->get('InputfieldText');
	$field->name = 'pagelist_open_bckgnd';
	$field->label = __('Open sub menu background');
	$field->placeholder = '#rrggbb or #rgb - Right-click to copy, paste or remove hex code';
	$field->class = 'colorpicker';
	$field->maxlength = 7;
	$field->minlength = 7;
	$field->icon('cogs');
	$field->collapsed = Inputfield::collapsedNever;
	$fieldset->add($field);
		
$wrapper->add($fieldset);
$inputfields->add($wrapper);

    return $inputfields;
  }

}

?>