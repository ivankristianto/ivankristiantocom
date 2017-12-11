<?php die(); ?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html lang="en-US" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<!--<![endif]-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="https://www.ivankristianto.com/xmlrpc.php" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700|Noto+Sans:400,700" media="screen"><title>Solve FTP Passive Mode Issue In WHM/Cpanel With CSF - Ivan Kristianto</title>

<!-- This site is optimized with the Yoast SEO plugin v5.9.1 - https://yoast.com/wordpress/plugins/seo/ -->
<link rel="canonical" href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/" />
<link rel="publisher" href="https://plus.google.com/+Ivankristianto/about"/>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Solve FTP Passive Mode Issue In WHM/Cpanel With CSF - Ivan Kristianto" />
<meta property="og:description" content="Installing a Firewall (eg: Config Security Firewall/CSF) is one step to hardening security of your webserver. But this come with an issue that CSF block PureFTPd/ProFTPd server, so your FTP client cannot connect to FTP server with passive mode. This is because CSF block the passive connection ports. To enable it you need set the &hellip;" />
<meta property="og:url" content="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/" />
<meta property="og:site_name" content="Ivan Kristianto" />
<meta property="article:publisher" content="http://www.facebook.com/IvanKristiantoBlog" />
<meta property="article:tag" content="CSF" />
<meta property="article:tag" content="csf block ftp" />
<meta property="article:tag" content="csf firewall ftp" />
<meta property="article:tag" content="csf ftp" />
<meta property="article:tag" content="csf passive mode" />
<meta property="article:tag" content="ftp" />
<meta property="article:tag" content="ftp issue cpanel" />
<meta property="article:tag" content="ftp passive mode" />
<meta property="article:tag" content="ftp passive mode cpanel" />
<meta property="article:tag" content="PHP Curl FTP passive" />
<meta property="article:tag" content="pure-ftpd ftps" />
<meta property="article:tag" content="whm pure-ftp conf" />
<meta property="article:section" content="Web Server" />
<meta property="article:published_time" content="2010-11-12T00:20:09+07:00" />
<meta property="article:modified_time" content="2013-08-03T23:02:30+07:00" />
<meta property="og:updated_time" content="2013-08-03T23:02:30+07:00" />
<meta property="fb:app_id" content="306940476037353" />
<meta property="og:image" content="https://www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg" />
<meta property="og:image:secure_url" content="https://www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg" />
<meta property="og:image:width" content="450" />
<meta property="og:image:height" content="250" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Installing a Firewall (eg: Config Security Firewall/CSF) is one step to hardening security of your webserver. But this come with an issue that CSF block PureFTPd/ProFTPd server, so your FTP client cannot connect to FTP server with passive mode. This is because CSF block the passive connection ports. To enable it you need set the [&hellip;]" />
<meta name="twitter:title" content="Solve FTP Passive Mode Issue In WHM/Cpanel With CSF - Ivan Kristianto" />
<meta name="twitter:site" content="@ivankrisdotcom" />
<meta name="twitter:image" content="https://i2.wp.com/www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg?fit=450%2C250&#038;ssl=1" />
<meta name="twitter:creator" content="@ivankrisdotcom" />
<script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"WebSite","@id":"#website","url":"https:\/\/www.ivankristianto.com\/","name":"Ivan Kristianto","potentialAction":{"@type":"SearchAction","target":"https:\/\/www.ivankristianto.com\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>
<script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"Person","url":"https:\/\/www.ivankristianto.com\/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf\/","sameAs":["http:\/\/www.facebook.com\/IvanKristiantoBlog","https:\/\/plus.google.com\/+Ivankristianto\/about","https:\/\/twitter.com\/ivankrisdotcom"],"@id":"#person","name":"Ivan Kristianto"}</script>
<!-- / Yoast SEO plugin. -->

<link rel='dns-prefetch' href='//www.ivankristianto.com' />
<link rel='dns-prefetch' href='//s0.wp.com' />
<link rel="alternate" type="application/rss+xml" title="Ivan Kristianto &raquo; Feed" href="http://feeds2.feedburner.com/ivankristianto" />
<link rel="alternate" type="application/rss+xml" title="Ivan Kristianto &raquo; Comments Feed" href="http://feeds2.feedburner.com/ivankristianto" />
<link rel="alternate" type="application/rss+xml" title="Ivan Kristianto &raquo; Solve FTP Passive Mode Issue In WHM/Cpanel With CSF Comments Feed" href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/feed/" />
<link rel='stylesheet' id='formidable-css'  href='https://www.ivankristianto.com/uploads/formidable/css/formidablepro.css' type='text/css' media='all' />
<link rel='stylesheet' id='font-awesome-css'  href='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/css/font-awesome.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='calibrefx-icons-css'  href='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/css/cfxicons.css' type='text/css' media='all' />
<link rel='stylesheet' id='genericons-css'  href='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/css/genericons.css' type='text/css' media='all' />
<link rel='stylesheet' id='jquery-superfish-css'  href='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/css/superfish.css' type='text/css' media='all' />
<link rel='stylesheet' id='calibrefx-shortcodes-css'  href='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/css/shortcodes.css' type='text/css' media='all' />
<link rel='stylesheet' id='twitter-bootstrap-css'  href='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/css/bootstrap.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='calibrefx-style-css'  href='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/css/calibrefx.css' type='text/css' media='all' />
<link rel='stylesheet' id='calibrefx-child-style-css'  href='https://www.ivankristianto.com/wp-content/themes/minimalist/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='wp-blocks-css'  href='https://www.ivankristianto.com/wp-content/plugins/gutenberg/blocks/build/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='webfont-style-css'  href='https://www.ivankristianto.com/wp-content/themes/calibrefx/modules/custom-fonts/css/webfont.css' type='text/css' media='all' />
<style id='webfont-style-inline-css' type='text/css'>
body{
    font-size: 16px;
    color: #444444;
    font-family: "Noto Sans", sans-serif
}
p, li, input, textarea, select, button{
    font-family: "Noto Sans", sans-serif
}
h1, h2, h3, h4, h5, h6{
    font-family: "Noto Sans", sans-serif
}
a, a:visited{
    color: #414141;
}
.post h2.entry-title a, .page h2.entry-title a, .page h1.entry-title a{
    color: #414141;
}
a:hover{
    color: #c0392b;
}
.post h2.entry-title a:hover, .page h2.entry-title a:hover, .page h1.entry-title a:hover{
    color: #c0392b;
}
</style>
<link rel='stylesheet' id='social-logos-css'  href='https://www.ivankristianto.com/wp-content/plugins/jetpack/_inc/social-logos/social-logos.min.css' type='text/css' media='all' />
<link rel='stylesheet' id='jetpack_css-css'  href='https://www.ivankristianto.com/wp-content/plugins/jetpack/css/jetpack.css' type='text/css' media='all' />
<script type='text/javascript' src='https://www.ivankristianto.com/wp-includes/js/jquery/jquery.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-includes/js/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var related_posts_js_options = {"post_heading":"h4"};
/* ]]> */
</script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/jetpack/modules/related-posts/related-posts.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/js/modernizr.min.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/js/bootstrap.min.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/js/jquery.validate.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var cfx_ajax = {"ajaxurl":"https:\/\/www.ivankristianto.com\/wp-admin\/admin-ajax.php","ajax_action":"cfx_ajax","_ajax_nonce":"8b5c90ff0a"};
/* ]]> */
</script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/js/calibrefx.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/themes/minimalist/assets/js/functions.js'></script>
<link rel='https://api.w.org/' href='https://www.ivankristianto.com/wp-json/' />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://www.ivankristianto.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://www.ivankristianto.com/wp-includes/wlwmanifest.xml" /> 
<link rel='shortlink' href='https://www.ivankristianto.com/?p=1551' />
<link rel="alternate" type="application/json+oembed" href="https://www.ivankristianto.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.ivankristianto.com%2Fsolve-ftp-passive-mode-issue-in-whmcpanel-with-csf%2F" />
<link rel="alternate" type="text/xml+oembed" href="https://www.ivankristianto.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.ivankristianto.com%2Fsolve-ftp-passive-mode-issue-in-whmcpanel-with-csf%2F&#038;format=xml" />
<script type="text/javascript">document.documentElement.className += " js";</script>

<link rel='dns-prefetch' href='//i0.wp.com'/>
<link rel='dns-prefetch' href='//i1.wp.com'/>
<link rel='dns-prefetch' href='//i2.wp.com'/>
<link rel='dns-prefetch' href='//jetpack.wordpress.com'/>
<link rel='dns-prefetch' href='//s0.wp.com'/>
<link rel='dns-prefetch' href='//s1.wp.com'/>
<link rel='dns-prefetch' href='//s2.wp.com'/>
<link rel='dns-prefetch' href='//public-api.wordpress.com'/>
<link rel='dns-prefetch' href='//0.gravatar.com'/>
<link rel='dns-prefetch' href='//1.gravatar.com'/>
<link rel='dns-prefetch' href='//2.gravatar.com'/>
<link rel='dns-prefetch' href='//widgets.wp.com'/>
<style type='text/css'>img#wpstats{display:none}</style>	<link href='//fonts.googleapis.com/css?family=Comfortaa:400,700' rel='stylesheet' type='text/css'>
<style type="text/css"> 
.layout-wrapper-fluid .container, 
.layout-wrapper-fixed #wrapper {
max-width: 1160px;
}
</style>
<style type="text/css"> 
#title, #title a{ 
	color: 000000
}
</style>
<style type="text/css" id="custom-background-css">
body.custom-background { background-color: #ffffff; }
</style>
<link rel="amphtml" href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/amp/" /><style type="text/css" id="syntaxhighlighteranchor"></style>
<style type="text/css"></style><link rel="icon" href="https://i2.wp.com/www.ivankristianto.com/uploads/2015/08/cropped-favicon64.png?fit=32%2C32&#038;ssl=1" sizes="32x32" />
<link rel="icon" href="https://i2.wp.com/www.ivankristianto.com/uploads/2015/08/cropped-favicon64.png?fit=192%2C192&#038;ssl=1" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://i2.wp.com/www.ivankristianto.com/uploads/2015/08/cropped-favicon64.png?fit=180%2C180&#038;ssl=1" />
<meta name="msapplication-TileImage" content="https://i2.wp.com/www.ivankristianto.com/uploads/2015/08/cropped-favicon64.png?fit=270%2C270&#038;ssl=1" />
</head>
<body onload="" class="post-template-default single single-post postid-1551 single-format-standard custom-background sidebar-content layout-wrapper-fluid responsive static" >
<div id="wrapper" class="site "><div id="header"><div class="container"><div id="header-title" class="pull-left"><h2 id="title" class="site-title"><a href="https://www.ivankristianto.com/" title="Ivan Kristianto" class="site-title">IvanKristianto</a></h2><p id="description" class="site-description">Passionately Share and Learn</p></div><!-- end #header-title --><div id="header-right" class="pull-right"><div id="social-icon-widget-2" class="widget widget_social_icon"><div class="social-media-wrapper"><ul class="social-media-list horizontal"><li class="twitter">
					<a href="http://twitter.com/ivankrisdotcom" title="View us on twitter" target="_blank">
						<i class="social-icon cfxicons cfxicon-twitter"></i>
						</span>
					</a>
				</li><li class="linkedin">
					<a href="http://id.linkedin.com/in/ivankristianto" title="View us on linkedin" target="_blank">
						<i class="social-icon cfxicons cfxicon-linkedin"></i>
						</span>
					</a>
				</li><li class="github">
					<a href="https://github.com/ivankristianto" title="View us on github" target="_blank">
						<i class="social-icon cfxicons cfxicon-github"></i>
						</span>
					</a>
				</li></ul></div></div>
</div><!-- end #header-right --></div><!-- end .container --></div><!--end #header-->
				<div id="nav" class="navbar navbar-default">
					<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="navbar-brand">MENU</span>                            
							<span class="menu-toggle-icon">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</span>
						</button>
					</div>
					<div class="collapse navbar-collapse" role="navigation"><ul id="menu-primary" class="nav navbar-nav menu-primary menu superfish"><li id="menu-item-702" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-702"><a href="http://www.ivankristianto.com/">Home</a></li>
<li id="menu-item-2140" class="menu-item menu-item-type-taxonomy menu-item-object-category current-post-ancestor menu-item-has-children menu-item-2140 dropdown"><a href="https://www.ivankristianto.com/category/web-development/">Web Development</a>
<ul class="dropdown-menu sub-menu">
	<li id="menu-item-2622" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2622"><a href="https://www.ivankristianto.com/category/web-development/programming/">Learn PHP</a></li>
	<li id="menu-item-2635" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2635"><a href="https://www.ivankristianto.com/category/web-development/git/">Git Tips</a></li>
	<li id="menu-item-2624" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2624"><a href="https://www.ivankristianto.com/category/web-development/designs/">Web Design</a></li>
	<li id="menu-item-2623" class="menu-item menu-item-type-taxonomy menu-item-object-category current-post-ancestor current-menu-parent current-post-parent menu-item-2623 active"><a href="https://www.ivankristianto.com/category/web-development/server/">Web Server</a></li>
	<li id="menu-item-2636" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2636"><a href="https://www.ivankristianto.com/category/hacking/">Security</a></li>
	<li id="menu-item-2621" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2621"><a href="https://www.ivankristianto.com/category/internet/browser/">Web Browser</a></li>
</ul>
</li>
<li id="menu-item-2141" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-2141 dropdown"><a href="https://www.ivankristianto.com/category/wordpress/">WordPress</a>
<ul class="dropdown-menu sub-menu">
	<li id="menu-item-2633" class="menu-item menu-item-type-taxonomy menu-item-object-post_tag menu-item-2633"><a href="https://www.ivankristianto.com/tag/wordpress-series/">Learning WordPress</a></li>
	<li id="menu-item-2634" class="menu-item menu-item-type-taxonomy menu-item-object-post_tag menu-item-2634"><a href="https://www.ivankristianto.com/tag/wordpress-tips/">Tips &#038; Tricks</a></li>
	<li id="menu-item-2631" class="menu-item menu-item-type-taxonomy menu-item-object-post_tag menu-item-2631"><a href="https://www.ivankristianto.com/tag/wordpress-plugins/">Useful Plugins</a></li>
	<li id="menu-item-2632" class="menu-item menu-item-type-taxonomy menu-item-object-post_tag menu-item-2632"><a href="https://www.ivankristianto.com/tag/wordpress-themes/">Themes</a></li>
</ul>
</li>
<li id="menu-item-2625" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-2625 dropdown"><a href="https://www.ivankristianto.com/category/os/">Operating System</a>
<ul class="dropdown-menu sub-menu">
	<li id="menu-item-2139" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2139"><a href="https://www.ivankristianto.com/category/os/ubuntu/">Ubuntu</a></li>
	<li id="menu-item-2628" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2628"><a href="https://www.ivankristianto.com/category/os/windows/">Windows</a></li>
	<li id="menu-item-2626" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2626"><a href="https://www.ivankristianto.com/category/os/android/">Android</a></li>
	<li id="menu-item-2627" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2627"><a href="https://www.ivankristianto.com/category/os/ios/">iOS</a></li>
</ul>
</li>
<li id="menu-item-2137" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-2137 dropdown"><a href="https://www.ivankristianto.com/category/cloud-computing/">Cloud Computing</a>
<ul class="dropdown-menu sub-menu">
	<li id="menu-item-2637" class="menu-item menu-item-type-taxonomy menu-item-object-post_tag menu-item-2637"><a href="https://www.ivankristianto.com/tag/saas/">Software As a Service</a></li>
	<li id="menu-item-2638" class="menu-item menu-item-type-taxonomy menu-item-object-post_tag menu-item-2638"><a href="https://www.ivankristianto.com/tag/iaas/">Infrastructure As a Service</a></li>
</ul>
</li>
<li id="menu-item-2033" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2033"><a href="https://www.ivankristianto.com/about/">About Me</a></li>

		<form method="get" class="searchform" action="https://www.ivankristianto.com/" >
			<div class="input-group">
				<input type="text" value="Search&hellip;" name="s" class="s form-control" onfocus="if (this.value == 'Search&hellip;' ) {this.value = '';}" onblur="if (this.value == '' ) {this.value = 'Search&hellip;';}" />
				<span class="input-group-btn">
					<input type="submit" class="searchsubmit btn btn-primary" value="Search" />
				</span>
			</div>
		</form>
	</ul></div>  
					</div><!-- end .container -->
				</div>
				<!-- end #nav --><div id="inner" class="" ><div class="container">    <div id="content-wrapper" class="row " >
                <div id="content" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="breadcrumb-container" xmlns:v="http://rdf.data-vocabulary.org/#"><span class="breadcrumb-label">You are here: </span><ol class="breadcrumb" itemprop="breadcrumb"><li typeof="v:Breadcrumb"><a href="https://www.ivankristianto.com/" title="View Home" rel="v:url" property="v:title">Home</a></li><li typeof="v:Breadcrumb"><a href="https://www.ivankristianto.com/category/web-development/" title="View all items in Web Development" rel="v:url" property="v:title">Web Development</a>&raquo;<a href="https://www.ivankristianto.com/category/web-development/server/" title="View all items in Web Server" rel="v:url" property="v:title">Web Server</a></li><li typeof="v:Breadcrumb">Solve FTP Passive Mode Issue In WHM/Cpanel With CSF</li></ol></div><div id="post-1551" class="post-1551 post type-post status-publish format-standard has-post-thumbnail hentry category-server tag-csf tag-csf-block-ftp tag-csf-firewall-ftp tag-csf-ftp tag-csf-passive-mode tag-ftp tag-ftp-issue-cpanel tag-ftp-passive-mode tag-ftp-passive-mode-cpanel tag-php-curl-ftp-passive tag-pure-ftpd-ftps tag-whm-pure-ftp-conf">
    <p class="post-featured-image"><img width="450" height="250" src="https://i2.wp.com/www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg?fit=450%2C250&amp;ssl=1" class="alignnone post-image img-responsive wp-post-image" alt="" srcset="https://i2.wp.com/www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg?w=450&amp;ssl=1 450w, https://i2.wp.com/www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg?resize=300%2C166&amp;ssl=1 300w" sizes="(max-width: 450px) 100vw, 450px" data-attachment-id="2300" data-permalink="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/slider-whm/" data-orig-file="https://i2.wp.com/www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg?fit=450%2C250&amp;ssl=1" data-orig-size="450,250" data-comments-opened="1" data-image-meta="{&quot;aperture&quot;:&quot;0&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;0&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;0&quot;,&quot;iso&quot;:&quot;0&quot;,&quot;shutter_speed&quot;:&quot;0&quot;,&quot;title&quot;:&quot;&quot;}" data-image-title="slider-WHM" data-image-description="" data-medium-file="https://i2.wp.com/www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg?fit=300%2C166&amp;ssl=1" data-large-file="https://i2.wp.com/www.ivankristianto.com/uploads/2010/11/slider-WHM.jpg?fit=450%2C250&amp;ssl=1" /></p><div class='ads-after-image'><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- After Feature Image Responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5132818893953017"
     data-ad-slot="7709075123"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>    <h1 class="entry-title">Solve FTP Passive Mode Issue In WHM/Cpanel With CSF</h1>
    
    <div class="post-info"><span class="date published time" title="2010-11-12T00:20:09+00:00">November 12, 2010</span>    <span class="post-comments"> &#8226; <a href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/#respond">Leave a Comment</a></span> </div>    <div class="entry-content">
        <p>Installing a Firewall (eg: Config Security Firewall/CSF) is one step to hardening security of your webserver. But this come with an issue that CSF block PureFTPd/ProFTPd server, so your FTP client cannot connect to FTP server with passive mode. This is because CSF block the passive connection ports. To enable it you need set the ip range for passive connection, and make sure you are not block it from CSF.</p>
<p>To do that, you need to edit your FTP server configuration.</p>
<p>For PureFTPd:<br />
open /etc/pure-ftpd.conf, and enable this line:</p>
<pre class="brush: bash; title: ; notranslate" title="">
PassivePortRange    30000 35000
</pre>
<p>For ProFTPd:<br />
open /etc/pure-ftpd.conf, and enable this line:</p>
<pre class="brush: bash; title: ; notranslate" title="">
PassivePorts    30000 35000
</pre>
<p>Now you need to unblock that port range from CSF. Open CSF Firewall configuration from your WHM, and add that ports in TCP_IN, so it would like this:<br />
TCP_IN: 20,21,22,25,53,80,110,143,443,30000:35000</p>
<p>Now restart both your CSF and FTP server. And once it done, you will able to connect to your FTP server with passive mode</p>
<div class="sharedaddy sd-sharing-enabled"><div class="robots-nocontent sd-block sd-social sd-social-icon-text sd-sharing"><h3 class="sd-title">Share this:</h3><div class="sd-content"><ul><li class="share-facebook"><a rel="nofollow" data-shared="sharing-facebook-1551" class="share-facebook sd-button share-icon" href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/?share=facebook" target="_blank" title="Click to share on Facebook"><span>Facebook</span></a></li><li class="share-twitter"><a rel="nofollow" data-shared="sharing-twitter-1551" class="share-twitter sd-button share-icon" href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/?share=twitter" target="_blank" title="Click to share on Twitter"><span>Twitter</span></a></li><li class="share-google-plus-1"><a rel="nofollow" data-shared="sharing-google-1551" class="share-google-plus-1 sd-button share-icon" href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/?share=google-plus-1" target="_blank" title="Click to share on Google+"><span>Google</span></a></li><li class="share-linkedin"><a rel="nofollow" data-shared="sharing-linkedin-1551" class="share-linkedin sd-button share-icon" href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/?share=linkedin" target="_blank" title="Click to share on LinkedIn"><span>LinkedIn</span></a></li><li class="share-pocket"><a rel="nofollow" data-shared="" class="share-pocket sd-button share-icon" href="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/?share=pocket" target="_blank" title="Click to share on Pocket"><span>Pocket</span></a></li><li class="share-end"></li></ul></div></div></div><div class='sharedaddy sd-block sd-like jetpack-likes-widget-wrapper jetpack-likes-widget-unloaded' id='like-post-wrapper-6196678-1551-5a2e8ca65a5d9' data-src='https://widgets.wp.com/likes/#blog_id=6196678&amp;post_id=1551&amp;origin=www.ivankristianto.com&amp;obj_id=6196678-1551-5a2e8ca65a5d9' data-name='like-post-frame-6196678-1551-5a2e8ca65a5d9'><h3 class="sd-title">Like this:</h3><div class='likes-widget-placeholder post-likes-widget-placeholder' style='height: 55px;'><span class='button'><span>Like</span></span> <span class="loading">Loading...</span></div><span class='sd-text-color'></span><a class='sd-link-color'></a></div>
<div id='jp-relatedposts' class='jp-relatedposts' >
	<h3 class="jp-relatedposts-headline"><em>Related</em></h3>
</div><!--<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
			xmlns:dc="http://purl.org/dc/elements/1.1/"
			xmlns:trackback="http://madskills.com/public/xml/rss/module/trackback/">
		<rdf:Description rdf:about="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/"
    dc:identifier="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/"
    dc:title="Solve FTP Passive Mode Issue In WHM/Cpanel With CSF"
    trackback:ping="https://www.ivankristianto.com/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/trackback/" />
</rdf:RDF>-->
    </div><!-- end .entry-content -->
    <div class="post-meta"><span class="categories">Categories: <a href="https://www.ivankristianto.com/category/web-development/server/" rel="category tag">Web Server</a></span>  <span class="tags">Tagged With: <a href="https://www.ivankristianto.com/tag/csf/" rel="tag">CSF</a>, <a href="https://www.ivankristianto.com/tag/csf-block-ftp/" rel="tag">csf block ftp</a>, <a href="https://www.ivankristianto.com/tag/csf-firewall-ftp/" rel="tag">csf firewall ftp</a>, <a href="https://www.ivankristianto.com/tag/csf-ftp/" rel="tag">csf ftp</a>, <a href="https://www.ivankristianto.com/tag/csf-passive-mode/" rel="tag">csf passive mode</a>, <a href="https://www.ivankristianto.com/tag/ftp/" rel="tag">ftp</a>, <a href="https://www.ivankristianto.com/tag/ftp-issue-cpanel/" rel="tag">ftp issue cpanel</a>, <a href="https://www.ivankristianto.com/tag/ftp-passive-mode/" rel="tag">ftp passive mode</a>, <a href="https://www.ivankristianto.com/tag/ftp-passive-mode-cpanel/" rel="tag">ftp passive mode cpanel</a>, <a href="https://www.ivankristianto.com/tag/php-curl-ftp-passive/" rel="tag">PHP Curl FTP passive</a>, <a href="https://www.ivankristianto.com/tag/pure-ftpd-ftps/" rel="tag">pure-ftpd ftps</a>, <a href="https://www.ivankristianto.com/tag/whm-pure-ftp-conf/" rel="tag">whm pure-ftp conf</a></span> </div><div id="comments" class="no-comments"></div><!--end #comments-->
		<div id="respond" class="comment-respond">
							<h3 id="reply-title" class="comment-reply-title">Give me your feedback					<small><a rel="nofollow" id="cancel-comment-reply-link" href="/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf/#respond" style="display:none;">Cancel reply</a></small>
				</h3>
						<form id="commentform" class="comment-form">
				<iframe src="https://jetpack.wordpress.com/jetpack-comment/?blogid=6196678&#038;postid=1551&#038;comment_registration=0&#038;require_name_email=1&#038;stc_enabled=0&#038;stb_enabled=0&#038;show_avatars=1&#038;avatar_default=mystery&#038;greeting=Give+me+your+feedback&#038;greeting_reply=Leave+a+Reply+to+%25s&#038;color_scheme=light&#038;lang=en_US&#038;jetpack_version=5.6&#038;sig=384bc073161bd589613869b820e5cfbf262fa456#parent=https%3A%2F%2Fwww.ivankristianto.com%2Fsolve-ftp-passive-mode-issue-in-whmcpanel-with-csf%2F" style="width:100%; height: 430px; border:0;" name="jetpack_remote_comment" class="jetpack_remote_comment" id="jetpack_remote_comment"></iframe>
				<!--[if !IE]><!-->
				<script>
					document.addEventListener('DOMContentLoaded', function () {
						var commentForms = document.getElementsByClassName('jetpack_remote_comment');
						for (var i = 0; i < commentForms.length; i++) {
							commentForms[i].allowTransparency = false;
							commentForms[i].scrolling = 'no';
						}
					});
				</script>
				<!--<![endif]-->
			</form>
		</div>

		
		<input type="hidden" name="comment_parent" id="comment_parent" value="" />

		
</div><!-- end .postclass -->
        </div><!-- end #content -->
        
<div id="sidebar" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 sidebar widget-area">
<div id="grofile-2" class="widget widget-grofile grofile"><h4 class="widgettitle">About Me</h4>
			<img src="https://secure.gravatar.com/avatar/300f565b24f0cf1711fb33fc9b311f9c?s=320" class="grofile-thumbnail no-grav" alt="Ivan Kristianto" />
			<div class="grofile-meta">
				<h4><a href="http://gravatar.com/ivankristianto">Ivan Kristianto</a></h4>
				<p>I am a WordPress Engineer, with more than 10 years of experiences in various industries. Active in WordPress community in Indonesia and also WordCamp Jakarta Organizer.</p>
			</div>

			
			<p><a href="http://gravatar.com/ivankristianto" class="grofile-full-link">
				View Full Profile &rarr;			</a></p>

			</div>
<div id="custom_html-2" class="widget_text widget widget_custom_html nopadding noborder"><div class="textwidget custom-html-widget"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Sidebar Ads Responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5132818893953017"
     data-ad-slot="3558077120"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div></div>
</div>    </div><!-- end #content-wrapper -->
    </div><!-- end .container --></div><!-- end #inner --><div id="footer"><div class="container"><div id="footer-wrapper" class="clearfix"><div class="credits pull-left"><p>Copyright &copy; 2017 &middot; <a href="http://www.ivankristianto.com" title="minimalist">minimalist</a> built on  <a href="" title="Calibrefx Framework">Calibrefx Framework</a> &middot; Powered By  <a href="http://wordpress.org/" title="WordPress">WordPress</a> &middot;</p></div><div class="pull-right scrolltop"><p><a href="#wrapper" rel="nofollow"><i class="fa fa-chevron-circle-up"></i> Return To Top</a></p></div></div><!-- end #footer-wrapper --></div><!-- end .container --></div><!-- end #footer -->
</div><!-- end #wrapper --><script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-5721705-1', 'auto');
  ga('send', 'pageview');

</script>
	<script type="text/javascript">
		window.WPCOM_sharing_counts = {"https:\/\/www.ivankristianto.com\/solve-ftp-passive-mode-issue-in-whmcpanel-with-csf\/":1551};
	</script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/syntaxhighlighter/syntaxhighlighter3/scripts/shCore.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/syntaxhighlighter/syntaxhighlighter3/scripts/shBrushBash.js'></script>
<script type='text/javascript'>
	(function(){
		var corecss = document.createElement('link');
		var themecss = document.createElement('link');
		var corecssurl = "https://www.ivankristianto.com/wp-content/plugins/syntaxhighlighter/syntaxhighlighter3/styles/shCore.css?ver=3.0.9b";
		if ( corecss.setAttribute ) {
				corecss.setAttribute( "rel", "stylesheet" );
				corecss.setAttribute( "type", "text/css" );
				corecss.setAttribute( "href", corecssurl );
		} else {
				corecss.rel = "stylesheet";
				corecss.href = corecssurl;
		}
		document.getElementsByTagName("head")[0].insertBefore( corecss, document.getElementById("syntaxhighlighteranchor") );
		var themecssurl = "https://www.ivankristianto.com/wp-content/plugins/syntaxhighlighter/syntaxhighlighter3/styles/shThemeRDark.css?ver=3.0.9b";
		if ( themecss.setAttribute ) {
				themecss.setAttribute( "rel", "stylesheet" );
				themecss.setAttribute( "type", "text/css" );
				themecss.setAttribute( "href", themecssurl );
		} else {
				themecss.rel = "stylesheet";
				themecss.href = themecssurl;
		}
		//document.getElementById("syntaxhighlighteranchor").appendChild(themecss);
		document.getElementsByTagName("head")[0].insertBefore( themecss, document.getElementById("syntaxhighlighteranchor") );
	})();
	SyntaxHighlighter.config.strings.expandSource = '+ expand source';
	SyntaxHighlighter.config.strings.help = '?';
	SyntaxHighlighter.config.strings.alert = 'SyntaxHighlighter\n\n';
	SyntaxHighlighter.config.strings.noBrush = 'Can\'t find brush for: ';
	SyntaxHighlighter.config.strings.brushNotHtmlScript = 'Brush wasn\'t configured for html-script option: ';
	SyntaxHighlighter.defaults['auto-links'] = false;
	SyntaxHighlighter.defaults['pad-line-numbers'] = true;
	SyntaxHighlighter.defaults['smart-tabs'] = false;
	SyntaxHighlighter.defaults['toolbar'] = false;
	SyntaxHighlighter.all();
</script>
<link rel='stylesheet' id='gravatar-card-services-css'  href='https://secure.gravatar.com/css/services.css?ver=201750' type='text/css' media='all' />
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/js/shortcodes.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-includes/js/comment-reply.min.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/themes/calibrefx/assets/js/superfish.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/jetpack/modules/photon/photon.js'></script>
<script type='text/javascript' src='https://s0.wp.com/wp-content/js/devicepx-jetpack.js?ver=201750'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-includes/js/wp-embed.min.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/jetpack/_inc/build/postmessage.min.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/jetpack/_inc/build/jquery.jetpack-resize.min.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/jetpack/modules/likes/queuehandler.js'></script>
<script async="async" type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/akismet/_inc/form.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var sharing_js_options = {"lang":"en","counts":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/jetpack/modules/sharedaddy/sharing.js'></script>
<script type='text/javascript'>
var windowOpen;
			jQuery( document.body ).on( 'click', 'a.share-facebook', function() {
				// If there's another sharing window open, close it.
				if ( 'undefined' !== typeof windowOpen ) {
					windowOpen.close();
				}
				windowOpen = window.open( jQuery( this ).attr( 'href' ), 'wpcomfacebook', 'menubar=1,resizable=1,width=600,height=400' );
				return false;
			});
var windowOpen;
			jQuery( document.body ).on( 'click', 'a.share-twitter', function() {
				// If there's another sharing window open, close it.
				if ( 'undefined' !== typeof windowOpen ) {
					windowOpen.close();
				}
				windowOpen = window.open( jQuery( this ).attr( 'href' ), 'wpcomtwitter', 'menubar=1,resizable=1,width=600,height=350' );
				return false;
			});
var windowOpen;
			jQuery( document.body ).on( 'click', 'a.share-google-plus-1', function() {
				// If there's another sharing window open, close it.
				if ( 'undefined' !== typeof windowOpen ) {
					windowOpen.close();
				}
				windowOpen = window.open( jQuery( this ).attr( 'href' ), 'wpcomgoogle-plus-1', 'menubar=1,resizable=1,width=480,height=550' );
				return false;
			});
var windowOpen;
			jQuery( document.body ).on( 'click', 'a.share-linkedin', function() {
				// If there's another sharing window open, close it.
				if ( 'undefined' !== typeof windowOpen ) {
					windowOpen.close();
				}
				windowOpen = window.open( jQuery( this ).attr( 'href' ), 'wpcomlinkedin', 'menubar=1,resizable=1,width=580,height=450' );
				return false;
			});
var windowOpen;
			jQuery( document.body ).on( 'click', 'a.share-pocket', function() {
				// If there's another sharing window open, close it.
				if ( 'undefined' !== typeof windowOpen ) {
					windowOpen.close();
				}
				windowOpen = window.open( jQuery( this ).attr( 'href' ), 'wpcompocket', 'menubar=1,resizable=1,width=450,height=450' );
				return false;
			});
</script>
	<iframe src='https://widgets.wp.com/likes/master.html?ver=20171126#ver=20171126' scrolling='no' id='likes-master' name='likes-master' style='display:none;'></iframe>
	<div id='likes-other-gravatars'><div class="likes-text"><span>%d</span> bloggers like this:</div><ul class="wpl-avatars sd-like-gravatars"></ul></div>
	
		<!--[if IE]>
		<script type="text/javascript">
			if ( 0 === window.location.hash.indexOf( '#comment-' ) ) {
				// window.location.reload() doesn't respect the Hash in IE
				window.location.hash = window.location.hash;
			}
		</script>
		<![endif]-->
		<script type="text/javascript">
			(function () {
				var comm_par_el = document.getElementById( 'comment_parent' ),
					comm_par = ( comm_par_el && comm_par_el.value ) ? comm_par_el.value : '',
					frame = document.getElementById( 'jetpack_remote_comment' ),
					tellFrameNewParent;

				tellFrameNewParent = function () {
					if ( comm_par ) {
						frame.src = "https://jetpack.wordpress.com/jetpack-comment/?blogid=6196678&postid=1551&comment_registration=0&require_name_email=1&stc_enabled=0&stb_enabled=0&show_avatars=1&avatar_default=mystery&greeting=Give+me+your+feedback&greeting_reply=Leave+a+Reply+to+%25s&color_scheme=light&lang=en_US&jetpack_version=5.6&sig=384bc073161bd589613869b820e5cfbf262fa456#parent=https%3A%2F%2Fwww.ivankristianto.com%2Fsolve-ftp-passive-mode-issue-in-whmcpanel-with-csf%2F" + '&replytocom=' + parseInt( comm_par, 10 ).toString();
					} else {
						frame.src = "https://jetpack.wordpress.com/jetpack-comment/?blogid=6196678&postid=1551&comment_registration=0&require_name_email=1&stc_enabled=0&stb_enabled=0&show_avatars=1&avatar_default=mystery&greeting=Give+me+your+feedback&greeting_reply=Leave+a+Reply+to+%25s&color_scheme=light&lang=en_US&jetpack_version=5.6&sig=384bc073161bd589613869b820e5cfbf262fa456#parent=https%3A%2F%2Fwww.ivankristianto.com%2Fsolve-ftp-passive-mode-issue-in-whmcpanel-with-csf%2F";
					}
				};

				
				if ( 'undefined' !== typeof addComment ) {
					addComment._Jetpack_moveForm = addComment.moveForm;

					addComment.moveForm = function ( commId, parentId, respondId, postId ) {
						var returnValue = addComment._Jetpack_moveForm( commId, parentId, respondId, postId ),
							cancelClick, cancel;

						if ( false === returnValue ) {
							cancel = document.getElementById( 'cancel-comment-reply-link' );
							cancelClick = cancel.onclick;
							cancel.onclick = function () {
								var cancelReturn = cancelClick.call( this );
								if ( false !== cancelReturn ) {
									return cancelReturn;
								}

								if ( ! comm_par ) {
									return cancelReturn;
								}

								comm_par = 0;

								tellFrameNewParent();

								return cancelReturn;
							};
						}

						if ( comm_par == parentId ) {
							return returnValue;
						}

						comm_par = parentId;

						tellFrameNewParent();

						return returnValue;
					};
				}

				
				// Do the post message bit after the dom has loaded.
				document.addEventListener( 'DOMContentLoaded', function () {
					var iframe_url = "https:\/\/jetpack.wordpress.com";
					if ( window.postMessage ) {
						if ( document.addEventListener ) {
							window.addEventListener( 'message', function ( event ) {
								var origin = event.origin.replace( /^http:\/\//i, 'https://' );
								if ( iframe_url.replace( /^http:\/\//i, 'https://' ) !== origin ) {
									return;
								}
								jQuery( frame ).height( event.data );
							});
						} else if ( document.attachEvent ) {
							window.attachEvent( 'message', function ( event ) {
								var origin = event.origin.replace( /^http:\/\//i, 'https://' );
								if ( iframe_url.replace( /^http:\/\//i, 'https://' ) !== origin ) {
									return;
								}
								jQuery( frame ).height( event.data );
							});
						}
					}
				})

			})();
		</script>

		<script type='text/javascript' src='https://stats.wp.com/e-201750.js' async defer></script>
<script type='text/javascript'>
	_stq = window._stq || [];
	_stq.push([ 'view', {v:'ext',j:'1:5.6',blog:'6196678',post:'1551',tz:'7',srv:'www.ivankristianto.com'} ]);
	_stq.push([ 'clickTrackerInit', '6196678', '1551' ]);
</script>
</body>
</html>
<!-- Dynamic page generated in 0.162 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2017-12-11 20:48:22 -->
