=== Offerte Internet ===
Contributors: GioSensation
Tags: Offerte Internet, Informazioni ADSL, WordPress API
Author URI: https://www.offerteinternet.net
Plugin URI: https://www.offerteinternet.net
Requires at least: 4.7
Tested up to: 6.1
Stable tag: 2.1.4
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a widget with up-to-date information about current Internet Providers in Italy taken from www.offerteinternet.net. No subscription required. Optional attribution links.

== Description ==
Adds a widget with up-to-date information about current Internet Providers in Italy taken from the site [Offerte Internet](https://www.offerteinternet.net "Offerte Internet ti aiuta a trovare la promozione adsl e fibra ottica più adatta alle tue esigenze.") using the WordPress rest API. No subscription required. Optional attribution links.

You just add the widget to the site and it will display up-to-date information about the number of offers you decide, ordered by rating, including network speed and price.

Great if you have a related website, or a real estate website that wants to provide additional information for home-related services like **phone, ADSL or optic fiber plans**. Any home or business-oriented website can use this to add value for their customers.

Attribution is optional, but welcome. You can enable it in the widget control panel.

Enjoy!

----

Aggiunge una widget con informazioni sempre aggiornate sulle promozioni ADSL e fibra ottica in Italia, prese dal sito [Offerte Internet](https://www.offerteinternet.net "Offerte Internet ti aiuta a trovare la promozione adsl e fibra ottica più adatta alle tue esigenze.") tramite la API di WordPress. Nessuna sottoscrizione, né obbligo di backlink.

Ti basta aggiungere la widget e le informazioni verranno mostrate sul tuo sito, ordinate per valutazione, incluse velocità ADSL e costo.

Il plugin è utile per siti correlati, o per siti di immobiliare per mostrare servizi per la casa come appunto gli **abbonamenti per l'ADSL e la fibra ottica**. I siti che offrono servizi di questo tipo possono usare la widget per fornire un valore aggiunto ai propri utenti.

Il link di attribuzione è opzionale, ma benvenuto. È possibile abilitarlo dal pannello di controllo della widget.

Enjoy!

= Tech details =
Since version 2.0, the plugin fetches the data from [Offerte Internet](https://www.offerteinternet.net "Offerte Internet ti aiuta a trovare la promozione adsl e fibra ottica più adatta alle tue esigenze.") once a day and stores the info in the database, instead of doing it on each page load on the frontend. This allows for a better user experience and performance for the user and also eases the load on the original Offerte Internet server. Aaand less JavaScript for you.

The **Offerte Internet** plugin comes with a simple stylesheet that makes sure the information looks good by default. You can override the styles through your own stylesheet.

= Issues & support =
If you see something that's not quite right you can contact me on [Twitter](https://twitter.com/Offerteinternet "Offerte Internet – L'ADSL su Twitter") or [Facebook](https://www.facebook.com/offerteinternet/ "Offerte Internet – L'ADSL su Facebook"). I'll be happy to help with more functionalities and fixes.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/offerte-internet` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress
1. Add the widget to your WordPress in Appearance > Widgets
1. Go with the defaults or configure it to your heart's content: you can decide how many offers to show (up to 15), the intro text, and whether or not to include links to the offer review on OfferteInternet.net
1. Enjoy


== Frequently Asked Questions ==

= Am I required to include attribution links to your website? =

Not at all. You can opt in to include links to original reviews in the widgets config page under Appearance > Widgets.

= Do you provide updated information? =

Yes, the widget uses the WordPress rest API to retrieve the information daily and I will do my best to keep the info on offerteinternet.net updated with all the current offers.

== Screenshots ==
1. The UI of the widget config page under Appearance > Widgets
2. How it shows on the front-end

== Changelog ==

= 2.1.4 =
Nov 6 2022 — Fix unhandled error when the remote call doesn't error but it's not 200 (i.e. 404).

= 2.1.2 =
Mar 29 2021 — Use a proxy to the API to ensure maximum availability.

= 2.1.1 =
Mar 22 2021 — Add namespace to log_error function to avoid conflicts. 🤦‍♂️

= 2.1.0 =
Mar 22 2021 — Fix cron job that never really worked and add errors to a log file. This also fixes a bug in the opt-in checkbox.

= 2.0.2 =
Mar 2021 — Add loading=lazy attribute to images to improve site performance.

= 2.0.0 =
Feb 2018 — Reworked the plugin completely to be more efficient for the end user and for the original Offerte Internet website.

= 1.0.0 =
Initial release. Wooo!

== Upgrade Notice ==
Cron job is finally working properly!
