Ramverket Glantz- MVC-inspirerat ramverk
=========================

Glantz är gjort av Rattana Prasith och baserat på ramverket Lydia av Mikael Roos.


Installation av Glantz
---------------

1. För att kunna installera Glantz så börjar du med att klona ramverket från Github med foljande kommando
`git clone git://github.com/rattanaprasith/glantz.git`. Du behöver även Git Bash eller Git GUI på din dator för att själva kloningen skall gå att genomföra. De kan laddas ner på följande länk: http://git-scm.com/downloads

2. Ramverket ska läggas i en egen mapp. Så börjar du med att öppna mappaen som du tidigare valt i Git Bash och sedan klonar du Glantz till den valda mappen från Github med koden nedan:
	
	`git clone git://github.com/rattanaprasith/glantz.git`

3. NU har du ramverket i din dator. Det som du behöver göra sedan är att skapa data-mappen där databasen ligger. Börjar med att öppna den valda mappen i Git Bash och gör i följande steg:
	
	* Öppnar mappen "glantz" genom att skriva: `$  cd glantz` 
	* Öppnar sedna mappen "site" där du ska skapa data-mappen och skriva: `$  cd site` 
	* För att skapa data-mappen så skriver du  `$  mkdir data` 
	
Nu har data-mappen i site-katalogen.

4. Sedan ska du göra så att `site/data` blir skrivbar. Detta gör du genom att öppna den valda mappen i Git Bash och skriva med hjälp av dessa kommandon `cd glantz; chmod 777 site/data`. I vissa fall, om man har lokala filer och sedan lägger upp dessa till en extern server så kan man behöva ändra chmod på servern manuellt. För att lägga upp filer till en server så kan man använda programmet Filezilla, sedan via en sftp-server gör du en chmod 777 på data-mappen genom att högerklicka på mappen och änra filrättigheter.

5. Sedan måste du ändra i .htaccess fil för att hela siten ska fungera. Öppna filen i en filredigerare, till exempel Dreamweaver eller jEdit. Det du behöver ändra i filen är RewriteBase då behöver du ändra den till där mappen ligger på din server eller i dina lokala filer.
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
I det här fallet i site/themes-katalog så har vi det nya temat, `site/themes/newtheme` som ärver från förälder-temat, Glantz's new-tema i themes-katalog, `themes/new`. Vill du ändra layouten på ramverket kan du göra genom att ändra stylesheet i site/themes-katalogen.
Öppnar `site/themes/newtheme/style.css` i en filredigerare, till exempel Dreamweaver eller jEdit, för att ändra färg på bakgrund, html, storlek på texten och m.m. Ramverkets grund hittar du i `glantz/themes/new/style.css`.
Om du vill skapa egna teman så kan du göra genom att skapa en ny mapp i `site/themes/NamnetPåDetNyaTemat`, till exempel `site/themes/newtheme`. Sedan skapar du en stylesheet i mappen. Viktigt är att importera grund temat (det som ska ärvas) och skriva: @import url(../../../themes/new/style.css); längst upp i dokumentet. Så här ser det ut i `site/themes/newtheme/style.css` :

			/** 
			* Description: Sample theme for site which extends the Morris grid-theme.
			*/
			@import url(../../../themes/new/style.css);

			html{background: url(pink.jpg);}
			body{background-color:#fec6cd; width: 1000px;margin: 0px auto;}
			#outer-wrap-header{background-color:#FFFFFF;border-bottom:2px solid #222222}
			#outer-wrap-footer{background-color:#01040a;}
			a{color:#2a1631;}
			#navbar ul.menu li a.selected{background-color:#FFFFFF;border-bottom:none;}


Kopiera även template-filen för ditt tema, dvs. index.tpl.php, som är en vy för att visa själva temat hur det är uppbyggt, och klistra in den sedan i din valda tema-mappen. Sökvägen till ditt nya temat ska även ändras i config.php i arrayen `$gl->config['theme']. Sökvägen till ramverkets grund tema map ändrar du i `'parent' => 'themes/new'` och sökvägen till din nyskapade tema map ändrar du i `'path' => 'site/themes/newtheme'` .

* För att ändra loga kan du göra genom att ändra din logotyp i `'logo' => 'logo_rose.jpg',` . Logotypen ska läggas till ditt valda tema i site-katalogen, till exempel `site/themes/newtheme/logo_rose.jpg`. Du kan även ändra på "logo_width" och "logo_height" så att värdet stämmer med pixel antalet på den nya loggan.

* I samma array så finner du även header, `'header' => 'Glantz'` och footer, `'footer' => '<p>Glantz &copy; by Rattana Prasith</p>'` , där du kan ändra på titel och footer på webbplatsen.

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

Man kan definera flera olika menyer och i det här fallet så har vi två olika menyer, "navbar" och "my-navbar". För att välja vilen meny som ska användas då kan du göra genom att ange den i `'menu_to_region' => array('din-navbar-namn'=>'navbar'),`. Alltså i detta fallet så är navbar-menyn som används och så här ser det ut i koden: `'menu_to_region' => array('navbar'=>'navbar')` .



Skapa en blogg
---------------

När du öppnar ramverket i browsern så följer 5 menyalternativ. Gå in till content-sidan där du kan skapa ett blogginlägg genom att klicka på nedan länken "Create new content". Eller du kan även gå direkt till kontrollen `content/create`. Du ska fylla i titel, key, content, type och filter och här kommer en kort förklaring till vad dessa innebär:
	
	* Title: Rubrik på blogginlägg
	
	* Key: är ett unikt värdet för innehållet (använd till att spara en textsträng som matchar artikeln). Alltså detta kommer att fungera som en intern nyckel till ditt innehåll. Du kan inte ha mellanslag mellan orden. Använd i följande sätt: my_new_content eller my-new-content.
	
	* Content: Själva innehållet 
	
	* Type: Ett fält som bestämmer vilken typ av innehållet. I detta fall så "Type" måste satt till post.
	
	* Filter: Anger vilket filtering/formattering som skall användas. "Filter" ska vara plain om du bara skriver vanlig text. Andra alternativ är bbcode, makeClickable och htmlpurify. 



Skapa en sida
---------------

För att skapa en sida på webbplatsen så behöver du redigera tre filer: CCMycontroller.php, config.php och mittjobb.php (den nya sidan). Följ följande stegen för att lära dig hur du kan skapa en nya sida till din webbplats.
	
1. Börjar med att öppna kontrollen i site/src-katalogen, dvs. `glantz/site/src/CCMycontroller/CCMycontroller.php` . I kontrollerna innehåller tre sidor, en förstasida om mig själv "The page about me", en blogg "The blog" och en gästbok "The guestbook". Allt ligger i samma fil. Här nedan finns ett exempel på hur koden för "About me" sidan ser ut, under rubriken "The page about me":
	
			/**
			* The page about me
			*/
			public function Index() {
			$content = new CMContent(5);
			$this->views->SetTitle('About me'.htmlEnt($content['title']))
			->AddInclude(__DIR__ . '/page.tpl.php', array(
			'content' => $content,
			));
			}
			
För att börja skapa en nya sida så kan göra genom att kopiera och klistra in denna function. Det som behöver ändras är namnet på functionen ("public function index()" till "public function myWork()"), numret i $content = new CMContent(5) , titeln "About me" samt template filen "page.tpl.php".
Rubriken "The page about me" är inte nödvändig för att koden ska fungera, utan för att hålla ordning på innehållet och dokumentationen. Låt säga att du vill skapa en ny sida som visar upp allt ditt arbete, då börjar du och ta bort numret i "$content = new CMContent(5)" och ändra till "$content = new CMContent()". Ändra sedan titeln till "SetTitle('Mitt jobb'.htmlEnt($content['title']))", template-filen till "(__DIR__ . '/mittjobb.tpl.php)" och även rubriken ändras till "The page about my work" .
	
			/**
			* The page about my work
			*/
			public function myWork() {
			$content = new CMContent();
			$this->views->SetTitle('Mitt jobb'.htmlEnt($content['title']))
			->AddInclude(__DIR__ . '/mittjobb.tpl.php', array(
			'content' => $content,
			));
			}
			
2. Nästa steg som behöver göras är att definera webbsidans meny i `/site/config.php`. Så här kan det se ut:
	
			'my-navbar' => array(
			'home'      => array('label'=>'About Me', 'url'=>'my'),
			'blog'      => array('label'=>'My Blog', 'url'=>'my/blog'),
			'work' => array('label'=>'Mitt jobb', 'url'=>'my/myWork'),
			'guestbook' => array('label'=>'Guestbook', 'url'=>'my/guestbook'),
			),
			);
			
Menyn "work" har nu lagts till i navigeringsmenyn och du kan lägga den i vilken ordning som du än önskar. 
	
3. Det sista som behöver göras är att skapa en ny template fil, vilket i det här fallet är mittjobb.tpl.php. Du kan kopiera filen "page.tpl.php" och döp om den till "mittjobb.tpl.php" och fylla med kod som än du vill. Spara filen i samma katalogen dvs. `site/src/CCMycontroller` och öppnar online på adressen: www.yourserver/glantz/my/myWork
Här kan du se resultatet : http://www.student.bth.se/~rapr13/phpmvc/kmom08/glantz/my/myWork
			
