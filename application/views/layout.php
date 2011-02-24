<!DoCtYPe html>  
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ --> 
<!--[if IE 8 ]>    <html class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!--  Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">


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

<body lang="en" >

  <div id="container">
    <header>
		<ul id="nav">
			<li>
			    <a href="#">navigation 1</a>
			</li>
			<li>
			    <a href="#">navigation 2</a>
			</li>
			<li>
			    <a href="#">navigation 3</a>
			</li>
		</ul>
    </header>
    <div id="content">
    	<?php echo $content; ?>
    </div>
    <footer>

    </footer>
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