# AdminThemeTweaker
Easily and quickly tweak Processwire's default Uikit Admin Theme

## Smart defaults and auto-generated contrast to get you up and running, with extensive fine-tuning options if required
Admin Theme Tweaker will quickly alter Processwire's default Uikit admin styling from the moment it is installed, 
with a default configuration designed to illustrate some features and give you a head start on configuring your custom admin.

Everything is geared towards automatically generating sufficient contrast based on backgrounds you choose.

**Set two colors and you are away**.

Naturally, the automatic selection of colors becomes more difficult as your choices move towards the neutral colors midway between black and white, so a wide range of fine-tuning options are provided.

## Using Admin Theme Tweaker

1. Install it. Styling will change with preset values to get you started
2. Set two background colors if you like
3. Fine-tune your custom styles

Text colors, borders, tints, input backgrounds and all manner of things will automatically change.

## How is it different from the other awesome themes and stylers?
Admin Theme Tweaker is different from the many other quality theme stylers and styles available for Processwire,
because it does not touch your templates or the default Uikit CSS.

Because of this, you can upgrade the entire core as often as you like and Admin Theme Tweaker will keep on doing what it does.

It is an addition to -  not a replacment for -  the default styles, using the Cascading part of CSS. You do not need to touch a compiler / CSS / LESS / SCSS or scratch your head wondering where to find and how to overwrite the default CSS.\
The php "engine" draws the variables from your configuration and outputs the CSS needed to get it done.

That said, it also does quite a bit more, allowing a greater degree of flexibility and customisation.

It\'s all up to you. You can click it on and off. You can choose the options you want.\
You can change a heap of things and get your hands dirty or just change a couple of values, set and forget.

If you want to change the margin around inputs and inputfields, you can. Floating will still work correctly.\
Even with the addition of the ability to set margins between inputs, automatic floating of inputfields provides greater precision than the default, with accuracy down to 5% for column widths and including all common "thirds" options.

## Overview of Features
Apart from the range of customisations built in to Admin Theme Tweaker, there are also a range of UI tweaks that have been incorporated. These are too numerous to outline in detail and I have forgotten some of them along the way because initially I was developing it for myself so didn't really keep track. Some of them include:

- **[Enhanced dropdowns for selected items](#enhanced-dropdowns-for-selected-items-to-make-use-of-horizontal-space)**
- **[Smart switching colorpicker/swatches](#smart-switching-swatches-and-colorpicker-for-easy-and-flexible-color-changes)**

### Enhanced dropdowns for selected items to make use of horizontal space
To minimise unnecessary vertical scrolling for dropdown menus containing a large number of items such as Fields and Modules, Admin Theme Tweaker responsively expands selected dropdowns to take advantage of available horizontal space.

Like much of Admin Theme Tweaker, just a small tweak to make life a little easier.

### Smart switching swatches and colorpicker for easy and flexible color changes
<kbd>Right-Click</kbd> on any colorpicker swatch to bring up hex value input instead, so you can easily add exact values or remove values altogether to go back to default values.

This is important as type="color" inputs require a value and will default to black if none is given. It\'s just the way they work. To get around this we use a little vanilla javascript to switch to type="color" only when the field has a value and allow it to switch back to type="text" on contextmenu.

This allows us to enjoy the the best of both worlds: handy color swatches and a colorpicker and also the ability to input hex codes - including shothand which we will automatically expand for colorpicker - or remove values altogether.

Without a smart switch for colorpicker, direct input of hexcodes, shorthand hex codes and the valuable option of "no value" are not possible. In addition, switching to hex codes via <kbd>Right-Click</kbd> allows you to simply press <kbd>Enter</kbd> to save and update your changes. We like simple!
