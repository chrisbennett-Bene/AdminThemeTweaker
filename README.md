# AdminThemeTweaker
Easily and quickly tweak Processwire's default Uikit Admin Theme

## Smart defaults and auto-generated contrast to get you up and running, with extensive fine-tuning options if required
Admin Theme Tweaker will quickly alter Processwire's default Uikit admin styling from the moment it is installed, 
with a default configuration designed to illustrate some features and give you a head start on configuring your custom admin.

Everything is geared towards automatically generating sufficient contrast based on backgrounds you choose.

**Set two colors and you are away**.

Understandably, this becomes more difficult as the backgrounds move towards the neutral colors midway between black and white, 
so extensive fine-tuning options are provided.

## How is it different from the other awesome themes and stylers?
Admin Theme Tweaker is different from the many other quality theme stylers and styles available for Processwire,
because it does not touch your templates or the default Uikit CSS.

You can upgrade the entire core as often as you like and Admin Theme Tweaker will keep on doing what it does.

You do not need to touch a compiler, or CSS, or look at a LESS file, or scratch your head wondering where to find
and how to overwrite the default CSS.

It is an addition to -  not a replacment for -  the default styles, using the Cascading part of CSS.\
The php "engine" draws the variables from your configuration and outputs the CSS needed to get it done.

That said, it also does quite a bit more, allowing a degree of flexibility and customisation that is probably a little over the top.

You can click it on and off.\
You can change a heap of things and get your hands dirty or just change a couple of values, set and forget.

If you want to change the margin around inputs and inputfields, you can.\
Automatic floating of the inputfields will work a little better than the default, 
offering accuracy down to 5% for column widths and including all common "thirds" options.

## Using Admin Theme Tweaker

1. Install it. Styling will change with preset values to get you started
2. Set two background colors if you like
3. Fine-tune your custom styles

Text colors, borders, tints, input backgrounds and all manner of things will automatically change.
		
## Smart switching colorpicker for easy color changes
### Smart swatches and colorpicker for flexible color choice
<kbd>Right-Click</kbd> on any colorpicker swatch to bring up hex value input instead, so you can easily add exact values or remove values altogether to go back to default values.

This is important as type="color" inputs require a value and will default to black if none is given. It\'s just the way they work.

By using a little javascript we switch to type="color" only when the field has a value and allow it to switch back to type="text" on contextmenu.

This allows us to enjoy the the best of both worlds: pretty color swatches and a colorpicker if we want them and the ability to input hex codes - including shothand which we will automatically expand for colorpicker - or remove values altogether.

Without a smart switch for colorpicker, direct input of hexcodes, shorthand hex codes and the valuable option of "no value" are not possible.

In addition, switching to hex codes via <kbd>Right-Click</kbd> / contextmenu allows you to simply press <kbd>Enter</kbd> to save and update your changes. We like simple!
