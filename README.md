#MAURIS
##Installation

###1. Clone the project
```
Git clone https://github.com/frepp/mauris.git
```
###2. Upload to server

Upload the mauris folder itself or simply upload the files inside it to any folder or root.

###3. Point browser to your location

Follow the instructions that appears.

###set site/data permissions

To be able to make the MVC work properly the site/data folder needs to have permissions 777. You can set this by using your terminal and type the following when standing in the mauris root folder.

chmod site/data 777
###configure .htaccess

In some enviroments the .htaccess file will need to be configurated. The file looks like this:
```
<IfModule mod_rewrite.c>
  RewriteEngine on
  # Must use RewriteBase on www.student.bth.se, Rewritebase for url /~mos/test is /~mos/test/
  #RewriteBase 
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule (.*) index.php/$1 [NC,L]
</IfModule>
```
Line 3 and 4 are commented out. At an error caused by this file take the # away from line 4 and enter your subpath. Here is an example:
```
<IfModule mod_rewrite.c>
  RewriteEngine on
  # Must use RewriteBase on www.student.bth.se, Rewritebase for url /~mos/test is /~mos/test/
  RewriteBase /~frpe13/test/
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteRule (.*) index.php/$1 [NC,L]
</IfModule>
```
###PHP-version

Mauris need PHP 5.2.0 or later running on the server to work properly. The core might work anyway but some functionality might be lost.

##Configure Mauris Visuals

To configure the appearance of the menu, logo, footer and similar items edit the config.php file found in the site subdirectory. Use a texteditor to make the necessary changes.

###Edit Navigationmenu

There are several ways to configure the appearance and function of the navigation bar. Here is the easiest.

This is the menu array. Label defines the text written in the menu and url the the path.
```PHP
$ma->config['menus'] = array(
   'navbar' => array(
     'home'      => array('label'=>'Home', 'url'=>'home'),
     'modules'   => array('label'=>'Modules', 'url'=>'module'),
     'content'   => array('label'=>'Content', 'url'=>'content'),
     'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
     'blog'      => array('label'=>'Blog', 'url'=>'blog'),
     ),
 );
```
Use the routing array to customize urls. In this example the url home will instead of /home point at index/index.
```PHP
$ma->config['routing'] = array(
  'home' => array('enabled' => true, 'url' => 'index/index'),
);
```
###Edit Footer

Configuration of the footer is made by editing the following line in site/config.php.
```PHP
'footer' => '<p>Mauris &copy; by Fredrik Peterson based on Lydia &copy; by Mikael Roos (mos@dbwebb.se)</p>',
```
###Change Logo

Configuration of the logo is made by editing the following lines in site/config.php. Remember that it is just the name of the logo image that is set, the wanted image will also need to be uploaded to the current theme folder. Also set the width and the height in pixels of the logo.
```PHP
'logo' => 'logo.png',
'logo_width'  => 80,
'logo_height' => 80,
```
###Change Title

The title and slogan of the website are set by editing the following lines in site/config.php
```PHP
'header' => 'Mauris',
'slogan' => 'A complex way to make it simple',
```
##Content

Content contains of pages and posts.

###Filters

The text can be formatted by setting appropiate filters.

+ plain, plain text
+ bbcode, formatted by bbcode tags
+ htmlpurify, formatted by allowed html tags

###Administrate Pages

####Create a page

Go to content/create.

+ Title, the title of the post
+ Key, not supported at the moment set to same as title
+ Content, the content.
+ Type, should be page
+ Filter, see under content above

####Edit a page

Go to blog and click the edit link under the post or click the edit link at the content overwiev. Fields are explained above.

####Delete a page

Go to blog and click the edit link under the post or click the edit link at the content overwiev. Click delete button at botton.

####Link to a pge

You can link to a page from the menu, see under Edit Navigationmenu

###Create a blog

Mauris core supports a blog.

####Create a post

Go to content/create.

+ Title, the title of the post
+ Key, not supported at the moment set to same as title
+ Content, the content.
+ Type, should be post
+ Filter, see under content above

####Edit a post

Go to blog and click the edit link under the post. Fields are explained above.

####Delete a post

Go to blog and click the edit link under the post. Click delete button at botton.
