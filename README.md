TV-Icarus v2 by TuxLyn

Features List:
	+ Clean URLs and SEO ready meta tags.
	+ Easy navigation with quickbar and pagination.
	+ Auto-generated meta tags for per show page.
	+ Uses HTML5 with CSS2 template (easily customizable)
		with Firefox, WebKit, Opera, IE support.
	+ Utilizes CodeIgniter, Smarty & JQuery Frameworks
	+ Uses TVRage.com API services
	+ Whole script cache feature (optional).
	+ Pre-Cache of some xml files feature (optional).

Credits:
	* TVRage.com for there great API service.
	* CodeIgniter and Smarty frameworks.
	* FamFamFam icons set by Mark James.



Install TV-Icarus v2.0
~~~~~~~~~~~~~~~~~~~~~~~

Shared Hosting Install:

Download latest tvicarus pacakge and drop it in your /public_html or /www folder. 

Optionally you can install this in sub-folder or even sub-domain (make sure you change base_url in config if needed).

Change cache folder permissions to 777.
tvicarus/static/cache/
tvicarus/cache/

Then simply go to any of the pages; http://domain.com/tvicarus for example.

Note first time you load this pages might take a few seconds to cache files.



Install on VPS or Dedicated Server:

0. Change to your own public web directory:
cd /var/www

1. Download latest package from GitHub:
wget https://github.com/GoTux/TV-Icarus/tarball/master -O tvicarus2.tar.gz

2. Unpack the packge:
tar xvzf tvicarus2.tar.gz

3. Change base_url in ./tvicarus/config/config.php if needed.
(default should work fine for most of the servers)

4. Give read/write permission to cache folders:
chmod -R 777 /var/www/tvicarus/static/cache/
chmod -R 777 /var/www/tvicarus/cache/
