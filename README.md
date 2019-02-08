# AdminThemeTweaker
Easily and quickly tweak Processwire's default Uikit Admin Theme

## Smart defaults and auto-generated contrast to get you up and running, with extensive fine-tuning options if required
Admin Theme Tweaker will quickly alter Processwire's default Uikit admin styling from the moment it is installed, 
with a default configuration designed to illustrate some features and give you a head start on configuring your custom admin.

Everything is geared towards automatically generating sufficient contrast based on backgrounds you choose.

**Set two colors and you are away**.

Naturally, the automatic selection of colors becomes more difficult as your choices move towards the neutral colors midway between black and white, so a range of fine-tuning options are provided.

## Using Admin Theme Tweaker

1. Install it. Styling will change with preset values to get you started
2. Set two background colors if you like
3. Fine-tune your custom styles

Text colors, borders, tints, input backgrounds and all manner of things will automatically change.

## How is it different from other Processwire Admin themes and stylers?
By design, Admin Theme Tweaker is a little different from the impressive range of quality Admin Theme stylers and Admin Styles already available for Processwire. 

Apart from a wide range of available customisations to complement the automatically generated contrast options, Admin Theme Tweaker is specifically designed to ensure ongoing hassle-free updating of the Processwire core:

1. **Admin Theme Tweaker does not touch your templates**
2. **Admin Theme Tweaker does not touch the default Uikit CSS**
3. Wide variety of customisation options

As a result you can upgrade the entire core as often as you like. Admin Theme Tweaker will keep on doing what it does.

It is an addition to -  not a replacment for -  the default styles, using the Cascading part of CSS. 

You do not need to touch a Compiler/CSS/LESS/SCSS or spend time scratching your head wondering where to find and how to overwrite the default CSS. We've already invested the time to do that stuff and we're happy to share. 

The php "engine" draws the variables from your configuration and outputs the CSS needed to get it done.

That said, it also does quite a bit more, allowing a greater degree of flexibility and customisation.

It\'s all up to you. You can click it on and off. You can choose the options you want.\
You can change a heap of things and get your hands dirty or just change a couple of values, set and forget.

If you want to change the margin around inputs and inputfields, you can. Floating will still work correctly.\
Even with the addition of the ability to set margins between inputs, automatic floating of inputfields provides greater precision than the default UiKit CSS, with accuracy down to 5% for column widths and including all common "thirds" options.

## Overview of Features
Apart from the range of customisations built in to Admin Theme Tweaker, there are also a range of UI tweaks that have been incorporated. These are too numerous to outline in detail and I have forgotten some of them along the way because initially I was developing it for myself so didn't really keep track. Some of them include:

- **[Enhanced dropdowns for selected items](#enhanced-dropdowns-for-selected-items-to-make-use-of-horizontal-space)**
- **[Smart switching colorpicker/swatches](#smart-switching-swatches-and-colorpicker-for-easy-and-flexible-color-changes)**

### Enhanced dropdowns for selected items to make use of horizontal space
To minimise unnecessary vertical scrolling for dropdown menus containing a large number of items such as Fields and Modules, Admin Theme Tweaker responsively expands selected dropdowns to take advantage of available horizontal space.

Like much of Admin Theme Tweaker, just a small tweak to make life a little easier.

### Smart switching swatches and colorpicker for easy and flexible color changes
<kbd>Right-Click</kbd> on any colorpicker swatch to bring up hex value input instead, so you can easily add exact values or remove values altogether to go back to default values.

This is important as type="color" inputs *require* a 6-digit hex value and default to black (#000000) if none is given.\
It\'s just the way they work. 

To get around this we use a little light vanilla javascript to switch to type="color" only when the field has a value and allow it to switch back to type="text" on <kbd>Right-Click</kbd> / contextmenu.

This smart switching allows us to enjoy the the best of both worlds: 
- Handy visual color swatches and use of colorpicker if desired and supported by your browser
- The ability to input hex codes, including shorthand which our javascript will automatically expand for colorpicker 
- The ability to leave values blank or remove set values

Without a smart switch for colorpicker, the direct input of hex codes, shorthand hex codes and the valuable option of "no value" are not possible. In addition, switching to hex codes via <kbd>Right-Click</kbd> allows you to simply press <kbd>Enter</kbd> to save and update your changes. We like simple!
