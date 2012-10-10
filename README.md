# [TV-Icarus] (http://gotux.net)

## Features

* Clean URLs and SEO ready meta tags.
* Easy navigation with quickbar and pagination.
* Auto-generated meta tags for per show page.
* Uses HTML5 with CSS2 template (easily customizable) with Firefox, WebKit, Opera, IE support.
* Utilizes CodeIgniter, Smarty & JQuery Frameworks.
* Uses TVRage.com API services.
* Whole script cache feature (optional).
* Pre-Cache of some xml files feature (optional).

See demo website here: [http://demo.gotux.net/tvicarus/] (http://demo.gotux.net/tvicarus/)

## Quick Start

1. Download latest version of TV-Icarus from GitHub.
2. Extract and place TV-Icarus files in your web root.
3. Change /static/cache/ and tvicarus/cache/ directories permisson to 777.
4. Use .htaccess for Apache and proper Nginx rules.

### Apache .htaccess
```
<IfModule mod_rewrite.c>
  RewriteEngine On
  RewriteBase /
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule . /index.php [L]
</IfModule>
```

### Nginx Rules
```
server {
  server_name demo.gotux.net;
  root /var/public_html;
  include php.conf;
  try_files $uri $uri/ /index.php;
} #tv-icarus
```
Here is php.conf
```
#
# /etc/nginx/conf/php.conf
#

location ~ \.php$ {
  try_files $uri =404;
  include fastcgi_params;
  fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
  fastcgi_pass unix:/var/run/php-fpm/php-fpm.sock;
} #php
```
For more information on how to properly configure Nginx web server, please see my wiki here [http://wiki.gotux.net/tutorials/software/nginx] (http://wiki.gotux.net/tutorials/software/nginx)

## Info

* Source: [https://github.com/GoTux/TV-Icarus] (https://github.com/GoTux/TV-Icarus)
* Homepage: [http://gotux.net] (http://gotux.net)
* Twitter: [@gotux] (http://twitter.com/gotux)

## Credits

* [TVRage] (http://www.tvrage.com/) for there great API service.
* [CodeIgniter] (http://codeigniter.com/) and Smarty frameworks.
* [HTML5Shiv] (http://html5shiv.googlecode.com/svn/trunk/html5.js) HTML5 elements support.
* [FamFamFam] (http://famfamfam.com/) icons set by Mark James.
