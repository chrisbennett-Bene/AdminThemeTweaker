<?php namespace ProcessWire;

if ($this->showThemeTweaker != 1) {return;}

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
	    } else if ($type == 'errortxt') {
        $light_bckgnd = '#cd0a0a';
        $dark_bckgnd = '#FFCC00';
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

$fontFamily      = '-apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", Arial, sans-serif';
$bodyBckgnd      = ($this->body_bckgnd_color) ? $this->body_bckgnd_color : '#FFF';
$bodyContrast01   = hexRGBA(getContrast($bodyBckgnd), .01);
$bodyContrast03   = hexRGBA(getContrast($bodyBckgnd), .03);
$bodyContrast08   = hexRGBA(getContrast($bodyBckgnd), .08);
$bodyContrast10   = hexRGBA(getContrast($bodyBckgnd), .10);
$bodyContrast25   = hexRGBA(getContrast($bodyBckgnd), .25);
$bodyContrast33   = hexRGBA(getContrast($bodyBckgnd), .33);
$bodyContrast40   = hexRGBA(getContrast($bodyBckgnd), .40);
$bodyContrast50   = hexRGBA(getContrast($bodyBckgnd), .50);
$bodyContrast66   = hexRGBA(getContrast($bodyBckgnd), .66);
$bodyContrast75   = hexRGBA(getContrast($bodyBckgnd), .75);
$bodyContrast85   = hexRGBA(getContrast($bodyBckgnd), .85);
$errorText        = getContrast($bodyBckgnd, 'errortxt' );
$tabBorder        = getContrast($bodyBckgnd, 'tabborder');
$tabBorder50      = hexRGBA(getContrast($bodyBckgnd, 'tabborder'), .50);
$tabBckgndMuted   = hexRGBA(getContrast($bodyBckgnd, 'tab')      , .05);

$contentBckgnd    = ($this->content_bckgnd_color) ? $this->content_bckgnd_color : '#FFF';
$contentOpacity03 = hexRGBA($contentBckgnd, .03);
$contentOpacity05 = hexRGBA($contentBckgnd, .05);
$contentOpacity08 = hexRGBA($contentBckgnd, .08);
$contentOpacity15 = hexRGBA($contentBckgnd, .15);
$contentOpacity20 = hexRGBA($contentBckgnd, .20);
$contentOpacity30 = hexRGBA($contentBckgnd, .30);
$contentOpacity50 = hexRGBA($contentBckgnd, .50);
$contentOpacity60 = hexRGBA($contentBckgnd, .60);
$contentOpacity70 = hexRGBA($contentBckgnd, .70);
$contentOpacity75 = hexRGBA($contentBckgnd, .75);
$contentOpacity80 = hexRGBA($contentBckgnd, .80);
$contentOpacity90 = hexRGBA($contentBckgnd, .80);
$autoColor        = getContrast($contentBckgnd);
$autoOpacity01    = hexRGBA($autoColor, 0.01);
$autoOpacity03    = hexRGBA($autoColor, 0.03);
$autoOpacity05    = hexRGBA($autoColor, 0.05);
$autoOpacity08    = hexRGBA($autoColor, 0.08);
$autoOpacity15    = hexRGBA($autoColor, 0.15); 
$autoOpacity20    = hexRGBA($autoColor, 0.20);
$autoOpacity30    = hexRGBA($autoColor, 0.30); 
$autoOpacity40    = hexRGBA($autoColor, 0.40); 
$autoOpacity50    = hexRGBA($autoColor, 0.50); 
$autoOpacity60    = hexRGBA($autoColor, 0.60); 
$autoOpacity70    = hexRGBA($autoColor, 0.70);
$autoOpacity75    = hexRGBA($autoColor, 0.75); 
$autoOpacity80    = hexRGBA($autoColor, 0.80); 
$autoOpacity90    = hexRGBA($autoColor, 0.90); 

$contentRadius    = ($this->content_radius          ) ? $this->content_radius . 'em'       : '0'; 
$inputRadius      = ($this->input_radius            ) ? $this->input_radius   . 'rem'      : '0';
$buttonRadius     = ($this->button_radius           ) ? $this->button_radius  . 'rem'      : '0';
$linkColor        = ($this->link_color              ) ? $this->link_color                  : hexRGBA(getContrast($contentBckgnd, 'link'), .8);
$linkOpacity20    = ($this->link_color              ) ? hexRGBA($this->link_color,.2)      : hexRGBA(getContrast($bodyBckgnd,    'link'), .2);
$linkOpacity30    = ($this->link_color              ) ? hexRGBA($this->link_color,.3)      : hexRGBA(getContrast($bodyBckgnd,    'link'), .3);
$linkOpacity40    = ($this->link_color              ) ? hexRGBA($this->link_color,.4)      : hexRGBA(getContrast($bodyBckgnd,    'link'), .4);
$linkOpacity60    = ($this->link_color              ) ? hexRGBA($this->link_color,.6)      : hexRGBA(getContrast($bodyBckgnd,    'link'), .6);
$linkHoverColor   = ($this->linkhover_color         ) ? $this->linkhover_color             : hexRGBA(getContrast($contentBckgnd, 'link'));
$linkHoverBody    = ($this->linkhover_color         ) ? $this->linkhover_color             : getContrast($bodyBckgnd,'link');
$hoverOpacity50   = ($this->linkhover_color         ) ? hexRGBA($this->linkhover_color,.5) : hexRGBA(getContrast($bodyBckgnd,    'link'), .5);
$currentColor     = ($this->currentpage_color       ) ? $this->currentpage_color           : getContrast($bodyBckgnd);
$inputMargin      = ($this->input_margin            ) ? $this->input_margin  .'rem'        : '0';
$inputPadding     = ($this->inputfield_padding      ) ? $this->inputfield_padding .'rem'   : '0';
$inputBorder      = ($this->input_bordercolor       ) ? $this->input_bordercolor           : $autoOpacity30; 
$inputBorderFocus = ($this->input_bordercolor_focus ) ? $this->input_bordercolor_focus     : $autoOpacity40;
$inputBckgnd      = ($this->input_bckgndcolor       ) ? $this->input_bckgndcolor           : $autoOpacity05; 
$inputBckgndFocus = ($this->input_bckgndcolor_focus ) ? $this->input_bckgndcolor_focus     : $autoOpacity03;
$inputColor       = ($this->input_color             ) ? $this->input_color                 : $autoOpacity90; 
// Not yet set up in config
$primaryBckgnd    = ($this->primary_bckgnd          ) ? $this->primary_bckgnd              : $autoOpacity15;
$secondaryBckgnd  = ($this->secondary_bckgnd        ) ? $this->secondary_bckgnd            : $autoOpacity08;
$highlightColor   = ($this->highlight_color         ) ? $this->highlight_color             : $autoOpacity30;
//
$buttonBckgnd     = ($this->button_bckgndcolor      ) ? $this->button_bckgndcolor          : '#228B22'; 
$buttonBckHover   = ($this->buttonhover_bckgndcolor ) ? $this->buttonhover_bckgndcolor     : '#176117';
$buttonBckActive  = ($this->buttonactive_bckgndcolor) ? $this->buttonactive_bckgndcolor    : '#64ad64';
$buttonOpacity10  = hexRGBA($buttonBckgnd, .10);
$buttonOpacity30  = hexRGBA($buttonBckgnd, .30);  
$buttonOpacity75  = hexRGBA($buttonBckgnd, .75);                  
$headingColor     = ($this->heading_color           ) ? $this->heading_color               : getContrast($contentBckgnd, 'heading')    ;
$headingOpacity75 = hexRGBA($headingColor, .75);
$headingOpacity85 = hexRGBA($headingColor, .85);
$labelColor       = ($this->label_color             ) ? $this->label_color                 : $autoColor;
$labelCollapsed   = ($this->labelcollapsed_color    ) ? $this->labelcollapsed_color        : hexRGBA($labelColor, .7);
$labelTab01       = hexRGBA(getContrast($labelColor, 'tab'), .01);
$labelTab03       = hexRGBA(getContrast($labelColor, 'tab'), .03);

$mastheadBckgnd   = ($this->masthead_bckgnd_color   ) ? $this->masthead_bckgnd_color       : 'rgba(0,0,0,.55)';	 
$footerBckgnd     = ($this->footer_bckgnd_color     ) ? $this->footer_bckgnd_color         : 'rgba(0,0,0,.55)';
$footerColor      = ($this->footer_color) ? $this->footer_color                            : ($this->footer_bckgnd_color) 
                                                                                              ? hexRGBA(getContrast($this->footer_bckgnd_color) ,0.85)
                                                                                              : $bodyContrast85;
$footerMuted      = ($this->footer_color) ? hexRGBA(getContrast($this->footer_color),0.66): ($this->footer_bckgnd_color) 
                                                                                              ? hexRGBA(getContrast($this->footer_bckgnd_color) ,0.66)
                                                                                              : $bodyContrast66;
$validColor       = ($this->valid_color               ) ? $this->valid_color                    : '#03a403';
$warningColor     = ($this->warning_color             ) ? $this->warning_color                  : '#fb9c2e';
$tableZebra       = ($this->show_zebra                ) ? $autoOpacity01					    : 'transparent'   ;
$separatorColor   = ($this->separator_color           ) ? $this->separator_color                : $autoOpacity01  ;

$pagelistSize     = ($this->pagelist_fontsize         ) ? $this->pagelist_fontsize.'rem'        : '1rem';
$pagelistSubSize  = ($this->pagelistsub_fontsize      ) ? $this->pagelistsub_fontsize.'rem'     : '1em' ;
$treeBckgnd       = ($this->pagelist_item_bckgnd      ) ? $this->pagelist_item_bckgnd           : 'rgba(0,0,0,.25)';
$treeShowBckgnd   = ($this->pagelist_item_showbckgnd  ) ? $treeBckgnd                           : 'rgba(0,0,0,0)';
$treeBckgndHover  = ($this->pagelist_item_bckgndhover ) ? $this->pagelist_item_bckgndhover      : 'rgba(255,255,255,.08)';
$treeShowHover    = ($this->pagelist_item_showbckgnd  ) ? $treeBckgndHover                      : 'rgba(0,0,0,0)' ;
$treeOpenBckgnd   = ($this->pagelist_open_bckgnd      ) ? $this->pagelist_open_bckgnd           : 'rgba(0,0,0,.1)';
$treeShowOpen     = ($this->pagelist_item_showbckgnd  ) ? $treeOpenBckgnd                       : 'rgba(0,0,0,0)' ; 
$treeOpacity03    = ($this->pagelist_item_bckgnd      ) ? hexRGBA(getContrast($treeBckgnd),.03) : $bodyContrast03 ;
$treeOpacity10    = ($this->pagelist_item_bckgnd      ) ? hexRGBA(getContrast($treeBckgnd),.10) : $bodyContrast10 ;
$treeOpacity25    = ($this->pagelist_item_bckgnd      ) ? hexRGBA(getContrast($treeBckgnd),.25) : $bodyContrast25 ;
$treeOpacity40    = ($this->pagelist_item_bckgnd      ) ? hexRGBA(getContrast($treeBckgnd),.40) : $bodyContrast40 ;
$treeOpacity50    = ($this->pagelist_item_bckgnd      ) ? hexRGBA(getContrast($treeBckgnd),.50) : $bodyContrast50 ;
$treeOpacity80    = ($this->pagelist_item_bckgnd      ) ? hexRGBA(getContrast($treeBckgnd),.85) : $bodyContrast85 ;
$treeBorderColor  = ($this->pagelist_bordercolor      ) ? $this->pagelist_bordercolor           : hexRGBA(getContrast($bodyBckgnd, 'tab'), .20);
$treeShowborder   = ($this->pagelist_item_showborder  ) ? $treeBorderColor                      : 'rgba(0,0,0,0)' ;
$treeBorderHover  = ($this->pagelist_item_showborder  ) ? $linkOpacity40                        : hexRGBA(getContrast($bodyBckgnd, 'tab'), .40);
$treeShowHover    = ($this->pagelist_item_showborder  ) ? $treeBorderHover                      : 'rgba(0,0,0,0)' ;
$treeOpenBorder   = ($this->tree_open_border          ) ? $this->tree_open_border               : hexRGBA(getContrast($bodyBckgnd, 'tab'), .25);
$treeShowOpenBorder=($this->pagelist_item_showborder  ) ? $treeOpenBorder                       : 'rgba(0,0,0,0)' ; 
$treeSubBorder    = ($this->tree_sub_border           ) ? $this->tree_sub_border                : $treeOpenBorder; 
$treeShowSubBorder= ($this->pagelist_item_showborder  ) ? $treeSubBorder                        : 'rgba(0,0,0,0)' ;


$mastheadMin      = ($this->masthead_height) ? $this->masthead_height  : 55; 						
$logoMaxHeight    = ($mastheadMin<40)        ? ($mastheadMin-4) . 'px' : '32px' ;
$searchMaxHeight  = ($mastheadMin>44)        ? '40px'                  : 'inherit';
$searchPadding    = ($mastheadMin<44)        ? '2px 0'                 : 'inherit';
$searchFontSize   = ($mastheadMin<17)        ? '.9em'                  : 'inherit';
$navToggle        = ($mastheadMin<29)        ? '.8rem'                 : 'inherit';

if     ($mastheadMin<17) {$searchIconSize = ($mastheadMin - 5) . 'px';} 
elseif ($mastheadMin<30) {$searchIconSize = '12px';} 
elseif ($mastheadMin<40) {$searchIconSize = '14px';}	
else                     {$searchIconSize = '1rem';} 
	
if     ($mastheadMin<19) {$afterBorderWidth = '0 5px 3px 5px';}
elseif ($mastheadMin<26) {$afterBorderWidth = '0 6px 4px 6px';}
elseif ($mastheadMin<50) {$afterBorderWidth = '0 8px 8px 8px';}
else                     {$afterBorderWidth = '0 15px 15px 15px';} 


$cssVariables = ':root {
  --admin-font-family      :' . $fontFamily       . ';   
  --admin-body-bckgnd      :' . $bodyBckgnd       . '; 
  --admin-auto-color       :' . $autoColor        . ';
  --admin-auto-opacity-01  :' . $autoOpacity01    . '; 
  --admin-auto-opacity-03  :' . $autoOpacity03    . '; 
  --admin-auto-opacity-05  :' . $autoOpacity05    . '; 
  --admin-auto-opacity-08  :' . $autoOpacity08    . '; 
  --admin-auto-opacity-15  :' . $autoOpacity15    . ';
  --admin-auto-opacity-20  :' . $autoOpacity20    . ';
  --admin-auto-opacity-30  :' . $autoOpacity30    . ';
  --admin-auto-opacity-40  :' . $autoOpacity40    . ';
  --admin-auto-opacity-50  :' . $autoOpacity50    . ';
  --admin-auto-opacity-60  :' . $autoOpacity60    . ';
  --admin-auto-opacity-70  :' . $autoOpacity70    . ';
  --admin-auto-opacity-75  :' . $autoOpacity75    . ';
  --admin-auto-opacity-80  :' . $autoOpacity80    . ';
  --admin-auto-opacity-90  :' . $autoOpacity90    . ';
  --content-bckgnd         :' . $contentBckgnd    . ';
  --content-opacity-03     :' . $contentOpacity03 . '; 
  --content-opacity-05     :' . $contentOpacity05 . '; 
  --content-opacity-08     :' . $contentOpacity08 . '; 
  --content-opacity-15     :' . $contentOpacity15 . '; 
  --content-opacity-20     :' . $contentOpacity20 . '; 
  --content-opacity-30     :' . $contentOpacity30 . '; 
  --content-opacity-50     :' . $contentOpacity50 . '; 
  --content-opacity-60     :' . $contentOpacity60 . '; 
  --content-opacity-70     :' . $contentOpacity70 . ';
  --content-opacity-75     :' . $contentOpacity75 . '; 
  --content-opacity-80     :' . $contentOpacity80 . '; 
  --content-opacity-90     :' . $contentOpacity90 . '; 
  --admin-error-txt        :' . $errorText        . '; 
  --masthead-min-height    :' . $mastheadMin.'px' . ';
  --logo-max-height        :' . $logoMaxHeight    . '; 
  --search-max-height      :' . $searchMaxHeight  . '; 
  --search-font-size       :' . $searchFontSize   . ';
  --search-icon-size       :' . $searchIconSize   . '; 
  --search-padding         :' . $searchPadding    . ';  
  --navtoggle              :' . $navToggle        . ';
  --after-border-width     :' . $afterBorderWidth . ';
  --admin-content-radius   :' . $contentRadius    . ';
  --admin-input-radius     :' . $inputRadius      . ';
  --admin-button-radius    :' . $buttonRadius     . ';
  --admin-link             :' . $linkColor        . ';
  --admin-link-hover       :' . $linkHoverColor   . ';
  --admin-link-hover-body  :' . $linkHoverBody    . ';
  --admin-hover-opacity-5  :' . $hoverOpacity50   . ';
  --admin-link-opacity-2   :' . $linkOpacity20    . ';
  --admin-link-opacity-3   :' . $linkOpacity30    . ';
  --admin-link-opacity-4   :' . $linkOpacity40    . ';
  --admin-link-opacity-6   :' . $linkOpacity60    . ';
  --admin-current-color    :' . $currentColor     . ';
  --admin-input-margin     :' . $inputMargin      . ';
  --admin-input-padding    :' . $inputPadding     . ';
  --admin-input-border     :' . $inputBorder      . ';
  --admin-input-bord-focus :' . $inputBorderFocus . ';
  --admin-input-bckg       :' . $inputBckgnd      . ';
  --admin-input-bckg_focus :' . $inputBckgndFocus . ';
  --admin-input-color      :' . $inputColor       . ';
  --admin-primary-color    :' . $primaryBckgnd    . ';
  --admin-secondary-color  :' . $secondaryBckgnd  . ';
  --admin-highlight-color  :' . $highlightColor   . ';
  --button-bckgnd-color    :' . $buttonBckgnd     . ';
  --button-opacity-3       :' . $buttonOpacity30  . ';
  --button-opacity-10      :' . $buttonOpacity10  . ';
  --button-opacity-75      :' . $buttonOpacity75  . ';
  --button-bckgnd-hover    :' . $buttonBckHover   . ';
  --button-bckgnd-active   :' . $buttonBckActive  . ';
  --heading-color          :' . $headingColor     . ';
  --heading-opacity-75     :' . $headingOpacity75 . ';
  --heading-opacity-85     :' . $headingOpacity85 . ';
  --label-color            :' . $labelColor       . ';
  --label-color-collapsed  :' . $labelCollapsed   . ';
  --label-tab-opacity-01   :' . $labelTab01       . ';
  --label-tab-opacity-03   :' . $labelTab03       . ';
  --admin-body-contrast-01 :' . $bodyContrast01   . ';
  --admin-body-contrast-03 :' . $bodyContrast03   . ';
  --admin-body-contrast-08 :' . $bodyContrast08   . ';
  --admin-body-contrast-33 :' . $bodyContrast33   . ';
  --admin-body-contrast-40 :' . $bodyContrast40   . ';
  --admin-body-contrast-50 :' . $bodyContrast50   . ';
  --admin-body-contrast-66 :' . $bodyContrast66   . ';
  --admin-body-contrast-75 :' . $bodyContrast75   . ';
  --admin-body-contrast-85 :' . $bodyContrast85   . ';
  --admin-tab-border       :' . $tabBorder        . ';
  --admin-tab-border-50    :' . $tabBorder50      . ';
  --admin-tab-bckgnd-muted :' . $tabBckgndMuted   . ';
  --admin-masthead-bckgnd  :' . $mastheadBckgnd   . ';
  --admin-footer-bckgnd    :' . $footerBckgnd     . ';
  --admin-footer-color     :' . $footerColor      . ';
  --admin-footer-muted     :' . $footerMuted      . ';
  --admin-valid            :' . $validColor       . '; 
  --admin-warning          :' . $warningColor     . ';
  --admin-table-zebra      :' . $tableZebra       . ';
  --admin-separator-color  :' . $separatorColor   . ';
  --admin-tree-main-size   :' . $pagelistSize     . ';   
  --admin-tree-sub-size    :' . $pagelistSubSize  . ';
  --admin-tree-showbckgnd  :' . $treeShowBckgnd   . ';  
  --admin-tree-bckgnd      :' . $treeBckgnd       . ';
  --admin-tree-bckgndhover :' . $treeBckgndHover  . ';  
  --admin-tree-showhover   :' . $treeShowHover    . ';
  --admin-tree-open-bckgnd :' . $treeOpenBckgnd   . ';
  --admin-tree-show-open   :' . $treeShowOpen     . ';
  --admin-tree-auto-op-03  :' . $treeOpacity03    . ';
  --admin-tree-auto-op-10  :' . $treeOpacity10    . ';
  --admin-tree-auto-op-25  :' . $treeOpacity25    . ';
  --admin-tree-auto-op-40  :' . $treeOpacity40    . ';
  --admin-tree-auto-op-50  :' . $treeOpacity50    . ';
  --admin-tree-auto-op-80  :' . $treeOpacity80    . '; 
  --admin-tree-bordercolor :' . $treeBorderColor  . ';
  --admin-tree-showborder  :' . $treeShowborder   . ';
  --admin-tree-borderhover :' . $treeBorderHover  . ';
  --admin-showborder-hover :' . $treeShowHover    . ';  
  --admin-tree-open-border :' . $treeOpenBorder   . ';
  --admin-show-open-border :' . $treeShowOpenBorder . ';
  --admin-tree-sub-border  :' . $treeSubBorder    . ';
  --admin-show-sub-border  :' . $treeShowSubBorder. ';
';
$conditionalVariables = '';
if ($this->spacesave_tabs) {
	
    $spaceSaveTabSetting = '  --spacesaver-tab-padding : .7em 1em;  
  --spacesaver-font-size   : .85rem;
';  
  $conditionalVariables .= $spaceSaveTabSetting;
  
}
if ($this->spacesave_heading) {
	
	$spaceSaveSetting = '  --spacesaver-head-font   : 1.5rem;   
  --spacesaver-head-margin : 0.5rem; 
  --spacesaver-head-min    : 40px; 
  --spacesaver-head-display: inline-block; 
  --spacesaver-float       : left; 
  --spacesaver-zero        : 0;   
'; 
  $conditionalVariables .= $spaceSaveSetting;
}

$svgIncVariables = '.compare.minus:before{content: 
url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3E%3Cpolygon points=\'0,0 16,0 8,13.86\' style=\'fill:%23'     . ltrim($warningColor, '#').';\'/%3E%3C/svg%3E");}';
$svgIncVariables .= '.compare.plus:before {content: 
url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3E%3Cpolygon points=\'0,13.86 16,13.86 8,0\' style=\'fill:%23' . ltrim($validColor,   '#').';\'/%3E%3C/svg%3E");}';