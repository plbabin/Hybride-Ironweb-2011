<!DoCtYPe html>  
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if IE 8 ]>    <html class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Ça roule, un projet réalisé lors du Ironweb 2011</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.png">


  <!-- CSS : implied media="all" -->
  <link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>public/css/reset.css?v=2">
  <link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>public/css/form-structure.css?v=2">
  <link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>public/css/form-style.css?v=2">
  <link rel="stylesheet" href="<?php echo Kohana::$base_url; ?>public/css/layout.css?v=2">


  <!-- Uncomment if you are specifically targeting less enabled mobile browsers
  <link rel="stylesheet" media="handheld" href="<?php echo Kohana::$base_url; ?>public/css/handheld.css?v=2">  -->
 
  <!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects -->
  <script src="<?php echo Kohana::$base_url; ?>public/js/libs/modernizr-1.7.min.js"></script>
  
  
</head>

<body lang="en" data-baseurl="<?php echo Kohana::$base_url;?>" >
  	<header>
		<nav>
			<ul id="openSubLogBox">
				<li>
				    <a href="#" class="subscription">Inscription</a>
				</li>
				<li>
				    <a href="#" class="login">Connexion</a>
				</li>
			</ul>
		</nav>
		
		<form id="formSubscription" action="" method="post" class="form sublogin">
			<div class="grid-12-12">
				<label class="form-lbl" for="formSubscription-username">Nom d'usager <em class="form-req">*</em></label>
				<input type="text" name="username" value="" class="form-txt" id="formLogin-username" />
			</div>
			<div class="grid-12-12">
				<label class="form-lbl" for="formSubscription-courriel">Courriel <em class="form-req">*</em></label>
				<input type="text" name="courriel" value="" class="form-txt" id="formLogin-courriel" />
			</div>
			<div class="grid-12-12">
				<label class="form-lbl" for="formSubscription-motdepasse">Mot de passe <em class="form-req">*</em></label>
				<input type="password" name="motdepasse" value="" class="form-txt" id="formLogin-motdepasse" />
			</div>
			<div class="grid-12-12">
				<label class="form-lbl" for="formSubscription-codepostal">Code postal</label>
				<input type="password" name="codepostal" value="" class="form-txt" id="formLogin-codepostal" />
			</div>

			<a href="#" class="button">Enregistrer</a>
			<input type="submit" name="doLogin" value="Connexion" />
		</form>
		
		<form id="formLogin" action="" method="post" class="form sublogin">
			<div class="grid-12-12">
				<label class="form-lbl" for="formLogin-courriel">Courriel</label>
				<input type="text" name="courriel" value="" class="form-txt" id="formLogin-courriel" />
			</div>
			<div class="grid-12-12">
				<label class="form-lbl" for="formLogin-motdepasse">Mot de passe</label>
				<input type="password" name="motdepasse" value="" class="form-txt" id="formLogin-motdepasse" />
			</div>
			<p class="grid-5-12">
				<a href="#" class="forget">mot de passe oublié?</a>
			</p>
			<a href="#" class="button">Connexion</a>
			<input type="submit" name="doLogin" value="Connexion" />
		</form>
		
		<div id="wrapMapContainer">
			<div id="mapContainer" data-eventid="10"></div>
			<span class="greyShadow"></span>
			
			<nav>
				<ul class="fontface">
				    <li>
				        <a href="#"><span>Sainte-Foy-Sillery<br>Cap-Rouge</span></a>
				    </li>
				    <li>
				        <a href="#">La haute Sainte-Charles</a>
				    </li>
				    <li>
				        <a href="#">Les rivières</a>
				    </li>
					<li>
				        <a href="#">La cité-limoilou</a>
				    </li>
				    <li>
				        <a href="#">Charlesbourg</a>
				    </li>
				    <li>
				        <a href="#">Beauport</a>
				    </li>
				</ul>
			</nav>
		</div>
			
		<div id="midContent">
			<span class="yellowLine"></span>
			<div class="colLeft">
				<?php if(!$home): ?>
				<div id="eventResume">
					<a href="<?php echo Kohana::$base_url; ?>" class="back">Retour à l'accueil</a>
					
					<h2 class="fontface">Web à Québec (WAQ)</h2>
					<p>Conférence web à Québec plus la compétition de fou Ironweb</p>
					<a href="#" class="button red">Je partage ma voiture</a>
				</div>
				<?php else: ?>
					<h1 class="fontface">Çaroule <small>point&nbsp;ca</small></h1>
				<?php endif; ?>
			<div id="wrapAddTrack">
				<h3 class="fontface">Partager une voiture</h3>
				<a href="#" class="close">X</a>
				<form action="" method="post" class="form" id="formAddtrack">
					<div class="grid-12-12">
						<label class="form-lbl" for="formAddtrack-courriel">Votre courriel</label>
						<input type="text" name="courriel" value="" class="form-txt" id="formAddtrack-courriel" />
					</div>
					<div class="grid-12-12">
						<label class="form-lbl" for="formAddtrack-motdepasse">Votre nom</label>
						<input type="password" name="motdepasse" value="" class="form-txt" id="formAddtrack-motdepasse" />
					</div>
					<div class="grid-12-12">
						<label class="form-lbl" for="formAddtrack-message">Votre message joint à l'annonce<br>(si vous voulez une compensation, dites-le!)</label>
						<textarea name="message" id="formAddtrack-message" class="form-txt"></textarea>
					</div>
					
					<a href="#" class="button red">Partager</a>
				</form>
				</div>
			</div>
			
			<div class="colRight">
				<?php if(!$home): ?>
					<h1 class="fontface">Çaroule <small>point&nbsp;info</small></h1>
				<?php else: ?>
					<p class="intro">ÇaRoule.info, un projet qui a vu le jour lors de l’événement IronWeb 2011. </p>
					<p class="intro last">Cinq passionnés du Web ont imaginé un service qui intensifie votre expérience du covoiturage en vous rapprochant de ceux qui partagent vos intérêts.</p>
				<?php endif; ?>
			</div>
			
		</div>
		<form action="" method="post" class="form" id="searchEvent">
			<?php if($home): ?>
			<div class="form-left grid-max">
				<input type="text" name="eventname" value="Recherche un événement" class="form-txt" />
			</div>
			<?php endif; ?>
		</form>
    </header>

  <div id="content">

    	<?php echo $content; ?>
		
		<div id="partenaires"></div>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.js"></script>
  <script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.0.js"%3E%3C/script%3E'))</script>
  
  
  <!-- scripts concatenated and minified via ant build script-->
  <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
  <script src="<?php echo Kohana::$base_url; ?>public/js/core.js"></script>
  <!-- end scripts-->

  <!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
  
</body>
</html>