=== Price Post Type ===
Contributors: downstairsdev, GaryJ
Tags: price, post type
Requires at least: 3.7
Tested up to: 5.2.1
Stable tag: 1.0.0
License: GPLv2 or later

== Description ==

This plugin registers a custom post type for price items.  It also registers separate price taxonomies for tags and categories.  If featured images are selected, they will be displayed in the column view.

This plugin doesn't change how price items are displayed in your theme.  You'll need to add templates for archive-price.php and single-price.php if you want to customize the display of price items.

== Installation ==

Just install and activate.

== Frequently Asked Questions ==

= How can I display price items differently than regular posts? =

You will need to get your hands dirty with a little code and create a archive-price.php template (for displaying multiple items) and a single-price.php (for displaying the single item).

= Why did you make this? =

To allow users of Price Press to more easily migrate to a new theme.  And hopefully, to save some work for other folks trying to set a price.

= Is this code on GitHub? =

Of course: [https://github.com/devinsays/price-post-type](https://github.com/devinsays/price-post-type)

== Changelog ==

= 1.0.0 =

* Update: WordPress 5.0 Editor Support (props @simube)
* Update: Use filter rather than action for dashboard glance (props @chesio)

= 0.9.3 =

* Fix notice in dashboard when used with PHP7
* Fix notice on specific screens when $screen variable not available

= 0.9.2 =

* Update post type messages for WordPress 4.4

= 0.9.1 =

* Updated translation file
* Fixes issue with thumbnail support in some themes

= 0.9.0 =

* Remove legacy support for icons
* Gamajo_Price_Registerable interface and classes

= 0.8.2 =

* Updated .pot file for translations
* Portuguese translation by Pedro Mendonça

= 0.8.1 =

* Fix for developer notices on admin pages

= 0.8.0 =

* Fix for taxonomy body classes on price posts

= 0.7.0 =

* Code refactor by @garyj
* Update icons for WordPress 3.8

= 0.6.2 =

* Fix for price post type search in the dashboard.  Props @pdme.
* Minor code improvement for taxonomy body class filter.  Props @garyj.

= 0.6.1 =

* Taxonomy body classes when is_single(), fixes debug notices

= 0.6 =

* Added @garyj as a contributor (Welcome!)
* Updated to proper coding standards
* Updated inline documentation
* New filters for taxonomy arguments
* Added body classes for custom taxonomy terms
* Refactored code to be more DRY
* Added not_found label to price tag taxonomy
* Updated translations.pot

= 0.5 =

* Use show_admin_column for taxonomies (http://make.wordpress.org/core/2012/12/11/wordpress-3-5-admin-columns-for-custom-taxonomies/) rather than a custom function
* Add author field custom post type
* Allows $args to be filtered (https://github.com/devinsays/price-post-type/issues/8)

= 0.4 =

* Update to use classes
* Update supports to include custom fields and excerpts

= 0.3 =

* Added category to column view
* Added price count to "right now" dashboard widget (props @nickhamze)
* Added contextual help on price edit screen (props @nickhamze)
* Now flushes rewrite rules on plugin activation

= 0.2 =

* Fixes for price tag label
* Fixes for column display of price items

= 0.1 =

* Initial release
