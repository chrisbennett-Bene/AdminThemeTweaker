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
$font_family      = '-apple-system, BlinkMacSystemFont, Roboto, "Helvetica Neue", Arial, sans-serif';
$body_bckgnd      = $tweaker->body_bckgnd_color    ? $tweaker->body_bckgnd_color    : '#FFF';
$content_bckgnd   = $tweaker->content_bckgnd_color ? $tweaker->content_bckgnd_color : '#FFF'; 
$auto_color       = getContrast($content_bckgnd);
$content_radius   = $tweaker->content_radius; 
$input_radius     = $tweaker->input_radius;									
$button_radius    = $tweaker->button_radius;									
$spacesave_tab    = $tweaker->spacesave_tabs; 				
$spacesave_head   = $tweaker->spacesave_heading;
$shadows          = $tweaker->show_shadows;	
$table_zebra      = $tweaker->show_zebra;
$label_color      = $tweaker->label_color;
$label_collapsed  = $tweaker->labelcollapsed_color;
$heading_color    = $tweaker->heading_color;
$current_color    = $tweaker->currentpage_color; 
$link_color       = $tweaker->link_color;
$linkhover_color  = $tweaker->linkhover_color;
$button_bckgnd    = $tweaker->button_bckgndcolor; 
$button_hover     = $tweaker->buttonhover_bckgndcolor;
$button_active    = $tweaker->buttonactive_bckgndcolor;
$input_margin     = $tweaker->input_margin;
$input_padding    = $tweaker->inputfield_padding;
$input_border     = $tweaker->input_bordercolor; 
$inp_border_focus = $tweaker->input_bordercolor_focus;
$input_bckgnd     = $tweaker->input_bckgndcolor; 
$input_bckg_focus = $tweaker->input_bckgndcolor_focus;
$input_color      = $tweaker->input_color; 
$pagelist_size    = $tweaker->pagelist_fontsize;
$pagelistsub_size = $tweaker->pagelistsub_fontsize;
$tree_showbckgnd  = $tweaker->pagelist_item_showbckgnd;
$tree_bckgnd      = $tweaker->pagelist_item_bckgnd;
$tree_bckgndhover = $tweaker->pagelist_item_bckgndhover;
$tree_open_bckgnd = $tweaker->pagelist_open_bckgnd;
$tree_showborder  = $tweaker->pagelist_item_showborder;
$tree_bordercolor = '';
$tree_open_border = '';
$separator_color  = '';
$masthead_min     = $tweaker->masthead_height ? $tweaker->masthead_height : 55; 						
$logo_maxHeight   = ( $masthead_min<40 ) ? ($masthead_min-4) . 'px' : '32px' ;
$search_maxHeight = ( $masthead_min>44 ) ? '40px'  : 'inherit';
$search_padding   = ( $masthead_min<44 ) ? '2px 0' : 'inherit';
$search_font_size = ( $masthead_min<17 ) ? '.9em'  : 'inherit';
$navtoggle        = ( $masthead_min<29 ) ? '.8rem' : 'inherit';

if     ( $masthead_min<17 ) {$search_icon_size = ($masthead_min - 5) . 'px';} 
elseif ( $masthead_min<30 ) {$search_icon_size = '12px';} 
elseif ( $masthead_min<40 ) {$search_icon_size = '14px';}	
else                        {$search_icon_size = '1rem';} 
	
if     ( $masthead_min<19 ) {$after_border_width = '0 5px 3px 5px';}
elseif ( $masthead_min<26 ) {$after_border_width = '0 6px 4px 6px';}
elseif ( $masthead_min<50 ) {$after_border_width = '0 8px 8px 8px';}
else                        {$after_border_width = '0 15px 15px 15px';} 

$masthead_bckgnd = $tweaker->masthead_bckgnd_color;	
$masthead_color  = $tweaker->masthead_color;
$footer_bckgnd   = $tweaker->footer_bckgnd_color;
$footer_color    = $tweaker->footer_color;

$valid_color     = $tweaker->valid_color   ? $tweaker->valid_color   : '#03a403';
$warning_color   = $tweaker->warning_color ? $tweaker->warning_color : '#fb9c2e';

$primary_color   = $tweaker->primary_color;
$secondary_color = $tweaker->secondary_color;
$highlight_color = $tweaker->highlight_color;

?>
:root {
  --admin-font-family      :<?php echo $font_family                         ; ?>;   
  --admin-body-bckgnd      :<?php echo $body_bckgnd                         ; ?>; 
  --admin-auto-color       :<?php echo $auto_color                          ; ?>;
  --admin-auto-opacity-01  :<?php echo hexRGBA($auto_color, 0.01)           ; ?>; 
  --admin-auto-opacity-03  :<?php echo hexRGBA($auto_color, 0.03)           ; ?>; 
  --admin-auto-opacity-05  :<?php echo hexRGBA($auto_color, 0.05)           ; ?>; 
  --admin-auto-opacity-08  :<?php echo hexRGBA($auto_color, 0.08)           ; ?>; 
  --admin-auto-opacity-15  :<?php echo hexRGBA($auto_color, 0.15)           ; ?>;
  --admin-auto-opacity-20  :<?php echo hexRGBA($auto_color, 0.20)           ; ?>;
  --admin-auto-opacity-30  :<?php echo hexRGBA($auto_color, 0.30)           ; ?>;
  --admin-auto-opacity-40  :<?php echo hexRGBA($auto_color, 0.40)           ; ?>;
  --admin-auto-opacity-50  :<?php echo hexRGBA($auto_color, 0.50)           ; ?>;
  --admin-auto-opacity-60  :<?php echo hexRGBA($auto_color, 0.60)           ; ?>;
  --admin-auto-opacity-70  :<?php echo hexRGBA($auto_color, 0.70)           ; ?>;
  --admin-auto-opacity-75  :<?php echo hexRGBA($auto_color, 0.75)           ; ?>;
  --admin-auto-opacity-80  :<?php echo hexRGBA($auto_color, 0.80)           ; ?>;
  --admin-auto-opacity-90  :<?php echo hexRGBA($auto_color, 0.90)           ; ?>;
  --content-bckgnd         :<?php echo $content_bckgnd                      ; ?>;
  --content-opacity-03     :<?php echo hexRGBA($content_bckgnd, 0.03)       ; ?>; 
  --content-opacity-05     :<?php echo hexRGBA($content_bckgnd, 0.05)       ; ?>; 
  --content-opacity-08     :<?php echo hexRGBA($content_bckgnd, 0.08)       ; ?>; 
  --content-opacity-15     :<?php echo hexRGBA($content_bckgnd, 0.15)       ; ?>;
  --content-opacity-20     :<?php echo hexRGBA($content_bckgnd, 0.20)       ; ?>;
  --content-opacity-30     :<?php echo hexRGBA($content_bckgnd, 0.30)       ; ?>;
  --content-opacity-50     :<?php echo hexRGBA($content_bckgnd, 0.50)       ; ?>;
  --content-opacity-60     :<?php echo hexRGBA($content_bckgnd, 0.60)       ; ?>;
  --content-opacity-70     :<?php echo hexRGBA($content_bckgnd, 0.70)       ; ?>;
  --content-opacity-75     :<?php echo hexRGBA($content_bckgnd, 0.75)       ; ?>;
  --content-opacity-80     :<?php echo hexRGBA($content_bckgnd, 0.80)       ; ?>;
  --content-opacity-90     :<?php echo hexRGBA($content_bckgnd, 0.90)       ; ?>;
  --admin-error-txt        :<?php echo getContrast($body_bckgnd,'errortxt') ; ?>; 
  --masthead-min-height    :<?php echo $masthead_min .'px'                  ; ?>;
  --logo-max-height        :<?php echo $logo_maxHeight                      ; ?>; 
  --search-max-height      :<?php echo $search_maxHeight                    ; ?>; 
  --search-font-size       :<?php echo $search_font_size                    ; ?>;
  --search-icon-size       :<?php echo $search_icon_size                    ; ?>; 
  --search-padding         :<?php echo $search_padding                      ; ?>;  
  --navtoggle              :<?php echo $navtoggle                           ; ?>; 
  --after-border-width     :<?php echo $after_border_width                  ; ?>;  
  --admin-content-radius   :<?php echo $content_radius   ? $content_radius . 'em'                         : '0'                                                  ; ?>;
  --admin-input-radius     :<?php echo $input_radius     ? $input_radius   . 'rem'                        : '0'                                                  ; ?>;
  --admin-button-radius    :<?php echo $button_radius    ? $button_radius  . 'rem'                        : '0'                                                  ; ?>;
  --admin-link             :<?php echo $link_color       ? $link_color                                    : hexRGBA(getContrast($content_bckgnd, 'link'), .8)    ; ?>;
  --admin-link-hover       :<?php echo $linkhover_color  ? $linkhover_color                               : hexRGBA(getContrast($content_bckgnd, 'link'))        ; ?>;
  --admin-link-hover-body  :<?php echo $linkhover_color  ? $linkhover_color                               : getContrast($body_bckgnd,'link')                     ; ?>;
  --admin-hover-opacity-5  :<?php echo $linkhover_color  ? hexRGBA($linkhover_color,.5)                   : hexRGBA(getContrast($body_bckgnd,'link'),.5)         ; ?>; 
  --admin-current-color    :<?php echo $current_color    ? $current_color                                 : getContrast($body_bckgnd)                            ; ?>;
  --admin-link-opacity-6   :<?php echo $link_color       ? hexRGBA($link_color,.6)                        : hexRGBA(getContrast($body_bckgnd,'link'),.6)         ; ?>;  
  --admin-link-opacity-4   :<?php echo $link_color       ? hexRGBA($link_color,.4)                        : hexRGBA(getContrast($body_bckgnd,'link'),.4)         ; ?>;
  --admin-link-opacity-3   :<?php echo $link_color       ? hexRGBA($link_color,.3)                        : hexRGBA(getContrast($body_bckgnd,'link'),.3)         ; ?>;
  --admin-link-opacity-2   :<?php echo $link_color       ? hexRGBA($link_color,.2)                        : hexRGBA(getContrast($body_bckgnd,'link'),.2)         ; ?>; 
  --admin-input-margin     :<?php echo $input_margin     ? $input_margin  .'rem'                          : '0'                                                  ; ?>;
  --admin-input-padding    :<?php echo $input_padding    ? $input_padding .'rem'                          : '0'                                                  ; ?>;
  --admin-input-border     :<?php echo $input_border     ? $input_border                                  : 'var(--admin-auto-opacity-30)'                       ; ?>;  
  --admin-input-bord-focus :<?php echo $inp_border_focus ? $inp_border_focus                              : 'var(--admin-auto-opacity-40)'                       ; ?>;   
  --admin-input-bckg       :<?php echo $input_bckgnd     ? $input_bckgnd                                  : 'var(--admin-auto-opacity-05)'                       ; ?>;
  --admin-input-bckg_focus :<?php echo $input_bckg_focus ? $input_bckg_focus                              : 'var(--admin-auto-opacity-03)'                       ; ?>;
  --admin-input-color      :<?php echo $input_color      ? $input_color                                   : 'var(--admin-auto-opacity-90)'                       ; ?>;
  --admin-primary-color    :<?php echo $primary_color    ? $primary_color                                 : 'var(--admin-auto-opacity-15)'                       ; ?>;
  --admin-secondary-color  :<?php echo $secondary_color  ? secondary_color                                : 'var(--admin-auto-opacity-08)'                       ; ?>; 
  --admin-highlight-color  :<?php echo $highlight_color  ? highlight_color                                : 'var(--admin-auto-opacity-30)'                       ; ?>; 
  --button-bckgnd-color    :<?php echo $button_bckgnd    ? $button_bckgnd                                 : '#228B22'                                            ; ?>;
  --button-opacity-75      :<?php echo $button_bckgnd    ? hexRGBA($button_bckgnd,.75)                    : hexRGBA('#228B22',.75)                               ; ?>;
  --button-opacity-3       :<?php echo $button_bckgnd    ? hexRGBA($button_bckgnd,.3)                     : hexRGBA('#228B22',.3)                                ; ?>;
  --button-opacity-10      :<?php echo $button_bckgnd    ? hexRGBA($button_bckgnd,.10)                    : hexRGBA('#228B22',.10)                                ; ?>;
  --button-bckgnd-hover    :<?php echo $button_hover     ? $button_hover                                  : '#176117'                                            ; ?>;
  --button-bckgnd-active   :<?php echo $button_active    ? $button_active                                 : '#64ad64'                                            ; ?>; 
  --heading-color          :<?php echo $heading_color    ? $heading_color                                 : getContrast($content_bckgnd, 'heading')              ; ?>;  
  --heading-opacity-85     :<?php echo $heading_color    ? hexRGBA($heading_color, .85)                   : hexRGBA(getContrast($content_bckgnd, 'heading'), .85); ?>;
  --heading-opacity-75     :<?php echo $heading_color    ? hexRGBA($heading_color, .75)                   : hexRGBA(getContrast($content_bckgnd, 'heading'), .75); ?>;
  --label-color            :<?php echo $label_color      ? $label_color                                   : $auto_color                                          ; ?>;
  --label-color-collapsed  :<?php echo $label_collapsed  ? hexRGBA($label_color, .7)                      : hexRGBA(getContrast($content_bckgnd, 'heading'), .7) ; ?>;
  --label-tab-opacity-01   :<?php echo $label_color      ? hexRGBA(getContrast($label_color, 'tab'), .01) : hexRGBA(getContrast($content_bckgnd, 'tab'), .01)    ; ?>; 
  --label-tab-opacity-03   :<?php echo $label_color      ? hexRGBA(getContrast($label_color, 'tab'), .03) : hexRGBA(getContrast($content_bckgnd, 'tab'), .03)    ; ?>; 
  --spacesaver-tab-padding :<?php echo $spacesave_tab    ? '.7em 1em'                                     : 'inherit'                                            ; ?>;  
  --spacesaver-font-size   :<?php echo $spacesave_tab    ? '.85rem'                                       : 'inherit'                                            ; ?>;  
  --spacesaver-head-font   :<?php echo $spacesave_head   ? '1.5rem'                                       : 'inherit'                                            ; ?>;  
  --spacesaver-head-margin :<?php echo $spacesave_head   ? '.5rem'                                        : 'inherit'                                            ; ?>;
  --spacesaver-head-min    :<?php echo $spacesave_head   ? '40px'                                         : 'inherit'                                            ; ?>; 
  --spacesaver-head-display:<?php echo $spacesave_head   ? 'inline-block'                                 : 'inherit'                                            ; ?>;   
  --spacesaver-float       :<?php echo $spacesave_head   ? 'left'                                         : 'inherit'                                            ; ?>; 
  --spacesaver-zero        :<?php echo $spacesave_head   ? '0'                                            : 'inherit'                                            ; ?>;   
  --admin-tree-main-size   :<?php echo $pagelist_size    ? $pagelist_size    .'rem'                       : '1rem'                                               ; ?>;   
  --admin-tree-sub-size    :<?php echo $pagelistsub_size ? $pagelistsub_size .'rem'                       : '1em'                                                ; ?>;
  --admin-tree-bckgnd      :<?php echo $tree_bckgnd      ? $tree_bckgnd                                   : 'rgba(0,0,0,.35)'                                    ; ?>;       
  --admin-tree-showbckgnd  :<?php echo $tree_showbckgnd  ? 'var(--admin-tree-bckgnd)'                     : 'rgba(0,0,0,0)'                                      ; ?>; 
  --admin-tree-bckgndhover :<?php echo $tree_bckgndhover ? $tree_bckgndhover                              : 'rgba(255,255,255,.08)'                              ; ?>;  
  --admin-tree-showhover   :<?php echo $tree_showbckgnd  ? 'var(--admin-tree-bckgndhover)'                : 'rgba(0,0,0,0)'                                      ; ?>; 
  --admin-tree-open-bckgnd :<?php echo $tree_open_bckgnd ? $tree_open_bckgnd                              : 'rgba(0,0,0,.1)'                                     ; ?>; 
  --admin-tree-show-open   :<?php echo $tree_showbckgnd  ? 'var(--admin-tree-open-bckgnd)'                : 'rgba(0,0,0,0)'                                      ; ?>;
  --admin-tree-auto-op-03  :<?php echo $tree_bckgnd      ? hexRGBA(getContrast($tree_bckgnd), .03)        : hexRGBA(getContrast($body_bckgnd), .03)              ; ?>;
  --admin-tree-auto-op-10  :<?php echo $tree_bckgnd      ? hexRGBA(getContrast($tree_bckgnd), .10)        : hexRGBA(getContrast($body_bckgnd), .10)              ; ?>;
  --admin-tree-auto-op-25  :<?php echo $tree_bckgnd      ? hexRGBA(getContrast($tree_bckgnd), .25)        : hexRGBA(getContrast($body_bckgnd), .25)              ; ?>;  
  --admin-tree-auto-op-40  :<?php echo $tree_bckgnd      ? hexRGBA(getContrast($tree_bckgnd), .40)        : hexRGBA(getContrast($body_bckgnd), .40)              ; ?>;   
  --admin-tree-auto-op-50  :<?php echo $tree_bckgnd      ? hexRGBA(getContrast($tree_bckgnd), .50)        : hexRGBA(getContrast($body_bckgnd), .50)              ; ?>; 
  --admin-tree-auto-op-80  :<?php echo $tree_bckgnd      ? hexRGBA(getContrast($tree_bckgnd), .80)        : hexRGBA(getContrast($body_bckgnd), .80)              ; ?>;
  --admin-tree-bordercolor :<?php echo $tree_bordercolor ? $tree_bordercolor                              : hexRGBA(getContrast($body_bckgnd,'tab'),.2)          ; ?>;
  --admin-tree-showborder  :<?php echo $tree_showborder  ? 'var(--admin-tree-bordercolor)'                : 'rgba(0,0,0,0)'                                      ; ?>;  
  --admin-tree-borderhover :<?php echo $tree_bckgnd      ? 'var(--admin-link-opacity-4)'                  : hexRGBA(getContrast($body_bckgnd,'tab'),.4)          ; ?>;
  --admin-showborder-hover :<?php echo $tree_showborder  ? 'var(--admin-tree-bordercolor)'                : 'rgba(0,0,0,0)'                                      ; ?>;
  --admin-tree-open-border :<?php echo $tree_open_border ? $tree_open_border                              : hexRGBA(getContrast($body_bckgnd,'tab'),.25)         ; ?>;
  --admin-show-open-border :<?php echo $tree_showborder  ? 'var(--admin-tree-open-border)'                : 'rgba(0,0,0,0)'                                      ; ?>;
  --admin-tree-sub-border  :<?php echo $tree_open_border ? $tree_open_border                              : hexRGBA(getContrast($tree_open_bckgnd,'tab'), .1)    ; ?>;
  --admin-show-sub-border  :<?php echo $tree_showborder  ? 'var(--admin-tree-open-border)'                : 'rgba(0,0,0,0)'                                      ; ?>;
  --admin-separator-color  :<?php echo $separator_color  ? $separator_color                               : hexRGBA($auto_color,0.1)                             ; ?>;
  --admin-table-zebra      :<?php echo $table_zebra      ? 'var(--admin-auto-opacity-01)'                 : 'inherit'                                            ; ?>;
  --admin-masthead-bckgnd  :<?php echo $masthead_bckgnd  ? $masthead_bckgnd                               : 'rgba(0,0,0,.55)'                                    ; ?>;
  --admin-footer-bckgnd    :<?php echo $footer_bckgnd    ? $footer_bckgnd                                 : 'rgba(0,0,0,.55)'                                    ; ?>;
  --admin-body-contrast-01 :<?php echo hexRGBA(getContrast($body_bckgnd), .01)            ; ?>; 
  --admin-body-contrast-03 :<?php echo hexRGBA(getContrast($body_bckgnd), .03)            ; ?>;
  --admin-body-contrast-08 :<?php echo hexRGBA(getContrast($body_bckgnd), .08)            ; ?>;
  --admin-body-contrast-33 :<?php echo hexRGBA(getContrast($body_bckgnd), .33)            ; ?>;
  --admin-body-contrast-40 :<?php echo hexRGBA(getContrast($body_bckgnd), .40)            ; ?>;
  --admin-body-contrast-50 :<?php echo hexRGBA(getContrast($body_bckgnd), .50)            ; ?>; 
  --admin-body-contrast-66 :<?php echo hexRGBA(getContrast($body_bckgnd), .66)            ; ?>;
  --admin-body-contrast-75 :<?php echo hexRGBA(getContrast($body_bckgnd), .75)            ; ?>;
  --admin-body-contrast-85 :<?php echo hexRGBA(getContrast($body_bckgnd), .85)            ; ?>;
  --admin-tab-border       :<?php echo getContrast($body_bckgnd,'tabborder')              ; ?>;
  --admin-tab-border-50    :<?php echo hexRGBA(getContrast($body_bckgnd,'tabborder'),0.5) ; ?>; 
  --admin-tab-bckgnd-muted :<?php echo hexRGBA(getContrast($body_bckgnd,'tab'),0.05)      ; ?>;
  
  --admin-masthead-color   :<?php echo $masthead_color   ? $masthead_color : $masthead_bckgnd 
                                                         ? hexRGBA(getContrast($masthead_bckgnd),0.75) : 'var(--admin-body-contrast-75)' ; ?>;    
  --admin-footer-color     :<?php echo $footer_color     ? $footer_color   : $footer_bckgnd
                                                         ? hexRGBA(getContrast($footer_bckgnd),0.85)   : 'var(--admin-body-contrast-85)' ; ?>;
  --admin-footer-muted     :<?php echo $footer_bckgnd    ? hexRGBA(getContrast($footer_bckgnd),0.66)   : 'var(--admin-body-contrast-66)' ; ?>;

  --admin-valid            :<?php echo $valid_color     ; ?>; 
  --admin-warning          :<?php echo $warning_color   ; ?>; 

 
}
<?php echo (!$shadows) ? '#pw-content-body * {box-shadow: none!important;}' : ''  ; ?>
.compare.minus:before{content: 
url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpolygon points='0,0 16,0 8,13.86' style='fill:%23<?php echo ltrim($warning_color, '#');?>;'/%3E%3C/svg%3E");
}
.compare.plus:before {content: 
url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpolygon points='0,13.86 16,13.86 8,0' style='fill:%23<?php echo ltrim($valid_color, '#');?>;'/%3E%3C/svg%3E");
}

<?php include $config->paths->siteModules.'AdminThemeTweaker/AdminThemeTweakerFramework.css'; ?>