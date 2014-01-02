Ramverket Glantz- MVC-inspirerat ramverk
=========================

Glantz är gjort av Rattana Prasith och baserat på ramverket Lydia av Mikael Roos.


Installation av Glantz
---------------

1. För att kunna installera Glantz så börjar du med att klona ramverket från Github med foljande kommando
`git clone git://github.com/rattanaprasith/glantz.git`. Du behöver även Git Bash eller Git GUI på din dator för att själva kloningen skall gå att genomföra. De kan laddas ner på följande länk: http://git-scm.com/downloads

2. Efter att laddat hem ramverket så ska du göra så att `site/data` blir skrivbar. Detta gör du med hjälp av dessa kommandon `cd glantz; chmod 777 site/data`. Du kan även göra det via en sftp-server som till exempelvis Filezilla. Data-mappen behövs också skapa i site-katalogen.

3. Sedan måste du ändra i .htaccess fil för att hela siten ska fungera. Det du behöver ändra i filen är RewriteBase då behöver du ändra den till där mappen ligger på din server eller i dina lokala filer.
Så här kan det se ut `RewriteBase /~rapr13/phpmvc/kmom08/glantz`

4. Det sista som måste göras är att initiera modulerna. Det gör du via `module/install`. Då skapas automatiskt två användare: root:root samt doe:doe. Även gästbokens databastabeller initieras via detta kommando.



Ändra logo, webbplatsens titel, footer och navigeringsmeny
---------------

Alla inställningar som har med temat att göra, hittar du i `site/config.php`. Så här ser det ut i config.php:

			/**
			* Settings for the theme.
			*/
			$gl->config['theme'] = array(
			'path'            => 'site/themes/newtheme',
			'parent'          => 'themes/new',
			'stylesheet'      => 'style.css',
			'template_file'   => 'index.tpl.php',
			'regions' => array('navbar', 'flash','featured-first','featured-middle','featured-last',
			'primary','sidebar','triptych-first','triptych-middle','triptych-last',
			'footer-column-one','footer-column-two','footer-column-three','footer-column-four',
			'footer',
			),
			'menu_to_region' => array('navbar'=>'navbar'),
			'data' => array(
			'header' => 'Glantz',
			'slogan' => 'A PHP-based MVC-inspired CMF',
			'favicon' => 'logo_80x80.png',
			'logo' => 'logo_rose.jpg',
			'logo_width'  => 150,
			'logo_height' => 150,
			'footer' => '<p>Glantz &copy; by Rattana Prasith</p>',
			),
			);

* Arrayen `$gl->config['theme']` håller reda på alla inställingar. Tanken med Glantz är att man kan göra ett tema i site-katalogen och ärva ett befintligt tema från Glantz's standard-tema.
I det här fallet så har vi ett tema i site-katalog dvs. `'path' => 'site/themes/newtheme'` som ärver från "Glantz's new-team (förälder-tema)", dvs. `'parent' => 'themes/new'`. Vill man skapa egna teman så kan du göra genom att skapa en ny mapp i `site/themes`, till exempel `site/themes/newtheme`. Sedan skapar du en stylesheet i mappen. Glömt inte att kopiera template-filen för ditt tema, dvs. index.tpl.php, som är en vy för att visa själva temat hur det är uppbyggt och klistra in sedan den i ditt egna tema. Glömt inte att ändra även sökvägen till ditt nya tema i arrayen `$gl->config['theme'].
* För att ändra loga kan du göra genom att ändra din logotyp i `'logo' => 'logo_rose.jpg',` . Logotypen ska läggas till ditt valda tema i site-katalogen, till exempel `site/themes/newtheme`. 
* I samma array så finner du även header `'header' => 'Glantz',` och footer `'footer' => '<p>Glantz &copy; by Rattana Prasith</p>',` där du kan ändra på titel och footer på webbplatsen.
* Navigeringsmenyn ligger också i config.php och ser här kan den se ut: 

			/**
			* Define menus.
			*
			* Create hardcoded menus and map them to a theme region through $gl->config['theme'].
			*/
			$gl->config['menus'] = array(
			'navbar' => array(
			'home'      => array('label'=>'Home', 'url'=>'home'),
			'modules'   => array('label'=>'Modules', 'url'=>'module'),
			'content'   => array('label'=>'Content', 'url'=>'content'),
			'guestbook' => array('label'=>'Guestbook', 'url'=>'guestbook'),
			'blog'      => array('label'=>'Blog', 'url'=>'blog'),
			),
			'my-navbar' => array(
			'home'      => array('label'=>'About Me', 'url'=>'my'),
			'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
			'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
			),
			);

Man kan definera flera olika menyer och i det här fallet så har vi två olika menyer, "navbar" och "my-navbar". För att välja vilen meny som ska användas då kan du göra genom att ange den i `'menu_to_region' => array('DinEgenMeny'=>'navbar'),`. Alltså i detta fallet så är navbar-menyn som används och så här ser det ut i `'menu_to_region' => array('navbar'=>'navbar'),`.



Skapa en blogg
---------------

När du öppnar ramverket i browsern så följer 5 menyalternativ. Gå in till content-sidan där du kan skapa ett blogginlägg genom att klicka på länken "Create new content" eller du kan även gå direkt till kontrollen `content/create`. "Type" måste satt till post och "Filter" ska vara plain om du bara skriver vanlig text. Andra alternativ är bbcode och htmlpurify. 



Skapa en sida
---------------

För att skapa en sida så gör du som du gjorde när du skapade ett blogginlägg, fast "Type" måste vara page istället.
