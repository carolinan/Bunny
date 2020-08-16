=== Bunny ===
Contributors: poena
Version: 2.2
Requires at least: 5.0
Tested up to: 5.5
Requires PHP: 5.6
License: MIT
License URI: http://opensource.org/licenses/MIT

== Description ==
Fluffy friendly and cute! 'Bunny' is an animated theme suitable for pet lovers and kids. -Just one click in the theme customizer turns Bunny into the Easter bunny! 
You can also chose the Christmas design or hide the images. The theme is responsive and translation ready with one custom menu, two optional widget areas, 
sticky posts and threaded comments.

The code is sometimes commented in both English and Swedish. -In those cases, the Swedish comment is to the right.

== Installation ==
1. Unzip `bunny.zip` to the `/wp-content/themes/` directory
1. Activate the theme through the 'Appearance' menu in WordPress
2. For help on adjusting the site title and tagline, see the FAQ.

== Copyright ==
Copyright 2014-2020 Carolina Nymark

== Frequently Asked Questions ==
= Where can I get support for this theme? =
If you have any questions or suggestions for this theme please use the theme support page, 
http://wordpress.org/support/theme/bunny.

= My title and tagline looks funny, how do I fix this? =
Please open the theme customizer.
Under the Theme Options panel and the 'Arc Settings' section you will find the settings for the curved text.
Set a small number for a high arc, and high number for a low arc.

== Changelog ==

= 2.2 2020-08-16 =
Added required items to style.css

= 2.1 2020-04-19 =
Updated links, tested up to, and dates.


= 2.0 2019-05-09 =
Fixed typos...

= 1.9 2019-05-08 =
Added license file.
Updated required WordPress version and PHP version.
Improved support for the block editor.
Improved the option that hides all images.
Added an option to upload an image that replaces the bunny.
Minor style improvements for when the animations are turned off.
Code style changes to better match WordPress coding standards and html5.
Increased color contrast and removed duplicate links to improve accessibility.

= 1.8 2017-08-06 =
Fixed a missing placeholder for the comments number in comments.php line 29.
Made sure that the pingback link is only added to the header of single pages and posts if pingbacks are open.
Added credits to Twenty Seventeen.
Added esc_url to get_template_directory_uri and get_permalink.
Removed the is_admin wrapper for the comment-reply script in functions.php.
Made featured images clickable (content.php).
Updated the "Get started here" link (index.php)
Improved styling:
Added a print style.
Added an rtl style.
Updated font-awesome.
Removed a background image that was used on smaller screen sizes. This was replaced by a solid color background.
Improved the responsive widths and site title font-size to work better on tablets.


= 1.7 2016-12-15 =
Fixed a problem where the bat would show instead of "Rudolf" in the christmas setting.
Updated the checkbox sanitization callback in the customizer and added support for selective refresh.
Updated the responsive widths in the css.
Moved the remaining javascript into their own .js files and enqueued them.
Made the site title clickable.
Removed an unused image.
Updated font-awesome.

= 1.6 2016-10-26 =
Updated the styling of the menu. Moved the mobile menu below the site title.
Added an option to show halloween themed images.
Moved the theme options into their own panel.
Updated the styling of borders, comments, and sidebars.
Clouds: replaced the javascript with css animations.
Moved the extra css files into the inc folder.
Removed archive.php, search.php, 404.php, author.php. These now fall back to index.php.
Replaced page.php and single.php with singular.php.
Improved aria roles and screen reader texts.
Added a new larger screenshot.

= 1.5 2016-06-18 =
Updated theme uri and theme tags.
Added support for title-tag.
Updated the navigation functions.
Removed the breadcrumb option.
Removed the logo option in favor of the new custom logo function.
	-Choosing a logo will replace the cloud behind the site title. The recommended height is 140px. Remove the image to show the cloud again.

= 1.4 =
Added a Christmas option.
Added an option to remove all decorative images.
Added an optional sidebar with widget area.
Added options to stop the animation and disable the arc.
Replaced Arctext with Circletype.
Several css and menu changes

= 1.3 =
Fixed a bug with sub-menus as reported by knaveenchand.
Added a responsive menu.
Added keyboard navigation for menus.
Added skip link.
Added a logo upload option in the customizer that replaces the cloud behind the site title.

= 1.2 =
Removed set_post_thumbnail_size from functions.php

= 1.1 =
Moved the arc javascript output to the footer.

= 1.0 =
* Release

== Resources Used In This Theme ==

Based on Underscores http://underscores.me/, (C) 2012-2016 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
normalize.css http://necolas.github.io/normalize.css/, (C) 2012-2016 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)

Twenty Seventeen WordPress Theme, Copyright 2016 WordPress.org
Twenty Seventeen is distributed under the terms of the GNU GPL

Checkbox sanitization
Copyright (c) 2015, WordPress Theme Review Team
http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
https://github.com/WPTRT/code-examples/blob/master/customizer/sanitization-callbacks.php

Fonts
Open Sans Condensed is released under Apache License, version 2.0.
Oswald is released under SIL Open Font License, version 1.1.
Font Awesome 4.7.0 License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)

Button CSS
Bootstrap buttons are licensed under MIT license.
Copyright (c) 2011-2014 Twitter, Inc http://getbootstrap.com

Javascript
Spritely
Copyright 2010-2011, Peter Chater, Artlogic Media Ltd, http://www.artlogic.net/, http://spritely.net
Dual licensed under the MIT or GPL Version 2 licenses.

Lettering.JS
Copyright 2010, Dave Rupert http://daverupert.com
Released under the WTFPL license

CircleType 0.36
Copyright Peter Hrynkow 2014, Licensed GPL & MIT

Keyboard Accessible Dropdown Menus
Copyright 2013 Amy Hendrix,  Graham Armfield
License: MIT

Images
All images except the menu icon are public domain, the menu icon was created from the Font Awesome font, licensed under SIL OFL 1.1.

Sun: 
http://openclipart.org/detail/170678/weather-icon---thunder-by-gnokii-170678
Eggs: 
http://openclipart.org/detail/191742/blue-lace-easter-egg-by-scout-191742
http://openclipart.org/detail/77473/easter-egg-green-by-shokunin
http://openclipart.org/detail/192498/happy-easter-sign-by-chad78-192498
Christmas presents:
https://openclipart.org/detail/204826/gift-by-keistutis-204826
Holly: 
https://openclipart.org/detail/205098/holly-remix-by-anarres-205098
Reindeer:
https://openclipart.org/detail/189378/flying-reindeer-by-isacvale-189378
Moon: 
https://openclipart.org/detail/121903/full-moon-by-merlin2525
Bat:
https://openclipart.org/detail/2699/bat
Pumpkin:
https://openclipart.org/detail/2858/pumpkin
Tombstone: 
https://openclipart.org/detail/87133/halloween-tombstone-angry-face

2016-10-26: The leaf was also downloaded from https://openclipart.org, but has since been removed.

The rest of the images were made by and released into the public domain by the theme author.
