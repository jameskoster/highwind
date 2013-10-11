# Highwind changelog

## 11.10.2013 - 1.1.1
* Renamed setup_styles() to highwind_woocommerce_setup_styles().
* Renamed woocommerce_prep() to highwind_woocommerce_prep().
* Fix comment arrow color.
* Textareas and inputs now adopt body color from theme options.
* Buttons now adopt color from content background option rather than body background option.
* Better placeholder attribute color for compatibility with wider variety of color schemes.
* Added alt tag to header gravatar.
* Default featured image size set to 'large' and made filterable via `highwind_featured_image_size`. Kudos BFTrick.
* General style tweaks.

## 24.09.2013 - 1.1.0
* WooCommerce Integration.
* Added Content Background Color option.
* Tweaked sidebar appearance.
* Some typography tweaks for handheld devices.
* Tweaked heading font weights.
* Tweaked button / input styles.
* Tweaked gravatar shadow.
* More German translations (kudos daviddamm).
* Fixes issue with Jetpacks Hovercards compontent.

## 20.08.2013 - 1.0.3
* Tweaked date and category icons.
* WordPress Smileys display inline.
* No longer tries to display post image on 404.php.
* German translation (kudos daviddamm).
* Added translatable 'Continue Reading' link to `the_content()`.
* Ditch the translucent menu effect.

## 20.07.2013 - 1.0.2.1
* Fixed undefined variable when no footer widgets are set
* Set max-width:100% on all images.

## 19.07.2013 - 1.0.2
* Created en_GB .po/.mo and xx_XX.pot.
* Polish translation (kudos pd_wordpress).
* Fixed Firefox nav issue.
* Minified editor-styles.css
* Updated FontAwesome.
* Iconised standard widgets.
* Tweaked sidebar padding.

## 12.07.2013 - 1.0.1
* Added header image default dimensions.
* Featured image now hooked in rather than added via the_content filter.
* Custom header arguments are now filterable.
* Added body.fullwidth helper class.
* Better gravatar animation
* Altered button hover style.
* Added hooks inside highwind_main_navigation().
* Styled fieldset
* Tweaked dropdown animation
* Tweaks back-to-top animation
* Nav fades out slightly when scrolling
* Added copyright

## 1.0
* Initial release!

# Release Notes
===============

## 1.1.0
* Adds Content Background Color option. This will be set to the same color as the default background color (`#f8f8f9`) by default. If you've changed the background color you will need to update this new option (via Your Site > Customize) to match.