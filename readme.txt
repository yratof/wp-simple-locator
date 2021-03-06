=== Simple Locator ===
Contributors: kylephillips
Donate link: http://locatewp.com/
Tags: location, store locator, google maps, store map
Requires at least: 3.8
Tested up to: 4.1
Stable tag: 1.0.1

License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Add Google Maps location search functionality for any post type.

== Description ==

**Why use Simple Locator?**

Simple locator is ideal for developers who are looking for a way to implement location search for any post type. Simple locator is different in that it allows the selection of any existing custom fields for use as the geocoded data sources.

Don't have an existing post type with geocoded latitude and longitude fields? Simple Locator includes a default "Locations" post type with fields for latitutde, longitude, address, phone number, website, & more.

Simple Locator also offers developer-friendly options for adding custom Google Maps styling. Select from an existing list, leave the default styles, or add your own JSON styles.

**Using Simple Locator**

1. Add locations. This can either be the included "locations" post type or an existing custom post type with existing geocoded fields.
2. Use the Shortcode [wp_simple_locator] or Widget to display a search form. The shortcode offers more options for map and form customization.

For more information visit [locatewp.com](http://locatewp.com).

**Important: Simple Locator requires WordPress version 3.8 or higher, and PHP version 5.3.2 or higher.**


== Installation ==

1. Upload simple-locator to the wp-content/plugins/ directory
2. Activate the plugin through the Plugins menu in WordPress
3. Click on the Locations Menu item to begin adding locations.
4. To change the post type, geocoded fields, or map styles, visit Settings > Simple Locator

== Frequently Asked Questions ==

= What 3rd party services does this plugin use? =
All geocoding and mapping functionality takes advantage of the Google Maps Javascript API V3. Unexpected changes in the API service may effect plugin functionality, but any changes will be monitored and addressed as needed.

= Can I hide the map, and only show text results? =
Use of the Google Maps API requires that the data be displayed in a Google map. Hiding the map violates the API licensing.

= How do I add custom functionality to the generated maps? =
Several Javascript callback functions are provided for key events in search, and map rendering. To learn more about these callbacks, visit [locatewp.com](http://locatewp.com).

= Is my existing data automatically geocoded? =
**No.** If an existing post type is chosen as the search term, there must be preformatted latitude and longitude fields associated with each post. Geocoded fields must be formatted using the degree format. All new posts under the “location” post type are geocoded on save.

= Does it work outside the United States? =
The search form uses the Google Maps API geocoding service, which offers reliable data throughout the world. Use of the API may change depending on your specific location. Localization is possible using the provided POT files in the /languages folder. To toggle between miles and kilometers, visit Settings > Simple Locator.


== Screenshots ==

1. Display a simple, AJAX-enabled locator form using a shortcode or widget.

2. Form results load without page refresh. Customize the results & map containers if needed.

3. The included "location" post type includes custom fields specific to locations.

4. Includes options for Google Maps API Key, measurement unit (miles/kilometers), custom map pin image, whether to output the included CSS, and whether to display the map in the specified post type's singular view.

5. Use the included post type and latitude/longitude fields, or specify your own existing combination of type and fields. Works with Advanced Custom Fields. Ideal for developers looking for a customizable location search.

6. Choose from a list of pre-defined map styles

7. Or, paste your own JSON formatted styles.

== Changelog ==

= 1.0.1 =
* Localization bug fixes

= 1.0.0 =
* Initial release 


== Upgrade Notice ==

= 1.0.1 =
Minor Localization bug fixes

= 1.0.0 =
Initial release


== More Information ==

= Shortcode Options =
The shortcode to display the form and results is [wp_simple_locator]. There are several options available for customizing the form and results:

* **distances** - A comma separated list of numbers used to ustomize the list of available distances to choose from in the form
* **mapheight** - The height of the map in pixels
* **mapcontainer** – The unique ID of a custom container in which to load the map.
* **resultscontainer** - The unique ID of a custom container in which to load the search results.
* **buttontext** - Text to display in submit button
* **addresslabel** – Customize the address form label
* **mapcontrols** – Hide or show the map controls
* **mapcontrolsposition** – Google Maps formatted position for map controls (ex: TOP_LEFT)

Visit [locate.wp](http://locatewp.com#documentation) for more detailed information.


= Widget Use =

Options include the title, distance options, and the map height. To use the widget outside of a predefined sidebar area, use the following function in your template, as outlined in the [WordPress documentation](http://codex.wordpress.org/Function_Reference/the_widget). The widget name is SimpleLocator\Widgets\Form (must include namespaces).


= Singular View =

By default, a map of the location is added to the content on singular views. To remove this feature, update the setting under Simple Locator > General Settings.


= Extending & Customizing Map Display =

A number of JavaScript functions are provided to extend and customize the map results. Visit [locatewp.com](http://locatewp.com#documentation) for a list and usage details.
