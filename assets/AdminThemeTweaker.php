<?php namespace ProcessWire;
include("../index.php"); 
header("Content-type: text/css; charset: UTF-8"); ?>
<?php
$tweaker =  wire('modules')->AdminThemeTweaker;
if ($tweaker->showThemeTweaker != 1) {return;}

function hexRGBA($hexcolor, $opacity = false) {
		$default = '#FFFFFF';  
    if ($hexcolor[0] == '#' ) $hexcolor = substr( $hexcolor, 1 );
    if ( strlen( $hexcolor ) == 6 ) {
        $hex = array( $hexcolor[0] . $hexcolor[1], $hexcolor[2] . $hexcolor[3], $hexcolor[4] . $hexcolor[5] );
    } elseif ( strlen( $hexcolor ) == 3 ) {
        $hex = array( $hexcolor[0] . $hexcolor[0], $hexcolor[1] . $hexcolor[1], $hexcolor[2] . $hexcolor[2] );
    } else {
        return $default;
    }
    $rgb =  array_map('hexdec', $hex);
    if($opacity){
        if(abs($opacity) > 1)	$opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }
    return $output;
}

function getContrast($hexcolor, $type = false){
    if ( strlen( $hexcolor ) == 0 ) {
        $hexcolor = 'FFFFFF';	 
    } elseif ($hexcolor[0] == '#' ) {
        $hexcolor = substr( $hexcolor, 1 );
    }
    if ( strlen( $hexcolor ) == 6 ) {
        list( $r, $g, $b ) = array( $hexcolor[0] . $hexcolor[1], $hexcolor[2] . $hexcolor[3], $hexcolor[4] . $hexcolor[5] );
    } elseif ( strlen( $hexcolor ) == 3 ) {
        list( $r, $g, $b ) = array( $hexcolor[0] . $hexcolor[0], $hexcolor[1] . $hexcolor[1], $hexcolor[2] . $hexcolor[2] );
    } else {
        return false;
    }
    if ($type == 'link') {
        $light_bckgnd = '#009cd6';
        $dark_bckgnd = '#15BFFF';
    } else if ($type == 'heading') {
        $light_bckgnd = '#50739b';
        $dark_bckgnd = '#FFFFFF';
		} else if ($type == 'tab') {
        $light_bckgnd = '#000000';
        $dark_bckgnd = '#FFFFFF';
		} else if ($type == 'tabborder') {
        $light_bckgnd = '#dedede';
        $dark_bckgnd = '#757575';
    } else {
        $light_bckgnd = '#354b60';
        $dark_bckgnd = '#F3F3F3';
    }
    $r = hexdec( $r );
    $g = hexdec( $g );
    $b = hexdec( $b );
    $yiq = (($r*299)+($g*587)+($b*114))/1000;
    return ($yiq >= 155) ? $light_bckgnd : $dark_bckgnd;
}

$font_family = ''; 	// Sets font-family. Defaults to "-apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", Arial, sans-serif;" if none provided.
$body_bckgndcolor = $tweaker->body_bckgnd_color; 
$content_bckgndcolor = $tweaker->content_bckgnd_color; 
$auto_color = getContrast($content_bckgndcolor);
$content_radius = $tweaker->content_radius; 
$input_radius = $tweaker->input_radius;									
$button_radius = $tweaker->button_radius;									
$spacesave_tab = $tweaker->spacesave_tabs; 					// Reduces size and padding of tab items
$spacesave_heading = $tweaker->spacesave_heading; 	// Tucks page heading to right of breadcrumbs and alters margin to suit
$shadows = $tweaker->show_shadows;													// Subtle shadows
$table_zebra = $tweaker->show_zebra;											// Subtle "zebra" striping on table rows
$label_color = $tweaker->label_color;
$label_collapsed = $tweaker->labelcollapsed_color;
$heading_color = $tweaker->heading_color;
$currentpage_color = $tweaker->currentpage_color; 								// Sets color of current page text, Auto if not set.
$link_color = $tweaker->link_color ? $tweaker->link_color : ''; 											// Over-ride link color.
$linkhover_color = $tweaker->linkhover_color ? $tweaker->linkhover_color : ''; 									// Over-ride link hover color.
$masthead_minheight = $tweaker->masthead_height; 						// Height of masthead in px. Defaults to 50. Readable (barely!) down to 14 where font-size is a tiny 9px. >73 will trigger mobile view.
$masthead_bckgndcolor = $tweaker->masthead_bckgnd_color;	 	// Overrides masthead background tint, if required. Default is "rgba(0,0,0,.45)".

$footer_bckgndcolor = $tweaker->footer_bckgnd_color;						// Overrides footer background tint, if required
		if ($tweaker->footer_color) {												
$footer_color = $tweaker->footer_color;														// Explicitly set footer text color
		} elseif ($tweaker->footer_bckgnd_color) {
$footer_color = getContrast($tweaker->footer_bckgnd_color, tab);  // Auto color based on explicitly set footer background color
		} else {
$footer_color = "#FFFFFF";																				// Default color based on automatic tint of footer
		}

$button_bckgndcolor = $tweaker->button_bckgndcolor ? $tweaker->button_bckgndcolor : '#228B22'; 
$button_bckgndcolor_hover = $tweaker->buttonhover_bckgndcolor ? $tweaker->buttonhover_bckgndcolor : '#176117';
$button_bckgndcolor_active = $tweaker->buttonactive_bckgndcolor ? $tweaker->buttonactive_bckgndcolor : '#64ad64';
$admin_input_margin = $tweaker->input_margin ? $tweaker->input_margin : '0';
$inputfield_padding = $tweaker->inputfield_padding;
$input_bordercolor = $tweaker->input_bordercolor ? $tweaker->input_bordercolor : hexRGBA($auto_color, 0.3 );  // Sets border color of inputs. Defaults to auto if not set.
$input_bckgndcolor = $tweaker->input_bckgndcolor ? $tweaker->input_bckgndcolor : hexRGBA($auto_color, 0.06); 
$input_color = $tweaker->input_color ? $tweaker->input_color : hexRGBA($auto_color, 0.9 ); 

$input_bordercolor_focus = $tweaker->input_bordercolor_focus ? $tweaker->input_bordercolor_focus : hexRGBA($auto_color, 0.4 ); 	// Sets border color of focused inputs. Defaults to auto.
$input_bckgndcolor_focus = $tweaker->input_bckgndcolor_focus ? $tweaker->input_bckgndcolor_focus : hexRGBA($auto_color, 0.03 ); // Sets bckgnd color of inputs that are focused. Defaults to auto.

$pagelist_fontsize = $tweaker->pagelist_fontsize;
$pagelistsub_fontsize = $tweaker->pagelistsub_fontsize;
$pagelist_item_showbckgnd = $tweaker->pagelist_item_showbckgnd;
$pagelist_item_showborder = $tweaker->pagelist_item_showborder;
$pagelist_item_bckgnd = $tweaker->pagelist_item_bckgnd;
$pagelist_item_bckgndhover = $tweaker->pagelist_item_bckgndhover;
$pagelist_open_bckgnd = $tweaker->pagelist_open_bckgnd;

$pagelist_item_bordercolor = '';
$pagelist_open_bordercolor = '';


$separator_color = ''; 

?>
html {height:100vh;font-size:1em;line-height:1.5;<?php echo $auto_color ? 'color:' . $auto_color . ';' :''; ?>}
html,body {margin:0;padding:0;<?php echo $body_bckgndcolor ? 'background:' . $body_bckgndcolor . ';' :''; ?>}
body {height:100%;display:flex;flex-direction:column;overflow-y:scroll;}
body.modal{overflow:auto;}
main.pw-container, footer .pw-container, #pw-masthead .pw-container, .NotificationList .pw-container {flex:1;width:100%;box-sizing:border-box;max-width:1680px;}

#pw-content-body .WireTabs a.pw-active,
.Inputfield, .InputfieldHeader, li:not(.InputfieldSubmit):not(.InputfieldButton) .InputfieldContent, .InputfieldFieldset>.InputfieldContent>.Inputfields .Inputfield
 {
<?php echo $auto_color ? 'color:' . $auto_color . ';' :'color:#000;'; ?>
<?php echo $content_bckgndcolor ? 'background:' . $content_bckgndcolor . '!important;' :'background:#FFF;'; //!important to over-ride occasional random inline styles ?>
}


.WireTabs a {<?php echo $shadows ? 'box-shadow: 0 0 0.75rem rgba(0,0,0,.1);' :''; ?>}

.WireTabs + ul, .WireTabs ~ form,
.ProcessModule.hasUrlSegments #pw-content-body,
.ProcessPageEdit.hasUrlSegments #pw-content-body,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body,
.ProcessList #pw-content-body, 
.ProcessWireUpgrade #pw-content-body, .ProcessField:not(.hasUrlSegments) #pw-content-body, .ProcessLogger #pw-content-body, .ProcessProfile #pw-content-body, .ProcessPageAdd #pw-content-body,
.ProcessPermission:not(.hasUrlSegments) #pw-content-body, .ProcessRole:not(.hasUrlSegments) #pw-content-body,
div.ProcessPageLister,
#ProcessLoginForm
 {
<?php echo $auto_color ? 'color:' . $auto_color . ';' :'color:#000;'; ?>
<?php echo $content_bckgndcolor ? 'background:' . $content_bckgndcolor . '!important;' :'background:#FFF;'; // !important to over-ride occasional random inline styles ?>
<?php echo $shadows ? 'box-shadow: 0 0 0.75rem rgba(0,0,0,.1);' :''; ?>
<?php echo $inputfield_padding ? 'padding:' . ($inputfield_padding - $admin_input_margin >0 ? $inputfield_padding - $admin_input_margin : "0") . 'rem ' . $inputfield_padding . 'rem '  . $inputfield_padding . 'rem ' . $inputfield_padding . 'rem;' :''; ?>
	border: 1px solid <?php echo getContrast($body_bckgndcolor,'tabborder') ; ?>;
	border-radius:<?php echo $content_radius ? $content_radius . 'rem' :'0'; ?>;
	margin-bottom:1em;
overflow: hidden;
}

.ProcessList #pw-content-body,
.ProcessLogger #pw-content-body,
.ProcessProfile #pw-content-body,
.ProcessPageEdit.hasUrlSegments #pw-content-body,
.ProcessPageAdd #pw-content-body,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body {
	<?php echo $inputfield_padding ? 'padding:' . $inputfield_padding . 'rem;' :''; ?>
}
#pw-content-body #ProcessProfile ul li:first-child {margin-top:0;}
#pw-content-body #ProcessProfile ul li.InputfieldWrapper {border:0;}

.WireTabs + ul {
	<?php echo $inputfield_padding ? 'padding:' . ($inputfield_padding - $admin_input_margin) . 'rem ' . $inputfield_padding . 'rem '  . $inputfield_padding . 'rem ' . $inputfield_padding . 'rem;' :''; ?>
  border:0;
}

body.modal #main.pw-container.uk-margin.uk-margin-large-bottom {overflow:auto;<?php echo $inputfield_padding ? 'margin-bottom:' . $inputfield_padding . 'rem!important;' :''; ?>}
body.modal form#ImageVariations {margin-top:-1rem;}
body.modal #ImageVariations .InputfieldButton, body.modal #ImageVariations .InputfieldSubmit {display:none;}
.ui-dialog.ui-widget.ui-widget-content {
    border: solid 1px #676767;
    overflow: hidden;
    box-shadow: 0 0 1rem rgba(0,0,0,.5);
    background: rgba(0,0,0,.3);
}
.ui-dialog .ui-dialog-titlebar, .ui-dialog .ui-dialog-buttonpane {background:rgba(0,0,0,.5);margin-top:0;}
.ui-dialog .ui-dialog-titlebar .ui-button {padding:0 .25rem .1rem .25rem;line-height:1;}

div.PageList.ProcessPageLister.modal {padding:0;}

.ProcessField:not(.hasUrlSegments) .InputfieldForm, 
.ProcessTemplate:not(.hasUrlSegments) .InputfieldForm {margin:0;}

.ProcessField:not(.hasUrlSegments) #pw-content-body .Inputfields,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body .Inputfields {padding:0 0 1.25rem;}

.ProcessField:not(.hasUrlSegments) #pw-content-body .InputfieldHeader,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body .InputfieldHeader {padding:.5em .75em;}

.ProcessField:not(.hasUrlSegments) #pw-content-body .InputfieldFieldset > .InputfieldHeader,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body .InputfieldFieldset > .InputfieldHeader {padding:1em .75em;}

.ProcessField:not(.hasUrlSegments) #pw-content-body .Inputfield:not(.InputfieldMarkup):not(.InputfieldFieldset):not(.InputfieldSelect):not(.InputfieldRadios) .InputfieldContent,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body .Inputfield:not(.InputfieldMarkup):not(.InputfieldFieldset):not(.InputfieldSelect):not(.InputfieldRadios) .InputfieldContent  {padding:0;}

.ProcessField:not(.hasUrlSegments) #pw-content-body .Inputfield .InputfieldContent,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body .Inputfield .InputfieldContent {padding:0 .75em;}

.ProcessField:not(.hasUrlSegments) #pw-content-body .Inputfield .InputfieldSelect .InputfieldContent,
.ProcessField:not(.hasUrlSegments) #pw-content-body .Inputfield .InputfieldRadios .InputfieldContent,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body .Inputfield .InputfieldSelect .InputfieldContent,
.ProcessTemplate:not(.hasUrlSegments) #pw-content-body .Inputfield .InputfieldRadios .InputfieldContent {padding-bottom:.75em;}


#pw-content-body .Inputfield {outline: none;box-sizing:border-box;}

#pw-content-body :not(.MinimalFieldset) .Inputfield {
   	margin-top: <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>;
    border-radius:<?php echo $content_radius ? $content_radius . 'em' :'0'; ?>;
    border: solid 1px <?php echo hexRGBA($auto_color, 0.2) ; ?>;
    overflow: hidden;
}

#pw-content-body .WireTabs+ul>.Inputfield.InputfieldWrapper, #pw-content-body .WireTab > ul .InputfieldWrapper,
#pw-content-body .MinimalFieldset .Inputfield, #pw-content-body .InputfieldButton {border-color:transparent;margin:0;}
#pw-content-body .ProcessPageLister {margin-top: <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>;}
#pw-content-body .ProcessPageLister form.InputfieldWrapper {border:0;overflow: visible;}

.pw-content #pw-content-body .InputfieldSubmit,
.pw-content #pw-content-body .InputfieldButton {margin-top: 1.5rem!important;border:0;overflow:visible;}

.ProcessGoogleAnalytics .InputfieldButton {margin-top:0!important;}
#pw-content-body #import_button {margin-right:0;}

#ProcessPageEdit #PageEditTabs, .WireTabs {z-index:99;margin-bottom: -1px;}


.InputfieldStateCollapsed>.InputfieldContent,.InputfieldStateCollapsed>.Inputfields {display:none;}

@media (min-width: 960px) {
	li[data-colwidth],
  li[data-colwidth="50%"].InputfieldColumnWidthFirst + li.InputfieldStateHidden + li[data-colwidth="50%"].InputfieldColumnWidthFirst {
  	flex-grow: 1;
    margin-left: <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?> ;
  }
  li[data-colwidth="10%"] {
		width: calc(10% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="15%"] {
		width: calc(15% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="20%"] {
		width: calc(20% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="25%"] {
		width: calc(25% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
	li[data-colwidth="30%"] {
		width: calc(30% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="33%"],
  bli[data-colwidth="34%"] {
		width: calc(33% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="35%"] {
		width: calc(35% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="40%"] {
		width: calc(40% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="45%"] {
		width: calc(45% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="50%"] {
		width: calc(50% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="55%"] {
		width: calc(55% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="60%"] {
		width: calc(60% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="65%"] {
		width: calc(65% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="66%"] {
		width: calc(66% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="67%"] {
		width: calc(67% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="70%"] {
		width: calc(70% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="75%"] {
		width: calc(75% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="80%"] {
		width: calc(80% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="85%"] {
		width: calc(85% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  body:not(.ProcessPageEdit)  li[data-colwidth="90%"] {
		width: calc(90% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  li[data-colwidth="95%"] {
		width: calc(95% - <?php echo $admin_input_margin ?  $admin_input_margin .'em' : '0'; ?>);
	}
  
  li:not(.InputfieldStateHidden) + li[data-colwidth].InputfieldColumnWidthFirst,
  li[data-colwidth].InputfieldColumnWidthFirst:first-of-type  
  {margin-left:0;}
}

#pw-content-body .pw-table-responsive:empty {
    display: none;
}
body:not(.ProcessGoogleAnalytics) #pw-content-body .pw-table-responsive {
	margin:.75rem 0;
	border-radius:<?php echo $content_radius ? $content_radius . 'em' :'0'; ?>; 
	background-color: rgba(0,0,0,.03);
	border: solid 1px <?php echo hexRGBA($auto_color, 0.15) ; ?>;
	<?php echo $shadows ? 'box-shadow: 0 .3rem 2rem rgba(0,0,0,.15);' :''; ?>
}

.AdminDataTable {
	background:<?php echo $auto_color ? hexRGBA($auto_color,.03) :''; ?>;
}
.ProcessGoogleAnalytics  #pw-content-body .pw-table-responsive {overflow:visible;}
.ProcessGoogleAnalytics .AdminDataTable, .ProcessModule .AdminDataTable  {
	border-radius:<?php echo $content_radius ? $content_radius . 'em' :'0'; ?>;  
  overflow:hidden;
  <?php echo $shadows ? 'box-shadow: 0 0 0 1px ' . hexRGBA($auto_color, 0.15) . ', 0 .5rem 1.5rem rgba(0,0,0,.15);' :''; ?>
}

.pw-table-responsive p a {
	margin: 0 1rem 1rem;
	display: inline-block;
}
#pw-content-body table {margin:0;}
#pw-content-body td, #pw-content-body th {padding:.6rem;}
#pw-content-body td:first-child,
#pw-content-body th:first-child,
#pw-content-body #ProcessListerResults #ProcessListerTable table.ProcessListerTable>thead th:first-child,
#pw-content-body #ProcessListerResults #ProcessListerTable table.ProcessListerTable>tbody>tr>td:first-child {
	padding-left: 1rem;
 	max-width: 45rem;
}
#pw-content-body td:last-child,
#pw-content-body th:last-child {padding-right:1rem;}
#pw-content-body th {
	font-size: .85rem;
	color:<?php echo $heading_color ?  hexRGBA($heading_color, .75) : hexRGBA(getContrast($content_bckgndcolor, 'heading'), .75) ; ?>;
  background: rgba(0,0,0,.1);
}
<?php echo $table_zebra ? '#pw-content-body tr:nth-child(even) {background:' . hexRGBA($auto_color,.01) . ';}':''; ?>

#pw-content-body th:hover {color:<?php echo $heading_color ? $heading_color : getContrast($content_bckgndcolor, 'heading') ; ?>;}
#pw-content-body .tablesorter-header-inner:after {opacity:0.6;}
#pw-content-body th:hover .tablesorter-header-inner:after {opacity:1;}
.tablesorter-header-inner i {display:none;}
.tablesorter-header-inner strong i {display:inline-block;}

.uk-table-divider > tr:not(:first-child),
.uk-table-divider > :not(:first-child) > tr,
.uk-table-divider > :first-child > tr:not(:first-child) {
	border-top-color:<?php echo hexRGBA($auto_color, 0.1) ; ?>;
}
#pw-content-body tbody > tr:last-child  {border-bottom:0;}

h2,.uk-h2 {color:<?php echo $heading_color ? $heading_color : getContrast($content_bckgndcolor, 'heading'); ?>;line-height:1.1;	}
h3,h4,h5,h6,.uk-h3,.uk-h4,.uk-h5,.uk-h6 {line-height:1.1;color:<?php echo $heading_color ? hexRGBA($heading_color, .85) : hexRGBA(getContrast($content_bckgndcolor, 'heading'), .85) ; ?>;}


.Inputfield > .InputfieldHeader {
	font-weight:500;
	<?php echo $label_color ? 'color:' . $label_color . ';' :'color:' .getContrast($content_bckgndcolor) . ';'; ?>
}

.Inputfield.InputfieldStateCollapsed>.InputfieldHeader {
	color:<?php if ($label_collapsed) {
		echo $label_collapsed;
		} elseif ($label_color) {
		echo hexRGBA($label_color, .7);
		} else {
		echo hexRGBA(getContrast($content_bckgndcolor, 'heading'), .7);}  ?>;
	background: <?php echo $label_color ?  hexRGBA(getContrast($label_color, 'tab'), .03) : hexRGBA(getContrast($content_bckgndcolor, 'tab'), .03) ; ?>!important;  /* important over-ride because of #_adminTheme inline style */
  height:100%;
}
.Inputfield.InputfieldStateCollapsed>.InputfieldHeader:hover,
.Inputfield.InputfieldStateCollapsed>.InputfieldHeader:focus {
	color:<?php echo $label_color ?  hexRGBA($label_color, 1) : hexRGBA(getContrast($content_bckgndcolor, 'heading'), 1) ; ?>;
	background: <?php echo $label_color ?  hexRGBA(getContrast($label_color, 'tab'), .01) : hexRGBA(getContrast($content_bckgndcolor, 'tab'), .01) ; ?>!important; /* important over-ride because of #_adminTheme inline style */
  <?php echo $shadows ? 'box-shadow: inset 0 0 .15em ' . hexRGBA($button_bckgndcolor, 0.75) . ';' :''; ?>
}
body:not(.ProcessPageEdit) #pw-content-body .Inputfield.InputfieldStateCollapsed:hover,
body:not(.ProcessPageEdit) #pw-content-body .Inputfield.InputfieldStateCollapsed:focus {
	border: solid 1px <?php echo hexRGBA($auto_color, 0.4) ; ?>;
	<?php echo $shadows ? 'box-shadow: 0 0 .35em ' . hexRGBA($button_bckgndcolor, 0.75) . ';' :''; ?>
}



.Inputfield {outline: 1px solid <?php echo $separator_color ? $separator_color : hexRGBA($auto_color,0.1); ?>;}
.InputfieldStateRequired>.InputfieldHeader:first-child:after {
    content: ' *';
    color: orange;
}
.description, .pw-description, .description em strong, ol, ul,
.InputfieldContent p, .InputfieldImageEdit__info, .InputfieldImageValidExtensions, .gridImage__trash {
<?php echo $auto_color ? 'color:' . hexRGBA($auto_color,0.8). '!important;' :''; ?>
font-weight:400;
}


.description em {
<?php echo $auto_color ? 'color:' . hexRGBA($auto_color,0.6) . ';' :''; ?>
font-style:normal;font-size:.85em;padding: 0 0 0 4px;
}

.detail, .notes, .pw-detail, .pw-notes, .notes, .pw-detail, .pw-notes {
<?php echo $auto_color ? 'color:' . hexRGBA($auto_color,0.6) . '!important;' :''; ?>
}

.NotificationMenu {overflow: visible!important;}


#pw-masthead,#pw-masthead-mobile {<?php echo $masthead_bckgndcolor ? 'background-color:' . $masthead_bckgndcolor . ';' :'background-color:rgba(0,0,0,.55);'; ?>}
#pw-footer {<?php echo $footer_bckgndcolor ? 'background-color:' . $footer_bckgndcolor . ';' :'background-color:rgba(0,0,0,.55);'; ?>
padding: 15px 0;margin-bottom:0;}

a.pw-logo-link.uk-logo.uk-margin-right {margin-right:0!important;display:flex;align-items:center;}
img.pw-logo{<?php 
if ($masthead_minheight && $masthead_minheight<40 ) {
	echo 'max-height:' . ($masthead_minheight-4) . 'px;';
	} else {echo 'max-height:32px';}
?>
}
img.pw-logo-native{filter: brightness(0) invert(1);opacity:.4;}
a:hover img.pw-logo-native, a:focus img.pw-logo-native {opacity:1;}

#pw-masthead [class*=uk-inline] {display:flex;}
#pw-masthead .uk-input {height:auto;}
html, .uk-h1, .uk-h2, .uk-h3, .uk-h4, .uk-h5, .uk-h6, h1, h2, h3, h4, h5, h6,
uk-navbar-item, .uk-navbar-nav>li>a, .uk-navbar-toggle{
font-family: <?php echo $font_family ? $font_family . ';' : '-apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", Arial, sans-serif;'; ?>
}
#pw-masthead, uk-navbar-item, .uk-navbar-nav>li>a, .uk-navbar-toggle,#pw-masthead .pw-search-form,.pw-masthead .fa-search, .uk-navbar-left b a  {
<?php echo $masthead_minheight ? 'min-height:' . $masthead_minheight . 'px;height:' . $masthead_minheight . 'px;line-height:' . $masthead_minheight . 'px;' :
'min-height:55px;height:55px;line-height:55px;'; ?>
}
#pw-masthead .pw-search-icon {
<?php 
  if($masthead_minheight && $masthead_minheight<17) {
    	echo 'font-size:.9em;';
   	}
?>
}
#pw-masthead .pw-search-form, #pw-masthead .pw-search-input.uk-input {
display:flex;
color:#FFF;
<?php 
  if(!$masthead_minheight || $masthead_minheight>44) {
		echo 'min-height:40px;max-height:40px;height:40px;';
	}
?>	
}
#pw-masthead .pw-search-form {
<?php 
  if($masthead_minheight && $masthead_minheight<44) {
		echo 'padding:2px 0;';
	}
?>	
}
#pw-masthead .pw-search-form .pw-search-input {
background:rgba(255,255,255,0.15);
border-color:rgba(255,255,255,0.19);
}
#pw-masthead .pw-search-form .pw-search-input:focus {
    color: #fff;
background:rgba(255,255,255,0.25);
border-color:rgba(255,255,255,0.19);
}
#pw-masthead .pw-search-form .uk-form-icon,
#offcanvas-nav .pw-search-form .uk-form-icon  {
    color: inherit;
    opacity: .4;
    width:2rem;
}
.uk-form-icon:not(.uk-form-icon-flip)~.uk-input {
    padding-left: 2rem!important;
}

.uk-navbar-left, .uk-navbar-item, .uk-navbar-nav>li>a, .uk-navbar-toggle, .pw-search-input.uk-input {
<?php 
  if($masthead_minheight && $masthead_minheight<17) {
    	echo 'font-size:' . ($masthead_minheight - 5) . 'px;padding-right:2px;font-weight:500;';
   	} elseif ($masthead_minheight && $masthead_minheight<30) {
			echo 'font-size:12px;';
		} elseif ($masthead_minheight && $masthead_minheight<40) {
			echo 'font-size:14px;';
		}	else {
			echo 'font-size:1rem';
		} 
?>
} 
.pw-user-nav a#tools-toggle, .uk-navbar b {<?php if(!$masthead_minheight || $masthead_minheight>29) {echo 'font-size:.8rem;';} ?>}


p a, a:active, p a:focus, p a:hover {text-decoration:underline;}

footer {flex:0;}
footer p, footer a, footer a:hover, footer a:focus {font-size:.9rem;text-decoration:none;color:<?php echo $footer_color ; ?>;font-weight:400;line-height:1.25;}
#pw-content-body .gridImage:hover label.gridImage__trash:hover {background:transparent;}
footer .uk-text-muted {color:<?php echo hexRGBA($footer_color,0.8) ; ?>!important;}
footer small, footer small.uk-text-small {font-size:.8rem;font-weight:300;}

.uk-navbar-left b {display:block;margin:0 .5em 0 0; line-height:.9;} 
.uk-navbar-left i{display:block;color:#999;font-style:normal;text-align:right;font-size:.7em;font-weight:400;line-height:1;margin:0;}
.uk-navbar b a {color:#fff;text-decoration:none;font-weight:500;}

.pw-content a, .pw-content .uk-link, 
.PageList .PageListItem > a.PageListPage, 
.uk-button-text {
color:<?php echo $link_color ? $link_color : hexRGBA(getContrast($content_bckgndcolor, 'link'), .8); ?>;	
}

.pw-content a:active, .pw-content a:active, .pw-content a:hover,
.uk-button-text:focus, .uk-button-text:hover,
.pw-content ul:not(.PageListActions) a:not(.InputfieldButtonLink):active,
.pw-content ul:not(.PageListActions) a:not(.InputfieldButtonLink):not(.pw-active):focus, 
.pw-content ul:not(.PageListActions) a:not(.InputfieldButtonLink):not(.pw-active):hover,
#offcanvas-nav .pw-sidebar-nav li>a, #offcanvas-nav .pw-sidebar-nav li>a:hover {
color:<?php echo $linkhover_color ? $linkhover_color : getContrast($content_bckgndcolor, 'link'); ?>;
text-decoration:none;
}
.uk-offcanvas-bar{width:calc(100vw - 2.2rem);max-width:350px;}
#offcanvas-nav .pw-search-form,#offcanvas-nav .pw-sidebar-nav li>a{padding-left:25px;padding-right:25px;}
#offcanvas-nav .uk-offcanvas-bar {background:#313131;padding:0;box-shadow: 0 0 1rem rgba(0,0,0,.5);border-right:1px solid #555;overflow-y:overlay;}
#offcanvas-nav .pw-sidebar-nav li.uk-open {background:#3a3a3a;}
#offcanvas-nav .pw-sidebar-nav li.uk-open>a {color:#FFF;}
.pw-sidebar-nav>li {border-top:1px solid #555;}
.pw-sidebar-nav>li>ul>li {border-top:1px solid #525252;}
.pw-sidebar-nav>li>ul>li .pw-nav-add:first-child, .pw-sidebar-nav>li>ul>li .pw-nav-dup:first-child {border-top: 1px solid #555;}
.pw-sidebar-nav>li>ul>li .pw-nav-add, .pw-sidebar-nav>li>ul>li .pw-nav-dup {border-bottom: 1px solid #555;}
.pw-sidebar-nav>li>ul>li .highlight, .pw-sidebar-nav>li>ul>li .separator {border-color: #666;}
.pw-sidebar-nav>li>ul>li .pw-nav-add+li:not(.pw-nav-add):not(.pw-nav-dup), .pw-sidebar-nav>li>ul>li .pw-nav-dup+li:not(.pw-nav-add):not(.pw-nav-dup) {margin-top:0;}
.pw-sidebar-nav>li>ul>li>ul>li {padding:0;line-height:1.5;}
#offcanvas-nav .pw-sidebar-nav li>a::after {content: ""; width:1.5rem;height:1.5rem;float:right;transition: all 200ms ease 0ms;}
#offcanvas-nav .pw-sidebar-nav li.uk-parent>a::after {
background: url("data:image/svg+xml,%3Csvg width='14' height='14' viewBox='0 0 14 14' xmlns='http://www.w3.org/2000/svg'%3E%3Cpolyline fill='none' stroke='%23ffffff' stroke-width='2' points='1 4 7 10 13 4' /%3E%3C/svg%3E") no-repeat center center;opacity:.5;}
#offcanvas-nav .pw-sidebar-nav li.uk-parent.uk-open>a::after {transform: rotate(-180deg);opacity:1;}

.uk-button-text::before {border-bottom-color:<?php echo $linkhover_color ? $linkhover_color : getContrast($content_bckgndcolor, 'link'); ?>; ;}

.uk-tab > * > a, 
.uk-breadcrumb>*>*, 
.uk-breadcrumb>:last-child>*,
.ui-menu-item.add a,
.ui-menu-item.pw-nav-add a {
color:<?php echo $link_color ? $link_color : hexRGBA(getContrast($body_bckgndcolor, 'link'), .8); ?>;	
text-decoration:none;cursor:pointer;
}

.uk-breadcrumb>*>:focus, .uk-breadcrumb>*>:hover {
color:<?php echo $linkhover_color ? $linkhover_color : getContrast($body_bckgndcolor,'link'); ?>;
border-bottom-color:<?php echo $linkhover_color ? $linkhover_color : getContrast($body_bckgndcolor,'link'); ?>;
}
.uk-breadcrumb>:last-child>* {font-weight:800;}

.uk-breadcrumb > :nth-child(n+2):not(.uk-first-column)::before, .uk-breadcrumb:after {
content: "/";
display: inline-block;
margin: 0 1rem;
color: <?php echo hexRGBA(getContrast($body_bckgndcolor), .33); ?>;
}



.uk-navbar b a:hover, .uk-navbar b a:focus,
#pw-masthead .uk-navbar-nav>li>a.hover, #pw-masthead .uk-navbar-nav>li>a:hover,
#pw-masthead .uk-navbar-nav>li>a:focus,
.PageList .PageListItem.PageListItemHover > a.PageListPage, 
.PageList .PageListItem > a.PageListPage:hover, 
.PageList .PageListItem > a.PageListPage:focus,
.PageList .PageListItemOpen.PageListItemHover > a.PageListPage,
.PageList .PageListItemOpen.PageListItemHover > a.PageListPage:hover, .PageList .PageListItemOpen.PageListItemHover > a.PageListPage:focus,
.PageList .PageListItemOpen:not(.PageListID1) > a.PageListPage, 
.PageList .PageListItemOpen > a.PageListPage:hover, 
.PageList .PageListItemOpen > a.PageListPage:focus,
#pw-masthead .uk-navbar-nav>li>a.hover i, #pw-masthead .uk-navbar-nav>li>a:focus i,
.ui-menu-item.add a:hover, .ui-menu-item.add a:focus,
.ui-menu-item.pw-nav-add a:hover, .ui-menu-item.pw-nav-add a:focus {
color:<?php echo $linkhover_color ? $linkhover_color :'#15BFFF'; ?>;
outline:none;
}
#pw-content-body .PageList {overflow:visible!important;}
.PageList .PageListItem, .PageList .PageListItem.PageListItemOpen {border-bottom:0;}
.PageListRoot > .PageList .PageList, .PageListRoot > .PageListRootHidden > .PageList, .PageListRoot > .PageListRootHidden > .PageList {margin-left:0;}

.PageListItem {
	font-size: <?php echo $pagelist_fontsize ? $pagelist_fontsize . 'rem' :'1rem'; ?>;
	display:flex;
	flex-wrap: wrap;
	align-items: center;
	transition:all 250ms ease 20ms
}
.PageList .PageList .PageListHasChildren+.PageList .PageListItem {
	font-size: <?php echo $pagelistsub_fontsize ? $pagelistsub_fontsize . 'rem' :'1em'; ?>;
}
.PageList .PageListItem, 
.PageList .PageListItem.PageListItemOpen {
	padding: .25em .2em;
	border-radius: <?php echo $content_radius ? $content_radius . 'em' :'0'; ?>;
	margin-bottom: .25rem;   
<?php 
	echo 'background:';
	if ($pagelist_item_showbckgnd) { 
	echo $pagelist_item_bckgnd ? $pagelist_item_bckgnd : 'rgba(0,0,0,.05)';
	} else {echo 'transparent';}
	echo ';';
?>   
<?php if ($pagelist_item_showborder) { 
	echo 'border: solid 1px ';
	echo $pagelist_item_bordercolor ? $pagelist_item_bordercolor : hexRGBA(getContrast($body_bckgndcolor,'tab'),.12); 
	echo ';';
	}
?>   
}

.PageList .PageListItem:not(.PageListItemOpen):hover {
<?php 
	echo 'background:';
	if ($pagelist_item_showbckgnd) { 
	echo $pagelist_item_bckgndhover ? $pagelist_item_bckgndhover : 'rgba(255,255,255,.08)';
	} else {echo 'transparent';}
	echo ';';
?> 
<?php if ($pagelist_item_showborder) { 
	echo 'border: solid 1px ';
	echo $link_color ? hexRGBA($link_color, .4) : hexRGBA(getContrast($body_bckgndcolor,'link'),.4); 
	echo ';';
	}
?> 
<?php echo $shadows ? 'box-shadow: 0 0 1rem rgba(0,0,0,.15);' :''; ?> 
}


.PageListRoot > .PageList .PageList .PageListItemOpen.PageListHasChildren,
.PageListRoot > .PageList .PageList .PageListItem + .PageList {
<?php //submenu backgrounds
	echo 'background:';
	if ($pagelist_item_showbckgnd) { 
	echo $pagelist_open_bckgnd ? $pagelist_open_bckgnd : 'rgba(0,0,0,.02)';
	} else {echo 'transparent';}
	echo ';';
?> 
<?php // first level submenu borders 
	if ($pagelist_item_showborder) { 
		echo 'border: solid 1px ';
		if ($pagelist_open_bordercolor) { 
			echo $pagelist_open_bordercolor;
		} else {
			echo hexRGBA(getContrast($body_bckgndcolor,'tab'),.25);
		} 
	echo ';';	
	}
?>   
}
.PageListRoot > .PageList .PageList .PageList .PageListItem.PageListItemOpen.PageListHasChildren,
.PageListRoot > .PageList .PageList .PageList .PageListItem + .PageList {
<?php if ($pagelist_item_showborder) { 
	// lower level submenu borders, taking into account possible open submenu colors
	echo 'border: solid 1px ';
		if ($pagelist_open_bordercolor) { 
			echo $pagelist_open_bordercolor;
		} elseif ($pagelist_open_bckgnd) {
			echo hexRGBA(getContrast($pagelist_open_bckgnd,'tab'), .1);
		} else {
			echo hexRGBA(getContrast($body_bckgndcolor,'tab'),.1);
		} 
	echo ';';	
	}
?>   
}

#pw-content-body .PageListRoot > .PageList .PageList .PageListItemOpen.PageListHasChildren {border-bottom:0;} 

.PageListRoot > .PageList .PageList .PageListItem + .PageList {
	padding: .75em 1em 1.25em 1.75em;
	margin: -.25rem 0 1em 0;
	opacity: 0;
}

.PageList .PageList .PageListItem.PageListHasChildren.PageListItemOpen {
border-radius:<?php echo $content_radius ? $content_radius . 'em' :'0'; ?> <?php echo $content_radius ? $content_radius . 'em' :'0'; ?> 0 0;
}
.PageListRoot > .PageList .PageList .PageListItem.PageListItemOpen + .PageList {
border-top: 0;
border-radius: 0 0 <?php echo $content_radius ? $content_radius . 'em' :'0'; ?> <?php echo $content_radius ? $content_radius . 'em' :'0'; ?>;
}

.PageListRoot > .PageList .PageList .PageListItem.PageListItemOpen + .PageList {opacity:1.0;}
.PageList .PageListActions > li, .PageList .PageListerActions > li {white-space:nowrap;}
.PageList .PageListActions, .PageList .PageListerActions {top:0;}
#pw-content-body .PageListActions {padding-left:.75em;font-size: .8em;}

.pw-content .PageListActions a,
.pw-content .PageListerActions a,
.pw-content .PageListMoveNote a {
  color: #fff;
  text-shadow: 0 0 .2em rgba(0,0,0,.5);
  border-radius: .33em;
  background: <?php echo $link_color ? $link_color : hexRGBA(getContrast($body_bckgndcolor, 'link'), .3); ?>;
  border:solid 1px <?php echo $link_color ? $link_color : hexRGBA(getContrast($body_bckgndcolor, 'link'), .25); ?>!important; 
  padding: .1em .4em;
  font-size: .9em;
  font-weight: 500;
  line-height: 1.6;
  display: inline-block;
}
.pw-content .PageListItem > a.PageListPage i {color:inherit;}
.pw-content .PageListerActions a {margin-left:-1px;}
.pw-content .PageListerActions a.PageExtras {opacity:0.6;}
.pw-content .PageListActions  .ui-priority-secondary:hover {opacity:1;}
.pw-content .PageListActions a:hover,
.pw-content .PageListerActions a:hover,
.pw-content .PageListMoveNote a:hover {
	color:#FFF;
  text-decoration: none;
	background: <?php echo $linkhover_color ? $linkhover_color : hexRGBA(getContrast($body_bckgndcolor, 'link'), .8); ?>;
  border:solid 1px <?php echo $link_color ? $link_color : hexRGBA(getContrast($body_bckgndcolor, 'link'), .5); ?>!important; 
}
#pw-content-body #PageListContainer.PageListContainerPage .PageListActionTrash {display:inline-block;}

.PageListActionExtra.PageListActionTrash a {
    background: #FFD15E;
    border-color:#ffae42!important;
}
.PageListActionExtra.PageListActionTrash a:hover {
    background: #ffae42;
    border-color: #f58c00!important;
}
.PageList .PageListMoveNote {cursor:move;}
.PageList .PageListActionMore a {margin-top: 0.25em;}
.PageList .PageListSelectName {margin-right:0.5em;}
.PageList .PageListSelectName i {margin-right:0.25em;}

.PageListItem:last-child, .PageList .PageList .PageList .PageListItem.PageListItemOpen:last-child {margin-bottom:0;}

.PageList .PageListItem.PageListSortItem {
  background: #ffd;
}
.PageList .PageListItem > a.PageListPage {
	line-height: 1.6;
	font-size: 1em;
	font-weight: 500;
	opacity: 1.0;
}

.PageList .PageListItemOpen.PageListItemHover>a.PageListPage, .PageList .PageListItemOpen.PageListItemHover>a.PageListPage:hover, .PageList .PageListItemOpen>a.PageListPage, .PageList .PageListItemOpen>a.PageListPage:hover {background-color:transparent;}

.PageList a i.fa,.PageList .PageListStatusIcon {font-size:.9em;width:1.3em;}
.PageList a i.fa-trash-o {width:auto;}
a.clickExtras i.fa {
    width: .5em;
    font-size: 1em;
    line-height: 1.6;
    text-align:center;
    transition: all 250ms ease 20ms;
}
a.clickExtras i.fa.fa-flip-horizontal {transform:rotate(-180deg);}

body:not(.pw-narrow-width) #pw-content-body a.PageListPage:before {
	content: " ";
	left:0;
  top:0;
	line-height: 1;
	width: 1.1em;
	font-size: 1em;
  text-align: center;
  transition: all 250ms ease 25ms;
}
body:not(.pw-narrow-width) #pw-content-body a.PageListPage:before {
	color: <?php 
		if ($pagelist_item_bckgnd) { 
			echo hexRGBA(getContrast($pagelist_item_bckgnd), .5);
		} else {
			echo hexRGBA(getContrast($body_bckgndcolor), .5);
		} ; ?>;
}
body:not(.pw-narrow-width) #pw-content-body a.PageListPage:hover:before {
	color: <?php 
		if ($pagelist_item_bckgnd) { 
			echo hexRGBA(getContrast($pagelist_item_bckgnd), .8);
		} else {
			echo hexRGBA(getContrast($body_bckgndcolor), .8);
		} ; ?>;
}
body:not(.pw-narrow-width) #pw-content-body .PageListItemOpen:not(.PageListID1) a.PageListPage:before,
body:not(.pw-narrow-width) #pw-content-body .PageListItemOpen:not(.PageListID1) + .PageList a.PageListPage:before {
	color: <?php 
		if ($pagelist_item_bckgnd) { 
			echo hexRGBA(getContrast($pagelist_item_bckgnd), .5);
		} elseif ($pagelist_open_bckgnd) {
			echo hexRGBA(getContrast($pagelist_open_bckgnd), .5);
		} else {
			echo hexRGBA(getContrast($body_bckgndcolor), .5);
		} ; ?>;
}
body:not(.pw-narrow-width) #pw-content-body .PageListItemOpen:not(.PageListID1) a.PageListPage:hover:before,
body:not(.pw-narrow-width) #pw-content-body .PageListItemOpen:not(.PageListID1) + .PageList a.PageListPage:hover:before {
	color: <?php 
		if ($pagelist_item_bckgnd) { 
			echo hexRGBA(getContrast($pagelist_item_bckgnd), .8);
		} elseif ($pagelist_open_bckgnd) {
			echo hexRGBA(getContrast($pagelist_open_bckgnd), .8);
		} else {
			echo hexRGBA(getContrast($body_bckgndcolor), .8);
		} ; ?>;
}
body:not(.pw-narrow-width) #pw-content-body .PageListItemOpen a.PageListPage:before {transform:rotate(-90deg);}
body:not(.pw-narrow-width) #pw-content-body .PageListHasChildren > a.PageListPage:before,
body:not(.pw-narrow-width) #pw-content-body .PageListHasChildren:not(.PageListItemOpen) > a.PageListPage:before  {content:"\f105";}

.toggle-icon {transition: all 200ms ease 0ms;}
.InputfieldHeader.InputfieldStateToggle i.toggle-icon{color:inherit!important;padding:0;}
.InputfieldHeader.InputfieldStateToggle i.toggle-icon.fa-angle-down {transform: rotate(-180deg);}
.toggle-icon.fa-angle-right:before,
.toggle-icon.fa-angle-down:before {content: "\f107";}

#pw-content-body a.PageListPage i.PageListStatusIcon {
	color:<?php 
		if ($pagelist_item_bckgnd) { 
			echo hexRGBA(getContrast($pagelist_item_bckgnd), .5);
		} elseif ($pagelist_open_bckgnd) {
			echo hexRGBA(getContrast($pagelist_open_bckgnd), .5);
		} else {
			echo hexRGBA(getContrast($body_bckgndcolor), .5);
		} ; ?>;
}

.PageList .PageListItem .PageListNumChildren:not(:empty) {
	font-size:.75em;	
  margin-left:.75em;    
	padding: 0 .35em;
	text-align: center;
	height: 2.2em;
	min-width: 2.2em;
  line-height: calc(2.2em - 1px);
	border-radius: 3em;    
	color:<?php echo $pagelist_item_bckgnd ? hexRGBA(getContrast($pagelist_item_bckgnd), .4) : hexRGBA(getContrast($body_bckgndcolor), .4); ?>!important;
	background: <?php echo $pagelist_item_bckgnd ? hexRGBA(getContrast($pagelist_item_bckgnd), .03) : hexRGBA(getContrast($body_bckgndcolor), .03); ?>;    
	border: solid 1px <?php echo $pagelist_item_bckgnd ? hexRGBA(getContrast($pagelist_item_bckgnd), .1) : hexRGBA(getContrast($body_bckgndcolor), .08); ?>;
}
.PageList .PageListItem:not(.PageListItemOpen):hover .PageListNumChildren:not(:empty) {
	color:<?php echo $pagelist_item_bckgndhover ? hexRGBA(getContrast($pagelist_item_bckgndhover), .4) : hexRGBA(getContrast($body_bckgndcolor), .4); ?>!important;
	background: <?php echo $pagelist_item_bckgndhover ? hexRGBA(getContrast($pagelist_item_bckgndhover), .03) : hexRGBA(getContrast($body_bckgndcolor), .03); ?>;    
	border: solid 1px <?php echo $pagelist_item_bckgndhover ? hexRGBA(getContrast($pagelist_item_bckgndhover), .1) : hexRGBA(getContrast($body_bckgndcolor), .1); ?>;
}
.PageList .PageListItem.PageListItemOpen .PageListNumChildren:not(:empty) {   
	color:<?php echo $pagelist_open_bckgnd ? hexRGBA(getContrast($pagelist_open_bckgnd), .4) : hexRGBA(getContrast($body_bckgndcolor), .4); ?>!important;
	background: <?php echo $pagelist_open_bckgnd ? hexRGBA(getContrast($pagelist_open_bckgnd), .03) : hexRGBA(getContrast($body_bckgndcolor), .03); ?>;    
	border: solid 1px <?php echo $pagelist_open_bckgnd ? hexRGBA(getContrast($pagelist_open_bckgnd), .1) : hexRGBA(getContrast($body_bckgndcolor), .08); ?>;
}


.PageList .PageListItem > a.PageListPage:hover,
.PageList .PageListItem.PageListItemHover > a.PageListPage {text-decoration: none;}
.PageList .PageListItem > a.PageListPage:hover i,
.PageList .PageListItem.PageListItemHover > a.PageListPage i {text-decoration: none;}

.PageList .PageListItem .PageListLoading {
	color:<?php 
		if ($pagelist_item_bckgnd) { 
			echo hexRGBA(getContrast($pagelist_item_bckgnd), .5);
		} elseif ($pagelist_open_bckgnd) {
			echo hexRGBA(getContrast($pagelist_open_bckgnd), .5);
		} else {
			echo hexRGBA(getContrast($body_bckgndcolor), .5);
		} ; ?>;
	margin-top: -.07em;
	font-size: 1.25em;
	top:0;
}
.PageListLoading i.fa.fa-spinner {font-size:1em;}

.PageList .PageListStatusHidden > a.PageListPage {opacity:0.65;}

.PageList .PageListStatusHidden > a.PageListPage:hover {opacity: 1;}

.PageList .PageListStatusTemp:not(.PageListItemOpen) > a.PageListPage {opacity: 0.3;}

.PageList .PageListStatusLocked > a.PageListPage, 
.PageList .PageListStatusLocked > a .icon {
	color: <?php echo $pagelist_item_bckgnd ? hexRGBA(getContrast($pagelist_item_bckgnd), .5) : hexRGBA(getContrast($body_bckgndcolor), .5); ?>;
	opacity:1;
}

#main .notes:not(:empty) {
    color: #404040!important;
    background: rgba(255, 255, 200, .7);
    padding: .25em 1rem;
    width: auto;
		<?php echo $button_radius ? 'border-radius:' . $button_radius . 'em;' :''; ?>
}

.pw-panel-container {min-width: 135px; }

#NotificationBug {left:auto;right:.55rem;}
.NoticeMessage, .NoticeMessage.uk-alert-primary {background:#e5e5e5;}
.NotificationList .uk-alert {padding:0;}
.NotificationTitle pre {width:auto;display:inline;border-radius:8px;border:solid 2px #dadada;}

.ProcessLogin .InputfieldContent, .ProcessLogin .Inputfield, .ProcessLogin .InputfieldHeader{ background: inherit; }
.ProcessLogin input {border-radius:<?php echo $content_radius ? $content_radius . 'em' :'0'; ?>; }

.InputfieldCheckbox .InputfieldContent label:only-of-type,
.InputfieldCheckboxes table label,
.uk-form-controls .InputfieldCheckboxes ul li label,
.InputfieldCheckboxes .InputfieldContent label,
.Inputfield .InputfieldMapMarkerToggle label {
		display:flex;
    align-items:center;
    cursor:pointer;
}

.uk-form-controls-text label:only-of-type input.uk-checkbox,
.Inputfield input[type=checkbox].uk-checkbox,
.InputfieldCheckboxes .InputfieldContent label input.uk-checkbox,
.InputfieldMapMarkerToggle label input{
		font-size:.8rem;
		position:relative;
		-webkit-appearance:none;
		outline:none; width:4em;
		height:2.4em;
		border:2px solid #D6D6D6;
		border-radius:3em;
		background-color:#FFF;
		box-shadow: inset 5em 0 0 #EEE;
		flex-shrink:0;
		margin: 2px .5em 2px 0;
}
p.template-checkboxes input[type=checkbox].uk-checkbox {font-size:.6rem;}

.uk-form-controls-text label:only-of-type input.uk-checkbox:after,
.Inputfield input[type=checkbox].uk-checkbox:after,
.Inputfield .InputfieldMapMarkerToggle input:after {content:"";position:absolute;top:.25em;left:.25em;background:#FFF;width:1.6em;height:1.6em;border-radius:50%;transition:all 250ms ease 20ms;box-shadow:.05em .25em .5em rgba(0,0,0,0.2);}

.uk-form-controls-text label:only-of-type input.uk-checkbox:checked,
.Inputfield input[type=checkbox].uk-checkbox:checked,
.Inputfield .InputfieldMapMarkerToggle input:checked {
background: <?php echo $button_bckgndcolor ? $button_bckgndcolor :'#4ed164'; ?>;
box-shadow:inset 5em 0 0 <?php echo $button_bckgndcolor ? $button_bckgndcolor :'#4ed164'; ?>;
border-color:rgba(255,255,255,0.5);
}
.uk-form-controls-text label:only-of-type input.uk-checkbox:checked:after,
.Inputfield input[type=checkbox].uk-checkbox:checked:after,
.Inputfield .InputfieldMapMarkerToggle input:checked:after
{left:1.85em;box-shadow:0 0 1em rgba(0,0,0,0.2);}

label:only-of-type input.uk-checkbox:checked + span:not(.detail),
.Inputfield input[type=checkbox].uk-checkbox:checked + span:not(.detail),
.Inputfield .InputfieldMapMarkerToggle input:checked + strong {
		/*background: rgba(255,255,255,0.85);
		box-shadow: 0 0 1em rgba(0,0,0,.25);
		color:<?php echo $button_bckgndcolor ? $button_bckgndcolor :'#4ed164'; ?>;*/
    transition:all 250ms ease 20ms;
}

label:only-of-type input.uk-checkbox + span, 
.Inputfield input[type=checkbox].uk-checkbox + span,
.Inputfield .InputfieldMapMarkerToggle input + strong {
	color:#c3c3c3;
	display:flex;
	width:100%;
	max-width:35em;
	align-items:center;
	justify-content:space-between;
	padding: .25em .25em .25em .75em;
  border-radius: 1.5em;
}

label:only-of-type input.uk-checkbox:focus {
    box-shadow: 0 0 0 .25em <?php echo $linkhover_color ? $link_color :'#15BFFF'; ?>;
}
label:only-of-type input.uk-checkbox:checked:focus{
    box-shadow: 0 0 0 .25em <?php echo $button_bckgndcolor ? $button_bckgndcolor :'#4ed164'; ?>;
}


/*label:only-of-type input.uk-checkbox:focus+span,
label:only-of-type input.uk-checkbox:checked:focus+span {
color: <?php echo $linkhover_color ? $link_color :'#15BFFF'; ?>;
background: #FFF;
}*/

label:only-of-type input.uk-checkbox + span:after,
.Inputfield .InputfieldMapMarkerToggle input + strong:after {
    margin-left:.5em;
    width: 1.6em;
    max-height: 1.6em;
    opacity:0;
    content:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 250 250'%3E%3Ccircle cx='125' cy='125' r='125' fill='%23231F20' opacity='.1'/%3E%3Cpath fill='%230B8B44' d='M95.823 139.432l-32.492-32.56-31.872 31.883-.008-.008 63.72 63.732L218.549 79.116 187.494 47.52z'/%3E%3C/svg%3E");
}

label:only-of-type input.uk-checkbox:checked + span:after
{opacity:1;transition:opacity 250ms ease 150ms;}

.uk-tab::before { content: ""; position: absolute; bottom: 0; left: 0; right: 0; border-bottom: 0; }

.uk-hr, pre, .uk-heading-divider,
.uk-divider-small::after,
.uk-list-divider > li:nth-child(n+2),
.uk-description-list-divider > dt:nth-child(n+2),
.uk-grid-divider.uk-grid-stack > .uk-grid-margin::before,
.uk-card-default .uk-card-footer,
.uk-nav-default .uk-nav-divider,
.uk-nav-primary .uk-nav-divider,
.uk-navbar-dropdown-nav .uk-nav-divider,
.uk-dropdown-nav .uk-nav-divider,
.uk-navbar-dropdown-grid.uk-grid-stack > .uk-grid-margin::before,
.uk-modal-footer,
#pw-footer,
.cke_chrome {
border-top-color:<?php echo $input_bordercolor; ?>;
}

#pw-content-body dl {margin: .5rem 0;}
#pw-content-body dt:nth-child(n+2) {
    border-color: <?php echo hexRGBA($auto_color, 0.2) ; ?>;
}

.pw-table-resizable td, .pw-table-resizable th {
border-left-color:<?php echo hexRGBA($auto_color, 0.2) ; ?>;}

#pw-content-body .InputfieldSelector .selector-row {
border-top:solid 1px <?php echo hexRGBA($auto_color, 0.2) . '!important'; ?>;
}
#pw-content-body .InputfieldSelector .selector-row:last-child {
border-bottom:solid 1px <?php echo hexRGBA($auto_color, 0.2) . '!important'; ?>;
}

.uk-heading-bullet::before,
.uk-divider-vertical,
.uk-grid-divider > :not(.uk-first-column)::before,
.uk-navbar-dropdown-grid > :not(.uk-first-column)::before,
.uk-subnav-divider > :nth-child(n+2):not(.uk-first-column)::before,
.uk-tab-left::before,
.uk-tab-right::before { border-left-color:<?php echo $input_bordercolor; ?>; }

.uk-heading-line > ::after,
.uk-divider-icon::after,
.uk-card-default .uk-card-header,
.uk-tab::before,
.uk-modal-header{ border-bottom-color:<?php echo $input_bordercolor; ?>; }

.uk-list-striped > li:nth-of-type(odd),
.uk-list-large.uk-list-striped > li:nth-of-type(odd),
.uk-table-striped > tr:nth-of-type(odd),
.uk-table-striped tbody tr:nth-of-type(odd)
{ border-top-color:<?php echo $input_bordercolor; ?>; border-bottom-color:<?php echo $input_bordercolor; ?>; }

.Inputfields input:not([type=submit]):not([type=file]):not([type=checkbox]):not([type=radio]):not(.uk-form-blank),.Inputfields textarea:not(.uk-form-blank),
.uk-button-default,
.uk-textarea,
.uk-input:disabled,
.uk-select:disabled,
.uk-textarea:disabled,
.uk-radio:disabled,
.uk-checkbox:disabled,
.uk-button-danger:disabled,
uk-form-blank:focus,
.uk-search-default .uk-search-input,
.uk-placeholder,
.uk-panel-scrollable,
.ui-accordion.ui-widget .ui-accordion-content,
.Inputfield input[type=url]:not(.uk-input),
.Inputfield textarea:not(.uk-textarea),
.InputfieldImageUpload .InputMask.ui-button,
.Inputfields select.uk-select:not(.uk-form-blank) {
	color: <?php echo $input_color; ?>;
	background-color: <?php echo $input_bckgndcolor; ?>;
	border-color: <?php echo $input_bordercolor; ?>;
}

.uk-column-divider {column-rule-color:<?php echo $input_bordercolor; ?>;}

.uk-tab>li.uk-active,
.WireTabs.uk-tab>li.uk-active.pw-tab-muted {background:transparent;}	

.uk-tab>.uk-active>a {border-color:transparent;}


.WireTabs + ul, .WireTabs ~ form, .tfw-tab-content {
    border-radius:0 <?php echo $content_radius ? $content_radius . 'rem' :'0'; ?> <?php echo $content_radius ? $content_radius . 'rem' :'0'; ?>;
    border: 1px solid <?php echo getContrast($body_bckgndcolor,'tabborder') ; ?>;
    overflow: hidden;
}
.WireTabs + ul > li.InputfieldWrapper > .Inputfields {padding:0;}

.WireTabs a { 
		display: block;
    text-align: center;
    <?php echo $spacesave_tab ? 'padding:.7em 1em;font-size:.85rem;' :''; ?>
    font-weight: 500;
    border: 1px solid <?php echo hexRGBA(getContrast($body_bckgndcolor,'tabborder'),0.5) ; ?>;
    border-bottom-color: transparent;
    border-radius: <?php echo $content_radius ? $content_radius . 'em' :'0'; ?> <?php echo $content_radius ? $content_radius . 'em' :'0'; ?> 0 0;
    margin-right: 2px;
    margin-left: 0;
    background: <?php echo hexRGBA(getContrast($body_bckgndcolor,'tab'),0.05) ; ?>;
    clip-path: polygon(-50% -50%, 150% -50%, 150% 100%, 0% 100%);
    transition: all 250ms ease 25ms;
}

.WireTabs a:not(.pw-active):focus,
.WireTabs a:not(.pw-active):hover {
color:<?php echo $linkhover_color ? $linkhover_color : getContrast($body_bckgndcolor,'link'); ?>;
border-color: <?php echo $linkhover_color ? $linkhover_color : hexRGBA(getContrast($body_bckgndcolor,'link'),.5) ; ?>;
box-shadow: 0 0 .75rem <?php echo $linkhover_color ? $linkhover_color : hexRGBA(getContrast($body_bckgndcolor,'link'),.5) ; ?>;
outline:0;
}

#pw-content-body .WireTabs a.pw-active {
color:<?php echo $label_color ? $label_color : $auto_color ; ?>;
border-color: <?php echo getContrast($body_bckgndcolor,'tabborder') ; ?>;
border-bottom:solid 1px <?php echo $content_bckgndcolor ? $content_bckgndcolor :'#FFF'; ?>;
border-radius:<?php echo $content_radius ? $content_radius . 'em' :'0'; ?> <?php echo $content_radius ? $content_radius . 'em' :'0'; ?> 0 0;
transition: none;
}


#pw-masthead nav div:first-child {flex-grow:.25;}
#pw-masthead .pw-primary-nav,
#pw-masthead .pw-primary-nav>li {flex-grow:1;} 
#pw-masthead .pw-primary-nav li, #pw-masthead nav li a {line-height:1.1;}
#pw-masthead .pw-primary-nav li a {text-align:center;}

.uk-navbar-right {flex-wrap:nowrap;}
#pw-masthead .uk-form-width-medium {width:auto;max-width:200px;}

#pw-masthead .pw-primary-nav > li.uk-active > a:after,
#pw-masthead .pw-primary-nav > li > a.hover:after,
#pw-masthead .pw-primary-nav > li > a:hover:after {left:auto;
<?php 
  if($masthead_minheight && $masthead_minheight<19) {
    echo 'border-width:0 5px 3px 5px;';
	} elseif ($masthead_minheight && $masthead_minheight<26) {
    echo 'border-width:0 6px 4px 6px;';
  } elseif ($masthead_minheight && $masthead_minheight<50){
    echo 'border-width: 0 8px 8px 8px;';
  } else {echo 'border-width: 0 15px 15px 15px;';
  } 
?> 
border-bottom-color:<?php echo $body_bckgndcolor ? $body_bckgndcolor :'#FFFFFF'; ?>;
}
#pw-masthead .uk-navbar-nav > li.uk-active > a.pw-dropdown-toggle.hover:after,
#pw-masthead .uk-navbar-nav > li.uk-active:hover > a.pw-dropdown-toggle.hover:after,
#pw-masthead .uk-navbar-nav > li > a.pw-dropdown-toggle.hover:after {border-bottom-color:#FFF;}
.uk-navbar-nav>li>a {transition: none;}

.ui-widget-header .ui-state-focus { border: 1px solid #999999; background: #dadada; font-weight: normal; color: #212121; }
.ui-menu, .ui-menu .ui-menu-item {min-width: 160px;}
.ui-menu,
.ui-menu .ui-menu-item .ui-menu.navJSON {
font-size:0.88rem;
line-height:1em;
padding:.75rem 0;
border-radius:0 0 <?php echo $content_radius ? $content_radius . 'em' :'0'; ?> <?php echo $content_radius ? $content_radius . 'em' :'0'; ?>; 
box-shadow: 2px 2px 7px rgba(0,0,0,.175);
}
.ui-menu {background:linear-gradient(#FFF 20px,#f8f8f8);display:none;}
.ui-menu .ui-menu-item .ui-menu.navJSON {
border-radius:0 <?php echo $content_radius ? $content_radius . 'em' :'0'; ?> <?php echo $content_radius ? $content_radius . 'em' :'0'; ?> <?php echo $content_radius ? $content_radius . 'em' :'0'; ?>;
min-width: 17.25rem;
}
.ui-menu .ui-menu {position:absolute;}

@media (min-width: 1080px) {
a[data-from="prnav-page-21"] + .ui-menu, 
:nth-child(3) a[data-from="prnav-page-22"] + .ui-menu,
li:nth-child(3) a[data-from="prnav-page-28"] + .ui-menu {width:100vw;max-width: 34.25rem;}
a[data-from="prnav-page-21"] + .ui-menu .ui-menu-item:not(.add),
:nth-child(3) a[data-from="prnav-page-22"] + .ui-menu .ui-menu-item:not(.add),
li:nth-child(3) a[data-from="prnav-page-28"] + .ui-menu .ui-menu-item:not(.add) {width:auto;min-width: 17rem;float:left}
}
@media (min-width: 1340px) {
a[data-from="prnav-page-21"] + .ui-menu,
:nth-child(3) a[data-from="prnav-page-22"] + .ui-menu,
li:nth-child(3) a[data-from="prnav-page-28"] + .ui-menu {width:100vw;max-width: 51.25rem;}
}
@media (min-width: 1700px) {
a[data-from="prnav-page-21"] + .ui-menu,
:nth-child(3) a[data-from="prnav-page-22"] + .ui-menu,
li:nth-child(3) a[data-from="prnav-page-28"] + .ui-menu {width:100vw;max-width: 68.25rem;}
}
.ui-menu .ui-menu-item.add {width:calc(100% - .5rem);margin-top:-.75rem;}

.ui-menu .ui-menu-item .ui-menu.navJSON .ui-menu-item.add + .ui-menu-item:not(.add):not(.separator),
.ui-menu .ui-menu-item .ui-menu.navJSON .ui-menu-item,
.ui-menu .ui-menu-item .ui-menu.navJSON .ui-menu-item:not(.add):not(.highlight):first-child {padding:0;}
.ui-menu .ui-menu-item a {padding: .5em 1em;}
.ui-menu .ui-menu-item .ui-menu.navJSON .ui-menu-item:not(.add):not(.highlight) a {padding: .25em 1em;}

.ui-menu .ui-menu-item:not(:first-child).separator:not(.highlight) {
    border-top: 0!important;
}
.ui-menu .ui-menu-item.separator:not(.highlight) {border-top: 0!important;}
.ui-menu .ui-menu-item.separator:not(.highlight):not(:first-child) {border-top: 1px solid #f0f3f7!important;}
.ui-menu .ui-menu-item a i.fa {color:inherit;opacity: 0.33;}

.ui-menu .ui-menu-item.add a.ui-state-active, 
.ui-menu .ui-menu-item.add a.ui-state-focus,
.ui-menu .ui-menu-item.add a:hover,
.ui-menu .ui-menu-item.pw-nav-add a.ui-state-active, 
.ui-menu .ui-menu-item.pw-nav-add a.ui-state-focus,
.ui-menu .ui-menu-item.pw-nav-add a:hover 
 {background:transparent;}

.ui-menu .ui-menu-item.add a i.fa,
.ui-menu .ui-menu-item.pw-nav-add a i.fa  {opacity:1.0;}
.ui-menu i.pw-has-items-icon {
    width: 1rem;
    text-align: right;
}



.PageList .PageListStatusLocked > a .icon {color: #dadada; cursor: not-allowed; opacity: 1; }

/*.InputfieldSubmit .InputfieldContent, .InputfieldButton .InputfieldContent {
		display: block;
    padding:<?php echo $inputfield_padding ? ($inputfield_padding*2) . 'rem 0 ' . $inputfield_padding . 'rem' :''; ?>;
  background: rgba(255,255,255,.1); 
}*/
#pw-content-body .InputfieldForm{margin-bottom:0;}
#pw-content-body #wrap_AddPageBtn, #wrap_AddPageBtn .InputfieldContent {border:0;background:transparent;}
#wrap_AddPageBtn .InputfieldContent {padding:.25rem 0 .75rem;}
.InputfieldIsSecondary>.InputfieldContent, .InputfieldIsSecondary>.InputfieldHeader {background: rgba(0,0,0,.03);}
.InputfieldImage .gridImages {margin-right:0;}
.InputfieldImage:not(.InputfieldStateCollapsed)>.InputfieldContent ul.gridImages {margin-top:.25rem;}

.InputfieldImage:not(.InputfieldStateCollapsed)>.InputfieldContent li.gridImage,
.InputfieldImageEditAll .gridImage__overflow>img,
.InputfieldFileUpload .InputMask.ui-button,
.InputfieldImageUpload .InputMask.ui-button {
    <?php echo $input_radius ? 'border-radius:' . $input_radius . 'rem;' :''; ?>
    background:<?php echo hexRGBA($auto_color, 0.06) ; ?>;
    border-color:<?php echo hexRGBA($auto_color, 0.15) ; ?>;
    <?php echo $shadows ? 'box-shadow: 0 .25rem 1rem rgba(0,0,0,.15);' :''; ?>
}
li.gridImage .gridImage__trash {background:transparent;}
#pw-content-body .InputfieldImageEdit__buttons button {margin-bottom: 0;}


#pw-content-body .InputfieldImageListToggle {
    float: right;
    margin-right: .5em;
    position: relative;
    padding: .25rem;
    line-height: .8;
   <?php echo $input_radius ? 'border-radius:' . ($input_radius) . 'rem;' :''; ?>
    border: solid 1px transparent;
}
#pw-content-body .InputfieldImage .InputfieldHeader .InputfieldImageListToggle--active,
#pw-content-body .InputfieldImage .InputfieldHeader .InputfieldImageListToggle--active:hover {
    opacity: 1;
    color: <?php echo hexRGBA($auto_color, 0.6) ; ?>;
    background:rgba(255,255,255,0.3);
    border-color: <?php echo hexRGBA($auto_color, 0.15) ; ?>;
}

.InputfieldFieldset > .InputfieldHeader {background: linear-gradient(<?php echo hexRGBA($auto_color,0.01) ; ?> 50%,<?php echo hexRGBA($auto_color,.02) ; ?>)!important;}
li:not(.InputfieldSubmit):not(.InputfieldButton).InputfieldFieldset > .InputfieldContent { height: 100%; background:<?php echo hexRGBA($auto_color,.02) ; ?>!important;}
/* important over-rides because of unfortunate #_adminTheme inline style */

.Inputfields input:not([type=submit]):not([type=file]):not([type=checkbox]):not([type=radio]):not(.uk-form-blank),
.Inputfields textarea:not(.uk-form-blank),.Inputfields select.uk-select:not(.uk-form-blank),
.asmListItem,
.cke_chrome {<?php echo $input_radius ? 'border-radius:' . $input_radius . 'em;' :''; ?>}
.cke_chrome {overflow:hidden;}

.Inputfield_navigation_order .InputfieldContent.uk-form-controls.uk-form-controls-text {
    background: rgba(255,255,255,.05);
}

.Inputfields input:not([type=submit]):not([type=file]):not([type=checkbox]):not([type=radio]):not(.uk-form-blank),
.Inputfields textarea:not(.uk-form-blank) {
	background-color:<?php echo $input_bckgndcolor; ?>;
	transition: all 200ms ease-in-out 25ms;
}
#pw-content-body .tfw-input input[type=number]{background-color:<?php echo $input_bckgndcolor; ?>!important;}

.InputfieldHeader {
	<?php echo $inputfield_padding ? 'padding:'  . $inputfield_padding . 'rem ' . ($inputfield_padding / 2) . 'rem ' . $inputfield_padding . 'rem ' . $inputfield_padding . 'rem;' :''; ?>}
.InputfieldContent, .InputfieldWrapper label ~ .Inputfields {background:inherit;<?php echo $inputfield_padding ? 'padding: 0 ' . $inputfield_padding . 'rem ' . $inputfield_padding . 'rem;' :''; ?>}
/*.InputfieldFieldset>.InputfieldContent>.Inputfields {padding:0}*/

.InputfieldHeaderHidden+.InputfieldContent, .InputfieldHeaderHidden>.InputfieldContent {<?php echo $inputfield_padding ? 'padding-top:' . $inputfield_padding . 'rem;' :''; ?>}
.InputfieldStateCollapsed>.InputfieldHeader {<?php echo $inputfield_padding ? 'padding-bottom:' . $inputfield_padding . 'rem;' :''; ?>}
.InputfieldContent p:first-child, .LanguageSupport p:first-child {margin: 0 0 .33em;}
.InputfieldStateToggle + .InputfieldContent {height:auto;}


.Inputfields input:not([type=submit]):not([type=file]):not([type=checkbox]):not([type=radio]):not(.uk-form-blank):hover, 
.Inputfields textarea:not(.uk-form-blank):hover,
.Inputfields input:not([type=submit]):not([type=file]):not([type=checkbox]):not([type=radio]):not(.uk-form-blank):focus, 
.Inputfields textarea:not(.uk-form-blank):focus,
.Inputfields select.uk-select:not(.uk-form-blank):focus, 
.Inputfields select.uk-select:not(.uk-form-blank):hover,
.Inputfields .Inputfield_inputfield_widths .tfw-input input[type=number]:hover,
.Inputfields .Inputfield_inputfield_widths .tfw-input input[type=number]:focus
 {
	background-color:<?php echo $input_bckgndcolor_focus; ?>;
	border-color:<?php echo $input_bordercolor_focus; ?>;
	box-shadow: 0 0 .66em <?php echo hexRGBA($button_bckgndcolor, 0.6); ?>;
  outline:none;
}

#pw-content-body .tfw-input input[type=number]:hover,
#pw-content-body .tfw-input input[type=number]:focus {background-color:<?php echo $input_bckgndcolor_focus; ?>!important;}

.Inputfields input:not([type=submit]):not([type=file]):not([type=checkbox]):not([type=radio]):not(.uk-form-blank):hover:focus, 
.Inputfields textarea:not(.uk-form-blank):hover:focus,
#pw-content-body .tfw-input input[type=number]:hover:focus {
	background-color:<?php echo $input_bckgndcolor_focus; ?>;
	border-color:<?php echo $input_bordercolor_focus; ?>;
	box-shadow: 0 0 .66em <?php echo hexRGBA($auto_color, 0.3); ?>;
}
#pw-content-body select:not([multiple]):not([size]) optgroup {
	font-weight: 500;
	color: <?php echo hexRGBA($auto_color, 1); ?>;
  background-color:<?php echo hexRGBA($content_bckgndcolor, 0.8); ?>;
}

#pw-content-body select:not([multiple]):not([size]) option {
	font-weight: 400;
	color: <?php echo hexRGBA($auto_color, 0.7); ?>;
  background-color:<?php echo $content_bckgndcolor; ?>;
}
.uk-margin-right {margin-right:.75rem!important;}
::placeholder {opacity: 0.6;}

.InputfieldSubmit .InputfieldHeader,.InputfieldButton .InputfieldHeader{display:none;}
.Inputfield_submit_save.uk-margin-top{margin:0!important;}

.InputfieldSubmit .InputfieldContent .ui-button,.InputfieldButton .InputfieldContent .ui-button{display:inline;}
.Inputfields .Inputfield:not(.InputfieldSubmit):not(.InputfieldButton) + .InputfieldButton,
.Inputfields .Inputfield:not(.InputfieldSubmit):not(.InputfieldButton) + .InputfieldSubmit {margin-top:0!important}
.InputfieldSubmit {width:100%!important;background:transparent!important;}
.MinimalFieldset .Inputfield {outline:none;}
#pw-content-body .MinimalFieldset .Inputfield {border-radius:0;}
.MinimalFieldset > .InputfieldContent {background:transparent;}
.MinimalFieldset p.description {margin-bottom:.5em;}
#pw-content-body .ui-slider .ui-slider-handle { border: solid 1px #c7c7c7; width: 17px; height: 17px; border-radius: 50%; background: linear-gradient(#F8F8F8,#f1f1f1); box-shadow: 0 3px 5px RGBA(0,0,0,0.15); }

/* FieldsetDescriptionsExtended custom overwrites */
.description-extended {overflow:auto;padding-bottom:.5em;}

.description em::before {font-family:FontAwesome;content:"\f005";margin-right:.5rem;opacity:.6;}
.description em strong {font-weight:500;}
.description-extended h1,
.description-extended h2,
.description-extended h3,
.description-extended h4 {padding-left:1.5rem;font-weight:400;padding-right:80px;line-height:1.2;padding-top:0;margin:0!important;
}
.description-extended h1 {font-size:1.7em;}
.description-extended h2 {font-size: 1.45em;font-weight:500;padding-bottom:.25em;}
.description-extended p,
.description-extended ul,
.description-extended ol {padding-right:80px;padding-left:1.5rem}
.description-extended strong, .description-extended h2 strong, .description-extended h3 strong, .description-extended h4 strong {font-weight:500;}
.description-extended h4 {font-size:1em;	}
.InputfieldPageAutocomplete .description-extended p {margin-bottom: 1em !important;}
p a.field-help-reveal {float:right;}
p a.field-help-reveal:before {
content: '?';
font-size: .9rem;
font-weight: bold;
color: currentColor;
display: inline-block;
box-sizing: content-box;
border: solid 2px currentColor;
padding: .1em;
width: 1em;
height: 1em;
border-radius: 50%;
text-align: center;
line-height: .98;
margin: 0 .25em
}
.description-extended ol, .description-extended ul {margin-left: 1.1rem;}
#pw-content-body p a.field-help-reveal{text-decoration:none;display:block!important;}
#pw-content-body a.field-help-close {float:right;text-decoration:none;}

.Inputfield.InputfieldMarkup.InputfieldRowLast {outline:none;margin-bottom:1em;}
.InputfieldColumnWidthFirst.Inputfield.InputfieldMarkup.InputfieldRowLast {border:0;}		
		
.Inputfield.InputfieldMarkup:first-child {border:0;} 

#pw-content-body .ga_tables_wrapper .pw-table-responsive {margin:1.5rem 0;}
#pw-content-body .ga_tables_wrapper td:last-child, 
#pw-content-body .ga_tables_wrapper th:last-child {width:7.75rem;padding-right:.5em;}
#pw-content-body .ga_tables_wrapper th:nth-last-child(2),
#pw-content-body .ga_tables_wrapper td:nth-last-child(2) {background:rgba(0,0,0,.15);}
#pw-content-body .ga_tables_wrapper th:nth-last-child(2) {border-radius:0;}
#pw-content-body .ga_tables_wrapper td {vertical-align:middle;font-size:.8em;}	

@media (min-width: 200px),(min-width: 640px),(min-width: 960px),(min-width: 1400px) {
#main, #pw-footer .pw-container, #pw-masthead .pw-container, #pw-masthead-mobile .pw-container, .NotificationList .pw-container {padding-left:.75rem;padding-right:.75rem;}
#offcanvas-toggle {right:.75rem;}
}
#offcanvas-toggle {right:.75rem;}

@media screen and (max-width: 959px) {
#pw-content-head-buttons {margin-bottom:0;}
#pw-content-head-buttons button:first-child {padding:0 1rem;}
}

@media screen and (max-width:959px) {
header#pw-masthead {display:none;}
header#pw-masthead-mobile,
#offcanvas-toggle.uk-hidden {display:block!important;}
}

@media screen and (min-width:960px) {
header#pw-masthead {position: relative!important;top:0!important;height:auto;}
.uk-navbar-item, .uk-navbar-nav>li>a, .uk-navbar-toggle {padding:0 5px;}
header#pw-masthead-mobile,
#offcanvas-toggle.uk-hidden {display:none!important;}
}

@media screen and (min-width:960px) and (max-width:1735px) {
#NotificationBug {right: 430px;}
}
@media (max-width: 639px) {
#pw-content-head-buttons.uk-visible\@s {display: block!important;}
}

@media screen and (min-width:1080px) {
/*#pw-content-head-buttons button:first-child {padding:0 1rem;}*/
#pw-content-head-buttons .pw-button-dropdown-wrap {min-width:210px;}
}

.ProcessLogin div#content {display:flex;align-items:center;justify-content:center;height:100%;}
.ProcessLogin {background:<?php echo $body_bckgndcolor ? $body_bckgndcolor :''; ?> radial-gradient(<?php echo $body_bckgndcolor ? $body_bckgndcolor :''; ?> 10%, rgba(0,0,0,.22));}
.ProcessLogin *+.uk-margin{margin-top:0!important;}
.ProcessLogin .pw-notices{position:fixed;width:100%;left:0;top:0;}
.ProcessLogin .pw-notices .uk-alert-primary{background:#ddd;}
.ProcessLogin .pw-notices .notice-remove{display:block;}
.ProcessLogin #pw-mastheads header{display: none!important;}
.ProcessLogin #pw-content-body{    
	background: rgba(255,255,255,.05);
	border-radius: 1rem;
	border: solid 1px rgba(255,255,255,.15);
	<?php echo $shadows ? 'box-shadow: 0 0 3em rgba(0,0,0,.3);' :''; ?>
	overflow: hidden;
	padding: 1em;
}
.ProcessLogin #pw-content-body div:not(.uk-form-controls){float:left;}
.ProcessLogin #pw-content-body div:last-of-type:not(.uk-form-controls){float:right;}
.ProcessLogin .Inputfields.uk-grid{border-radius:0;}

.ProcessLogin #ProcessLoginForm #wrap_Inputfield_login_submit .ui-button{margin:20px 0 0 0;width: 100%;}
.ProcessLogin a:hover{text-decoration:none;}
#ProcessLoginForm .InputfieldContent{width:auto;flex-grow:1;padding:0;}

.ProcessLogin #ProcessLoginForm #wrap_login_name input,
.ProcessLogin #ProcessLoginForm #wrap_login_pass input {text-align:left;}

.ProcessLogin #ProcessLoginForm {
   	width: auto;
    max-width: 20rem;
    margin: 0 auto;
    padding: 1em;
    border-radius: .5rem;
    <?php echo $shadows ? 'box-shadow: 0 .2em 1em rgba(0,0,0,.2);' :''; ?>
}

#pw-content-body #ProcessLoginForm :not(.MinimalFieldset) .Inputfield {
    width: 100%;
		display: flex;
		align-items: center;
    border:0;
		margin: 0 0 .5em 0!important;
    overflow: visible;
}
.ProcessLogin #ProcessLoginForm #wrap_Inputfield_login_submit {margin-top:1em!important;}
#ProcessLoginForm label.InputfieldHeader {width:5em;text-align:left;flex-grow:0;font-size:.8em;}

#main.pw-container.uk-margin.uk-margin-large-bottom {margin:.5rem auto 0!important;}
header#pw-content-head {overflow:visible;}
#pw-content-head h1 {
color: <?php echo $currentpage_color ? $currentpage_color : getContrast($body_bckgndcolor); ?>;
<?php echo $spacesave_heading ? 'font-size:1.5rem;margin-bottom:.5rem;min-height:40px;line-height: 40px;display:inline-block;' : ''; ?>
}
<?php //Breadcrumb pw over-ride ?>
#pw-content-head>ul {<?php echo $spacesave_heading ? 'line-height:40px;float:left;margin:0;padding-bottom:0;' : ''; ?>}
#pw-content-head>ul>li {max-height: 40px;}



#pw-content-head-buttons :not(.pw-button-dropdown-wrap) button {padding:0 .5em;min-width:200px;}
#pw-content-head-buttons .pw-button-dropdown-wrap {display:flex;}
#pw-content-head-buttons button:first-child {flex-grow:1;margin-left:10px;}

.ui-button, .ui-button.ui-state-default, .ui-button.ui-state-hover {<?php echo $button_radius ? 'border-radius:' . $button_radius . 'rem;' :''; ?>}
.ui-corner-all, .ui-corner-bottom, .ui-corner-br, .ui-corner-right {<?php echo $button_radius ? 'border-bottom-right-radius:' . $button_radius . 'rem;' :''; ?>}
.ui-corner-all, .ui-corner-bl, .ui-corner-bottom, .ui-corner-left {<?php echo $button_radius ? 'border-bottom-left-radius:' . $button_radius . 'rem;' :''; ?>}
.ui-corner-all, .ui-corner-right, .ui-corner-top, .ui-corner-tr {<?php echo $button_radius ? 'border-top-right-radius:' . $button_radius . 'rem;' :''; ?>}
.ui-corner-all, .ui-corner-left, .ui-corner-tl, .ui-corner-top {<?php echo $button_radius ? 'border-top-left-radius:' . $button_radius . 'rem;' :''; ?>}

.ui-button, .ui-button.ui-state-default {<?php echo $button_bckgndcolor ? 'background-color:' . $button_bckgndcolor . ';' :''; ?>}
.ui-button.ui-state-hover,.ui-button:hover,.ui-button:focus,
.InputfieldFileUpload .InputMask.ui-button:hover, .InputfieldFileUpload .InputMask.ui-button:focus,
.InputfieldImageUpload .InputMask.ui-button:hover, .InputfieldImageUpload .InputMask.ui-button:focus {

<?php echo $button_bckgndcolor_hover ? 'background-color:' . $button_bckgndcolor_hover . ';' :''; ?>
box-shadow: 0 0 1.25rem <?php echo $button_bckgndcolor ?  '#75e294' :''; ?>;
}
button.ui-button:active {<?php echo $button_bckgndcolor_active ? 'background-color:' . $button_bckgndcolor_active . ';' :''; ?>}

button.ui-button:focus {outline:none;
<?php echo $button_bckgndcolor_hover ? 'border-color:' . $button_bckgndcolor_hover . ';' :''; ?>
}

a#tools-toggle.pw-dropdown-toggle {padding:0;}
.pw-user-nav .fa-lg {
	<?php 
  	if ($masthead_minheight && $masthead_minheight<40 ) {
    echo 'font-size:' . ($masthead_minheight-4) . 'px;';
    } else {echo 'font-size:32px;';
  } ?>
top:0;}

.uk-description-list>dt {font-size:1.2rem;font-weight:700;text-transform:uppercase;}
.uk-pagination>.uk-active>*, .uk-pagination>.uk-active>* a {background:#777;border-color:#777;}
.pw-content .lister_headline, #content #ProcessListerResults .lister_headline, h2#ProcessLogHeadline {margin-top:.25em!important;}
.pw-content ul.bookmarks {list-style:none;line-height:1.5;padding:0;font-size:1.5rem;}
.pw-content ul.bookmarks li {padding-bottom:.25em;}

.pw-content ul.bookmarks li a {
display:block;
position:relative;
line-height:1.4;
font-style:normal;
padding:0 0 0 2em;
max-width:31em;
}
.bookmarks li a:before {box-sizing:content-box;position:absolute;top:0;left:0;height:1.1em;width:1.1em;content:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 .5 16 16'%3E%3Cpath d='M6 12V4l6 4L6 12z' fill='%23FFFFFF'/%3E%3C/svg%3E");background-color:currentColor;border:solid .125em #FFF;border-radius:50%;box-shadow:0 0 .125em #999;}
.bookmarks li a:hover {text-decoration:none;}
.id-1052 #pw-content-body .fa-lg {width: .9em;text-align:left;}
<?php // Google Map Marker ?>
.InputfieldMapMarker input:focus {outline:0;}
.InputfieldMapMarker .uk-form-controls {display:flex;flex-wrap: wrap; align-items: center;}
.InputfieldMapMarker .description, .InputfieldMapMarker .InputfieldMapMarkerMap {width:100%;}
.InputfieldMapMarker .InputfieldMapMarkerToggle input + strong {font-weight:400;width:4em;}
.Inputfield .InputfieldMapMarkerToggle input:checked + strong {overflow: hidden;}
.InputfieldMapMarker .InputfieldMapMarkerToggle label {margin-left:-.25em;} 
.InputfieldMapMarker .InputfieldMapMarkerAddress {min-width:65%;flex-grow: 1;}
.InputfieldMapMarker .InputfieldMapMarkerToggle,
.InputfieldMapMarker .InputfieldMapMarkerZoom {width:9rem; flex-grow: 0;}
.InputfieldMapMarker .InputfieldMapMarkerToggle {padding-top:1.7rem;}
.InputfieldMapMarker .InputfieldMapMarkerLat, 
.InputfieldMapMarker .InputfieldMapMarkerLng {min-width:35%;flex-grow: 1;}
.InputfieldMapMarker .InputfieldMapMarkerToggle strong {display:inline-block;}
<?php // FieldDescriptionsExtended ?>
#pw-content-body .module-instructions {background:transparent;}
#pw-content-body .module-instructions h2,#pw-content-body .module-instructions h3 {color:inherit;}  
<?php // TemplateFieldWidths ?>  
#pw-content-body .tfw-tab-wrap {margin:0;}
#pw-content-body .tfw-fieldset {box-shadow:none;border: 1px solid <?php echo $auto_color ? hexRGBA($auto_color,.6) :''; ?>;}
#pw-content-body .tfw-tab {color: <?php echo $auto_color ? $auto_color :''; ?>;}
#pw-content-body .tfw-tab.active {background: <?php echo $auto_color ? hexRGBA($auto_color,.3) :''; ?>;border:0;}
#pw-content-body .tfw-item .ui-resizable-e {border-right-color: <?php echo $auto_color ? $auto_color :''; ?>;}
#pw-content-body .tfw-item .ui-resizable-handle.ui-resizable-e::after {background: <?php echo $auto_color ? $auto_color :''; ?>;}
#pw-content-body .tfw-tabs-content {margin:0;}
#pw-content-body .tfw-tab-content {overflow: hidden;padding:0;border:1px solid <?php echo $auto_color ? hexRGBA($auto_color,.3) :''; ?>;}
#pw-content-body .tfw-item {border:0;border-bottom: 1px solid <?php echo $auto_color ? hexRGBA($auto_color,.3) :''; ?>;}
#pw-content-body .tfw-item:last-child {border:0;}
<?php // modal overwrites ?> 
html.pw, html.pw body.ProcessPageLister.modal, 
html.pw body.ProcessPageLister.modal #main.pw-container, 
html.pw body.ProcessPageLister.modal div.PageList.ProcessPageLister, 
html.pw body.ProcessPageLister.modal div.PageList.ProcessPageLister form+ul+li.Inputfield.InputfieldWrapper {
    margin: 0;
    padding: 0;
    background: transparent;
    border: 0;
    overflow:visible;
    box-shadow:none;
}
body.modal-inline {height:auto;min-height:100%;}
body.ProcessPageLister #ProcessListerResults #ProcessListerTable {overflow:visible;}
html.pw body.ProcessPageLister.modal {padding:0 1.4rem;}
body.ProcessPageLister.modal #main.pw-container.uk-margin.uk-margin-large-bottom {margin:0 0 1rem 0!important;}

#pw-content-body input[type="radio"]{border: 2px solid <?php echo hexRGBA($auto_color, .3) ; ?>;transition-property:background-color,border,box-shadow;}
#pw-content-body input[type="radio"]:focus,
#pw-content-body input[type="checkbox"]:focus {box-shadow: 0 0 0 .25rem <?php echo hexRGBA($button_bckgndcolor, .3) ; ?>;}
#pw-content-body input[type="radio"]:checked {
	background-color: <?php echo $button_bckgndcolor ? hexRGBA($button_bckgndcolor, .8) :''; ?>;
	border-color: <?php echo hexRGBA($button_bckgndcolor, .8) ; ?>;
}
#pw-content-body input[type="radio"]+span,
#pw-content-body input[type="checkbox"]+span {font-weight:500;color:<?php echo hexRGBA($auto_color, .55) ; ?>;cursor:pointer;transition: all .2s ease-in-out;}
#pw-content-body input:not(:checked):focus + span,
#pw-content-body input:not(:checked):hover + span,
#pw-content-body input:not(:checked) + span:hover{color:<?php echo hexRGBA($auto_color, .75) ; ?>;}
#pw-content-body input:checked + span	{color:<?php echo hexRGBA($auto_color, 1) ; ?>;}
::-webkit-color-swatch,::-webkit-color-swatch-wrapper{border-color:<?php echo hexRGBA($auto_color, .5) ; ?>;border-radius:.2em;}
::-moz-color-swatch {border-color:<?php echo hexRGBA($auto_color, .5) ; ?>;border-radius:.2em;}
.Inputfield.pickers .Inputfields label.InputfieldHeader {width:40%;}
.Inputfield.pickers .Inputfields .InputfieldContent {width:auto;flex-grow:0;margin-top:.2em;margin-bottom:.2em;}
#pw-content-body .Inputfield.pickers input:not(.colorpicker) {width:auto;}
#pw-content-body .Inputfield.pickers input.colorpicker {width:9em;}
.Inputfield.pickers li.Inputfield, 
.Inputfield.pickers .Inputfields .InputfieldContent{display:flex;align-items:center;padding-top:0;padding-bottom:0;}
:not(pre)>code, :not(pre)>kbd, :not(pre)>samp {
    font-family: Consolas,monaco,monospace;
    font-size: .875rem;
    color: <?php echo hexRGBA($auto_color, 1) ; ?>;
    white-space: nowrap;
    padding: .25em .5em;
    background: <?php echo hexRGBA($auto_color, .08) ; ?>;
    overflow: auto;
    display: inline-flex;
    border: solid 1px <?php echo hexRGBA($auto_color, .3) ; ?>;
    border-radius: 3px;
}
.InputfieldMarkup ol, #pw-content-body .module-instructions ol {margin: 0 0 1.5em;padding:0;counter-reset:item;list-style:none!important;}
.InputfieldMarkup ol li{position:relative;min-height:2em;margin:0 0 .5em;counter-increment:item;line-height: 1.25;}
.InputfieldMarkup ol > ::before,.counter{display:flex;justify-content:center;align-items:center;content:counter(item);min-width:1.6em;min-height:1.6em;padding:.1em;
background:#C5C5C5;color:#FFF;border:.1em solid #FFF;border-radius:1.8em;text-shadow:0 0 .15em #666;box-shadow:0 0 .1em #999;}
.InputfieldMarkup ol ol > li::before{content:counters(item,".");background:#D8D8D8;border:0;box-shadow:none;}
@media screen and (min-width: 15.5rem) {
.InputfieldMarkup ol li {padding:.6em 0 0 3em;}
.InputfieldMarkup ol > ::before,.counter{position:absolute;top:0;left:0;font-size:1.25em;line-height:1.25;}
.InputfieldMarkup ol ol > li::before{font-size:.85rem;line-height:2;min-width:2.25em;min-height:2.25em;}
.InputfieldMarkup ol ol > li{position:relative;left:-2.5em;padding:.425em 0 0 2.5em;margin-right:-2.5em;}
.InputfieldMarkup ol ol > li{left:0;margin-right:0;}
}
.uk-select:not([multiple]):not([size]) {background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='16' viewBox='0 0 24 16'%3E%3Cpolygon fill='<?php echo hexRGBA($auto_color, 0.7) ; ?>' points='12 1 9 6 15 6'/%3E%3Cpolygon fill='<?php echo hexRGBA($auto_color, 0.7) ; ?>' points='12 13 9 8 15 8'/%3E%3C/svg%3E");}
#pw-content-body #ProcessFieldList .InputfieldMarkup,.asmContainer,.Inputfields .InputfieldIsOffset:not(.InputfieldColumnWidth) {margin-bottom:0;}
.Inputfield select+ol {margin-top:.5em;}
#pw-content-body .permission-title {font-weight: 500;}
.pw-no-select td:nth-child(2)>span:first-child,.ProcessField .pw-no-select td {line-height:2.1;}

/* Process Google Analytics Overwrites */
.Inputfield .InputfieldDatetime input.InputfieldDatetimeDatepicker {width:260px;}

#pw-content-body .ga_chart_lines{width:100%;height:200px;}
#pw-content-body canvas.jqplot-series-canvas {background:<?php echo hexRGBA($content_bckgndcolor, 0.3) ; ?>;}
#pw-content-body canvas.jqplot-series-shadowCanvas {outline: solid 2px <?php echo hexRGBA($content_bckgndcolor, 0.5) ; ?>;}
#pw-content-body .jqplot-highlighter-tooltip {
	font-size: 11px;
	border: 1px solid #dadada;
	border-radius:8px;
	padding: 6px;
	background-color: #ffffff;
	color: #555 !important;
	text-align: center;
	box-shadow: 0px 0px 6px rgba(0,0,0,0.2);
}
#pw-content-body .jqplot-highlighter-tooltip span.ga_highlight{
	color: #707070;
	font-weight: 500;
	font-size: 1.2rem;
	display:block;
}
#audience_visits_stats,#content_stats{margin-top:15px;}
.load{background:url(loading.svg) center center no-repeat;min-height:20px;}
span.compare {font-size:11px;display:block;float:right;font-weight:bold;}
#pw-content-body .plus{color:#03a403;}
#pw-content-body .minus{color:#fb9c2e;}
#pw-content-body a.ga_display_more_rows{font-size:1em;}
#pw-content-body #traffic_sources_keywords{margin-top:1.95rem;}
.ga_tables_wrapper table {display:none;}
.ga_tables_wrapper table:first-child {display:table;}
.total,.percent{display:block;float:left;border-radius:4px;}
.total{
	height:1.1em;
	width:53px;
	background-color:#e8e8e8;
	margin:2px 5px 0 0;
	border:solid 1px #e3e3e3;
}
.percent{height:calc(100% + 2px);margin:-1px;border-radius:4px;background:linear-gradient(#6699FF 66%,#4466FF);}
#pw-content-body table.ga_table {width: 100%;}
#pw-content-body .ga_header_links{margin-bottom:-1rem;}
#pw-content-body table.ga_table_highlight td{
	border-color: <?php echo hexRGBA($auto_color, .2) ; ?>;
	border-radius: <?php echo $content_radius ? $content_radius . 'rem' :'0'; ?>;
	padding: 10px;
	font-weight: 500;
	font-size: 1.25rem;
	background: linear-gradient(rgba(0,0,0,.01), rgba(0,0,0,.07));
	color: <?php echo hexRGBA($auto_color, 1) ; ?>;
}
#pw-content-body td div.desc{font-weight:normal;font-size:.75rem;color:<?php echo hexRGBA($auto_color, .5) ; ?>;}
#pw-content-body .jqplot-target {position:relative;color:<?php echo hexRGBA($auto_color, .5) ; ?>;font-family:Roboto,Arial,Helvetica,sans-serif;font-size:.75em;}


