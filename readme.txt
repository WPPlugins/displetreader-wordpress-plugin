=== Displet RETS / IDX Plugin ===
Contributors: displetdev
Author: Displet
Author URI: http://displet.com/
Plugin URI: http://displet.com/wordpress-plugins/displet-rets-idx-plugin/
Tags: real estate, rets, idx, listings, realty, mls, agent, realtor
Requires at least: 3.2
Tested up to: 4.4.1
Stable tag: 2.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Displet is a RETS/IDX plugin that allows developers to build exactly what their clients need by offering flexibility, customization and unlimited integrations, exclusively on a WordPress platform.

== Description ==

Displet is a RETS/IDX plugin that allows developers to build exactly what their clients need by offering flexibility, customization and unlimited integrations, exclusively on a WordPress platform.

Easily insert real estate listings, statistics, maps, and quick searches into Wordpress pages, post, &amp; widget ready sidebars. This plugin leverages Displet's powerful RETS/IDX system &amp; lead capture tools.<br><br>

<strong><a href="http://displet.com/">Click here to learn more about Displet's RETS/IDX Solution.</a></strong>
== Installation ==

1. Install and activate the plugin, using either the Plugin Administration or FTP.
2. Purchase a monthly subscription to obtain an API key - listing data is not free! Call (312) 957-8846 for more info.
3. Configure the plugin. Watch our quick start <a href="http://displet.com/docs/legacy/free-plugin-quick-start/">tutorial here</a>.

== Frequently Asked Questions ==

= Are there FAQs? =

- View the <a href="http://displet.com/docs/legacy/free-plugin-quick-start/"quick start guide for any level user</a>
- Developers can find additional info <a href="http://displet.com/docs/">here</a>

== Screenshots ==

1. Easily insert an advanced search, quick search, & featured listings widgets.
2. Choose from a wide range of criteria to insert real estate listings on any page or widget ready sidebar.
3. Insert basic statistics, a map of the listings, and a list of real estate listings into any page or sidebar.

== Changelog ==

= 2.2 =
* Listing / API Requests now loaded via HTTP or HTTPS based upon your site
* Photos now loaded via HTTP2 to speed up load times

= 2.1 =
* Search Forms page added
* Performance improvements
* New templating options added

= 2.0 =
* 2.0 launch. 1.0 features deprecated.

= 1.5.1 =
* New features including Quick Start, Facebook/Google login, Zapier integration, and improved URL structure

= 1.5 =
* New free mode allows listings without a RETS/IDX account

= 1.4.7.6 =
* New features: Property type navgiation & price navigation improvements

= 1.4.7.5 =
* New features: Property type navigation & Sort by newest

= 1.4.7.4 =
* Improved sidescroller Javascript, made listings limit & sort effective for listings widget, sort per DispletListing also

= 1.4.7.3 =
* Improved sidescroller Javascript

= 1.4.7.2 =
* Added county to search parameters, property types to front-end user sorting

= 1.4.7.1 =
* Reset quick search form on load, voided href for Gallery/List links

= 1.4.6.9 =
* WordPress 3.5 compatibile

= 1.4.6 =
* Auto price navigation featured added

= 1.4.5 =
* User choice for listing styles

= 1.4.4 =
* New listings styles, option to hide map by default

= 1.4 =
* Preventing tile images from loading until next page is requested, added variance for map to eliminate outliers

= 1.3.9 =
* Fixed overlapping text in tile styles, added classes to tile template, number formatted square feet

= 1.3.8 =
* Fixed insert/edit Listing popup (MCE) alignment in Windows

= 1.3.7 =
* Fixed possible map problem when prices aren't returned numerically

= 1.3.6 =
* Added classes to tile template for increased style control, Displet IDX (dashboard) menu, & cookie to remember tile sort

= 1.3.5 =
* Fixed map bug when at least 1 listing but no lat-long data

= 1.3.3 =
* Modified backend options to retrieve Woopa field values

= 1.3.2 =
* Fixed caption bug

= 1.3.1 =
* Improved horizontal quick search

= 1.3 =
* Improved settings page

= 1.2.9 =
* New quick search & stats options, also added cookie to remember listings pagination

= 1.2.8 =
* Consolidated DispletStats shortcode into DispletListing shortcode

= 1.2.7 =
* Added Quick Search shortcode & widget

= 1.2.6 =
* Added compatability for maps with custom Displet templates. Also added option to separately display maps from listings.

= 1.2.5 =
* Added map listings option

= 1.2.4 =
* Bugfix: Updated php-displet, school_district works again.

= 1.2.3 =
* DispletFrame refinement.

= 1.2.2 =
* Bugfix: Activation hook no longer fires on updates, must do version check with every request.

= 1.2.1 =
* Made Displet Pro mode default.

= 1.2 =
* Improved domain mapping support.
* Bugfix for DispletStats: Result sets with no interior space (0 to 0 "Size Range") don't break things.
* onDisplet functionality now included.

= 1.1.1 =
* Bugfix for domain mapping multisite.

= 1.1 =
* Street address support.
* New Listings widget template.
* Sort option in widgets.
* Tile template hard heights, to work around sub-pixel height differences in some themes/browsers (this caused gaps in tile layout).

= 1.0.3 =
* Graceful handling of unconfigured widgets.
* Clean out caches on uninstall.

= 1.0.2 =
* Fix for layout bug in Tile template.

= 1.0.1 =
* Updated php-displet, area_mls_defined now working.

= 1.0 =
* Initial release.

== Template Hierarchy ==

Templates can be overriden, in a fashion similar to the Template Hierarchy for WordPress themes. The plugin looks for templates with a particular name in the root directory of the current Theme.

== Custom Template Recipe ==

1. Copy a template from $plugin_root/view/templates/ to the current theme directory.
2. Edit the template.
3. That's it!
