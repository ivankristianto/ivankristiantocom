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
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700|Noto+Sans:400,700" media="screen"><title>[HowTo] Run ASP.NET on Linux With Apache Web Server (Mono + Mod_Mono) - Ivan Kristianto</title>

<!-- This site is optimized with the Yoast SEO plugin v5.9.1 - https://yoast.com/wordpress/plugins/seo/ -->
<link rel="canonical" href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/" />
<link rel="publisher" href="https://plus.google.com/+Ivankristianto/about"/>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="article" />
<meta property="og:title" content="[HowTo] Run ASP.NET on Linux With Apache Web Server (Mono + Mod_Mono) - Ivan Kristianto" />
<meta property="og:description" content="Mono is an open source project led by Novell (formerly by Ximian) to create an Ecma standard compliant, .NET-compatible set of tools, including among others a C# compiler and a Common Language Runtime. Mono can be run on Linux, BSD, UNIX, Mac OS X, Solaris and Windows operating systems. With Apache mod_mono we can run &hellip;" />
<meta property="og:url" content="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/" />
<meta property="og:site_name" content="Ivan Kristianto" />
<meta property="article:publisher" content="http://www.facebook.com/IvanKristiantoBlog" />
<meta property="article:tag" content="apache" />
<meta property="article:tag" content="c#" />
<meta property="article:tag" content="how to" />
<meta property="article:tag" content="how to host asp net application on linux" />
<meta property="article:tag" content="libapache2-mod-mono" />
<meta property="article:tag" content="linux" />
<meta property="article:tag" content="mod_mono" />
<meta property="article:tag" content="mono-apache-server2" />
<meta property="article:tag" content="web server" />
<meta property="article:section" content="Mono" />
<meta property="article:published_time" content="2009-07-18T22:30:08+07:00" />
<meta property="article:modified_time" content="2016-09-18T22:57:45+07:00" />
<meta property="og:updated_time" content="2016-09-18T22:57:45+07:00" />
<meta property="fb:app_id" content="306940476037353" />
<meta property="og:image" content="https://www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png" />
<meta property="og:image:secure_url" content="https://www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png" />
<meta property="og:image:width" content="680" />
<meta property="og:image:height" content="362" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="Mono is an open source project led by Novell (formerly by Ximian) to create an Ecma standard compliant, .NET-compatible set of tools, including among others a C# compiler and a Common Language Runtime. Mono can be run on Linux, BSD, UNIX, Mac OS X, Solaris and Windows operating systems. With Apache mod_mono we can run [&hellip;]" />
<meta name="twitter:title" content="[HowTo] Run ASP.NET on Linux With Apache Web Server (Mono + Mod_Mono) - Ivan Kristianto" />
<meta name="twitter:site" content="@ivankrisdotcom" />
<meta name="twitter:image" content="https://i2.wp.com/www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png?fit=680%2C362&#038;ssl=1" />
<meta name="twitter:creator" content="@ivankrisdotcom" />
<script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"WebSite","@id":"#website","url":"https:\/\/www.ivankristianto.com\/","name":"Ivan Kristianto","potentialAction":{"@type":"SearchAction","target":"https:\/\/www.ivankristianto.com\/?s={search_term_string}","query-input":"required name=search_term_string"}}</script>
<script type='application/ld+json'>{"@context":"http:\/\/schema.org","@type":"Person","url":"https:\/\/www.ivankristianto.com\/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono\/","sameAs":["http:\/\/www.facebook.com\/IvanKristiantoBlog","https:\/\/plus.google.com\/+Ivankristianto\/about","https:\/\/twitter.com\/ivankrisdotcom"],"@id":"#person","name":"Ivan Kristianto"}</script>
<!-- / Yoast SEO plugin. -->

<link rel='dns-prefetch' href='//www.ivankristianto.com' />
<link rel='dns-prefetch' href='//s0.wp.com' />
<link rel="alternate" type="application/rss+xml" title="Ivan Kristianto &raquo; Feed" href="http://feeds2.feedburner.com/ivankristianto" />
<link rel="alternate" type="application/rss+xml" title="Ivan Kristianto &raquo; Comments Feed" href="http://feeds2.feedburner.com/ivankristianto" />
<link rel="alternate" type="application/rss+xml" title="Ivan Kristianto &raquo; [HowTo] Run ASP.NET on Linux With Apache Web Server (Mono + Mod_Mono) Comments Feed" href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/feed/" />
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
<link rel='shortlink' href='https://www.ivankristianto.com/?p=760' />
<link rel="alternate" type="application/json+oembed" href="https://www.ivankristianto.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.ivankristianto.com%2Fhowto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono%2F" />
<link rel="alternate" type="text/xml+oembed" href="https://www.ivankristianto.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fwww.ivankristianto.com%2Fhowto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono%2F&#038;format=xml" />
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
<link rel="amphtml" href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/amp/" /><style type="text/css" id="syntaxhighlighteranchor"></style>
<style type="text/css"></style><link rel="icon" href="https://i2.wp.com/www.ivankristianto.com/uploads/2015/08/cropped-favicon64.png?fit=32%2C32&#038;ssl=1" sizes="32x32" />
<link rel="icon" href="https://i2.wp.com/www.ivankristianto.com/uploads/2015/08/cropped-favicon64.png?fit=192%2C192&#038;ssl=1" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://i2.wp.com/www.ivankristianto.com/uploads/2015/08/cropped-favicon64.png?fit=180%2C180&#038;ssl=1" />
<meta name="msapplication-TileImage" content="https://i2.wp.com/www.ivankristianto.com/uploads/2015/08/cropped-favicon64.png?fit=270%2C270&#038;ssl=1" />
</head>
<body onload="" class="post-template-default single single-post postid-760 single-format-standard custom-background sidebar-content layout-wrapper-fluid responsive static" >
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
<li id="menu-item-2140" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-2140 dropdown"><a href="https://www.ivankristianto.com/category/web-development/">Web Development</a>
<ul class="dropdown-menu sub-menu">
	<li id="menu-item-2622" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2622"><a href="https://www.ivankristianto.com/category/web-development/programming/">Learn PHP</a></li>
	<li id="menu-item-2635" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2635"><a href="https://www.ivankristianto.com/category/web-development/git/">Git Tips</a></li>
	<li id="menu-item-2624" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2624"><a href="https://www.ivankristianto.com/category/web-development/designs/">Web Design</a></li>
	<li id="menu-item-2623" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-2623"><a href="https://www.ivankristianto.com/category/web-development/server/">Web Server</a></li>
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
            <div class="breadcrumb-container" xmlns:v="http://rdf.data-vocabulary.org/#"><span class="breadcrumb-label">You are here: </span><ol class="breadcrumb" itemprop="breadcrumb"><li typeof="v:Breadcrumb"><a href="https://www.ivankristianto.com/" title="View Home" rel="v:url" property="v:title">Home</a></li><li typeof="v:Breadcrumb"><a href="https://www.ivankristianto.com/category/software-development/" title="View all items in Software Development" rel="v:url" property="v:title">Software Development</a>&raquo;<a href="https://www.ivankristianto.com/category/software-development/mono/" title="View all items in Mono" rel="v:url" property="v:title">Mono</a></li><li typeof="v:Breadcrumb">[HowTo] Run ASP.NET on Linux With Apache Web Server (Mono + Mod_Mono)</li></ol></div><div id="post-760" class="post-760 post type-post status-publish format-standard has-post-thumbnail hentry category-mono tag-apache tag-c tag-how-to tag-how-to-host-asp-net-application-on-linux tag-libapache2-mod-mono tag-linux tag-mod_mono tag-mono-apache-server2 tag-web-server">
    <p class="post-featured-image"><img width="680" height="362" src="https://i2.wp.com/www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png?fit=680%2C362&amp;ssl=1" class="alignnone post-image img-responsive wp-post-image" alt="" srcset="https://i2.wp.com/www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png?w=680&amp;ssl=1 680w, https://i2.wp.com/www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png?resize=300%2C159&amp;ssl=1 300w" sizes="(max-width: 680px) 100vw, 680px" data-attachment-id="2525" data-permalink="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/modmono-basic-setup/" data-orig-file="https://i2.wp.com/www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png?fit=680%2C362&amp;ssl=1" data-orig-size="680,362" data-comments-opened="1" data-image-meta="{&quot;aperture&quot;:&quot;0&quot;,&quot;credit&quot;:&quot;&quot;,&quot;camera&quot;:&quot;&quot;,&quot;caption&quot;:&quot;&quot;,&quot;created_timestamp&quot;:&quot;0&quot;,&quot;copyright&quot;:&quot;&quot;,&quot;focal_length&quot;:&quot;0&quot;,&quot;iso&quot;:&quot;0&quot;,&quot;shutter_speed&quot;:&quot;0&quot;,&quot;title&quot;:&quot;&quot;}" data-image-title="Modmono-basic-setup" data-image-description="" data-medium-file="https://i2.wp.com/www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png?fit=300%2C159&amp;ssl=1" data-large-file="https://i2.wp.com/www.ivankristianto.com/uploads/2009/07/Modmono-basic-setup.png?fit=550%2C293&amp;ssl=1" /></p><div class='ads-after-image'><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- After Feature Image Responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5132818893953017"
     data-ad-slot="7709075123"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>    <h1 class="entry-title">[HowTo] Run ASP.NET on Linux With Apache Web Server (Mono + Mod_Mono)</h1>
    
    <div class="post-info"><span class="date published time" title="2009-07-18T22:30:08+00:00">July 18, 2009</span>    <span class="post-comments"> &#8226; <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comments">46 Comments</a></span> </div>    <div class="entry-content">
        <p><strong>Mono</strong> is an open source project led by Novell (formerly by Ximian) to create an Ecma standard compliant, .NET-compatible set of tools, including among others a C# compiler and a Common Language Runtime. Mono can be run on Linux, BSD, UNIX, Mac OS X, Solaris and Windows operating systems.</p>
<p>With Apache mod_mono we can run ASP.NET with C# on Linux machine. Mono is not just an ASP.NET interpreter, it also build a windows form and run on Linux, BSD, UNIX, Mac OS X, Solaris and Windows operating systems. But for now i just want to show you how to run an ASP.NET application on Linux machine.</p>
<p><strong>Ok, get let&#8217;s start. Follow these steps (for ubuntu):</strong></p>
<ol>
<li>You need to install several library for mono. Type this command:
<pre class="brush: bash; title: ; notranslate" title="">sudo apt-get install mono-xsp2 mono-apache-server2 libapache2-mod-mono mono-gmcs mono-utils</pre>
</li>
<li>After it finish you need to edit your mod_mono.conf. The easiest way to run Asp.Net application is using<br />
AutoHosting configuration as example below:</p>
<pre class="brush: bash; title: ; notranslate" title="">AddType application/x-asp-net .aspx .ashx .asmx .ascx .asax .config .ascx
DirectoryIndex index.aspx
MonoAutoApplication enabled
MonoServerPath &quot;/usr/bin/mod-mono-server2&quot;</pre>
<p>You can read more about AutoHosting <a href="http://mono-project.com/AutoHosting" target="_blank" rel="external nofollow">here</a> or manual hosting configuration <a href="http://mono-project.com/Mod_mono" target="_blank" rel="external nofollow">here</a>, for ubuntu user please refer to <a href="https://help.ubuntu.com/community/ModMono" rel="external nofollow">this documentation</a>.</li>
<li>Save the file and restart your Apache.</li>
<li>Now let&#8217;s start write the first Asp.Net application. You can copy the text below:<br />
<strong>Filename: hello.aspx</strong></p>
<pre class="brush: xml; title: ; notranslate" title="">
&lt;%@ Page language=&quot;c#&quot; src=&quot;hello.aspx.cs&quot; Inherits=&quot;HelloApp.HelloPage&quot; AutoEventWireup=&quot;true&quot; %&gt;
&lt;html&gt;
  &lt;head&gt;
	&lt;title&gt;First Mono ASP.NET Application&lt;/title&gt;
  &lt;/head&gt;
  &lt;body&gt;

&lt;form runat=&quot;server&quot;&gt;
	  Enter your name: &lt;asp:TextBox id=&quot;name&quot; runat=&quot;server&quot; /&gt;
	  &lt;asp:Button id=&quot;greet&quot; Text=&quot;Greet&quot; onClick=&quot;OnGreetClick&quot; runat=&quot;server&quot;/&gt;
	&lt;/form&gt;

	
&lt;strong&gt;&lt;asp:Label id=&quot;message&quot; runat=&quot;server&quot;&gt;Hello, World!
			&lt;/asp:Label&gt;&lt;/strong&gt;
  &lt;/body&gt;
&lt;html&gt;</pre>
<p><strong>Filename: hello.aspx.cs</strong></p>
<pre class="brush: csharp; title: ; notranslate" title="">using System;
using System.Web.UI.WebControls;
namespace HelloApp
{
public class HelloPage : System.Web.UI.Page
{
protected Label message;
protected Button greet;
protected TextBox name;
public void OnGreetClick(Object sender, EventArgs e)
{
message.Text = &quot;Hello, &quot; + name.Text;
}
}
}</pre>
</li>
<li>Ok now save file to your web server. Mine is at the /var/www/firstaspnet/</li>
<li>And you will see your first Asp.Net application run on Linux OS.</li>
</ol>
<p>If you like this post, please leave me a comment. Have a nice day.</p>
<p><strong>Update Sep 18, 2016: This was my very old article. It might not work anymore. And it is obsolete with today technology. Please use other technology rather than using this. Thanks.</strong></p>
<div class="sharedaddy sd-sharing-enabled"><div class="robots-nocontent sd-block sd-social sd-social-icon-text sd-sharing"><h3 class="sd-title">Share this:</h3><div class="sd-content"><ul><li class="share-facebook"><a rel="nofollow" data-shared="sharing-facebook-760" class="share-facebook sd-button share-icon" href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/?share=facebook" target="_blank" title="Click to share on Facebook"><span>Facebook</span></a></li><li class="share-twitter"><a rel="nofollow" data-shared="sharing-twitter-760" class="share-twitter sd-button share-icon" href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/?share=twitter" target="_blank" title="Click to share on Twitter"><span>Twitter</span></a></li><li class="share-google-plus-1"><a rel="nofollow" data-shared="sharing-google-760" class="share-google-plus-1 sd-button share-icon" href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/?share=google-plus-1" target="_blank" title="Click to share on Google+"><span>Google</span></a></li><li class="share-linkedin"><a rel="nofollow" data-shared="sharing-linkedin-760" class="share-linkedin sd-button share-icon" href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/?share=linkedin" target="_blank" title="Click to share on LinkedIn"><span>LinkedIn</span></a></li><li class="share-pocket"><a rel="nofollow" data-shared="" class="share-pocket sd-button share-icon" href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/?share=pocket" target="_blank" title="Click to share on Pocket"><span>Pocket</span></a></li><li class="share-end"></li></ul></div></div></div><div class='sharedaddy sd-block sd-like jetpack-likes-widget-wrapper jetpack-likes-widget-unloaded' id='like-post-wrapper-6196678-760-5a2e8acbbf7c3' data-src='https://widgets.wp.com/likes/#blog_id=6196678&amp;post_id=760&amp;origin=www.ivankristianto.com&amp;obj_id=6196678-760-5a2e8acbbf7c3' data-name='like-post-frame-6196678-760-5a2e8acbbf7c3'><h3 class="sd-title">Like this:</h3><div class='likes-widget-placeholder post-likes-widget-placeholder' style='height: 55px;'><span class='button'><span>Like</span></span> <span class="loading">Loading...</span></div><span class='sd-text-color'></span><a class='sd-link-color'></a></div>
<div id='jp-relatedposts' class='jp-relatedposts' >
	<h3 class="jp-relatedposts-headline"><em>Related</em></h3>
</div><!--<rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
			xmlns:dc="http://purl.org/dc/elements/1.1/"
			xmlns:trackback="http://madskills.com/public/xml/rss/module/trackback/">
		<rdf:Description rdf:about="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/"
    dc:identifier="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/"
    dc:title="[HowTo] Run ASP.NET on Linux With Apache Web Server (Mono + Mod_Mono)"
    trackback:ping="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/trackback/" />
</rdf:RDF>-->
    </div><!-- end .entry-content -->
    <div class="post-meta"><span class="categories">Categories: <a href="https://www.ivankristianto.com/category/software-development/mono/" rel="category tag">Mono</a></span>  <span class="tags">Tagged With: <a href="https://www.ivankristianto.com/tag/apache/" rel="tag">apache</a>, <a href="https://www.ivankristianto.com/tag/c/" rel="tag">c#</a>, <a href="https://www.ivankristianto.com/tag/how-to/" rel="tag">how to</a>, <a href="https://www.ivankristianto.com/tag/how-to-host-asp-net-application-on-linux/" rel="tag">how to host asp net application on linux</a>, <a href="https://www.ivankristianto.com/tag/libapache2-mod-mono/" rel="tag">libapache2-mod-mono</a>, <a href="https://www.ivankristianto.com/tag/linux/" rel="tag">linux</a>, <a href="https://www.ivankristianto.com/tag/mod_mono/" rel="tag">mod_mono</a>, <a href="https://www.ivankristianto.com/tag/mono-apache-server2/" rel="tag">mono-apache-server2</a>, <a href="https://www.ivankristianto.com/tag/web-server/" rel="tag">web server</a></span> </div>        <div id="comments">
                <h3>Comments</h3>                <ol class="comment-list">
                        
    <li class="comment even thread-even depth-1" id="comment-963">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/919a2068491302ba0ebb7789ca24b022?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/919a2068491302ba0ebb7789ca24b022?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Rob</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-963">July 18, 2009 at 8:43 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Why would you want to? There are far, far more adept tools already available on *nix without that and its included non-native bloat. Plus .NET/Mono is not known for standards compliance or producing good code.</p>
<p>All in all, this is a stupid idea.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-963' onclick='return addComment.moveForm( "comment-963", "963", "respond", "760" )' aria-label='Reply to Rob'>Reply</a>    </div>

    <ul class="children">

    <li class="comment odd alt depth-2" id="comment-964">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/300f565b24f0cf1711fb33fc9b311f9c?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/300f565b24f0cf1711fb33fc9b311f9c?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Anonymous</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-964">July 19, 2009 at 8:22 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hi Rob,<br />
In my case, i have an ASP.Net application and only have a Linux Server. And need to deploy as soon as possible. So i think mono would be the quick and dirty solution for that. Rather than i rebuild it into java project.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-964' onclick='return addComment.moveForm( "comment-964", "964", "respond", "760" )' aria-label='Reply to '>Reply</a>    </div>

    <ul class="children">

    <li class="comment even depth-3" id="comment-978">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/b89a7eed20dbd76abdc8fca8fc1fc32d?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/b89a7eed20dbd76abdc8fca8fc1fc32d?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">joshi_darshit</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-978">February 9, 2011 at 11:54 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Thanks it helps!</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-978' onclick='return addComment.moveForm( "comment-978", "978", "respond", "760" )' aria-label='Reply to joshi_darshit'>Reply</a>    </div>

    </li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-945">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/919a2068491302ba0ebb7789ca24b022?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/919a2068491302ba0ebb7789ca24b022?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Rob</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-945">July 19, 2009 at 4:43 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Why would you want to? There are far, far more adept tools already available on *nix without that and its included non-native bloat. Plus .NET/Mono is not known for standards compliance or producing good code.</p>
<p>All in all, this is a stupid idea.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-945' onclick='return addComment.moveForm( "comment-945", "945", "respond", "760" )' aria-label='Reply to Rob'>Reply</a>    </div>

    <ul class="children">

    <li class="comment byuser comment-author-ivankristianto bypostauthor even depth-2" id="comment-946">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/6685a72b801dc159a59ed45887f0e8b2?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/6685a72b801dc159a59ed45887f0e8b2?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com' rel='external nofollow' class='url'>Ivan</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-946">July 19, 2009 at 4:22 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hi Rob,<br />
In my case, i have an ASP.Net application and only have a Linux Server. And need to deploy as soon as possible. So i think mono would be the quick and dirty solution for that. Rather than i rebuild it into java project.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-946' onclick='return addComment.moveForm( "comment-946", "946", "respond", "760" )' aria-label='Reply to Ivan'>Reply</a>    </div>

    <ul class="children">

    <li class="comment odd alt depth-3" id="comment-56058">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/14ff54ed4f3fde2c788e8657f5754ec6?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/14ff54ed4f3fde2c788e8657f5754ec6?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.kubitools.com/' rel='external nofollow' class='url'>Dan</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-56058">April 28, 2016 at 3:47 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hi Ivan. First, thanks for the straight forward tutorial. It is sad that some are jealous and angry about their lack of skills or knowledge. I&#8217;m not hating on all beginners. a beginner who will soon achieve greatness will ask intelligent questions and learn from people who have the knowledge they seek. These people are already in the right mindset.</p>
<p>Then you have the amateurs out there that will try to sound intelligent by BSing and putting others down, They are unlikely to learn anything. And don&#8217;t worry, the people out there who know what they are doing can instantly spot those people and know they are just bitter wannabes who lack the brain power to even learn enough to one day make quality comments. Just ignore these people. The people who actually have experience can see right through them.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-56058' onclick='return addComment.moveForm( "comment-56058", "56058", "respond", "760" )' aria-label='Reply to Dan'>Reply</a>    </div>

    </li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-965">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/fe22a16c795570c7147e685743cdfe3f?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/fe22a16c795570c7147e685743cdfe3f?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.itoamerica.com' rel='external nofollow' class='url'>matt</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-965">July 24, 2009 at 6:10 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Yes how stupid. why would anyone want to develop tools to allow you to port .net and other applications from expensive IIS servers to cheap / free linux servers &#8230;..</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-965' onclick='return addComment.moveForm( "comment-965", "965", "respond", "760" )' aria-label='Reply to matt'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-947">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/fe22a16c795570c7147e685743cdfe3f?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/fe22a16c795570c7147e685743cdfe3f?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.itoamerica.com' rel='external nofollow' class='url'>matt</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-947">July 25, 2009 at 2:10 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Yes how stupid. why would anyone want to develop tools to allow you to port .net and other applications from expensive IIS servers to cheap / free linux servers &#8230;..</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-947' onclick='return addComment.moveForm( "comment-947", "947", "respond", "760" )' aria-label='Reply to matt'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-966">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/551b3d932a1ad8602fdcd47abe8fa966?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/551b3d932a1ad8602fdcd47abe8fa966?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Socan</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-966">August 2, 2009 at 1:21 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Because he must 🙁</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-966' onclick='return addComment.moveForm( "comment-966", "966", "respond", "760" )' aria-label='Reply to Socan'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-948">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/551b3d932a1ad8602fdcd47abe8fa966?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/551b3d932a1ad8602fdcd47abe8fa966?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Socan</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-948">August 2, 2009 at 9:21 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Because he must 🙁</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-948' onclick='return addComment.moveForm( "comment-948", "948", "respond", "760" )' aria-label='Reply to Socan'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-967">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/0155404f449c47befad80cfbd52812be?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/0155404f449c47befad80cfbd52812be?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Alex</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-967">August 16, 2009 at 7:29 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>I have a  (probably stupid) question- if the hosting company on whose linux servers i&#039;m hosting my page is using mono, do i have to configure something in my asp.net project or it should work already?</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-967' onclick='return addComment.moveForm( "comment-967", "967", "respond", "760" )' aria-label='Reply to Alex'>Reply</a>    </div>

    <ul class="children">

    <li class="comment odd alt depth-2" id="comment-968">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/300f565b24f0cf1711fb33fc9b311f9c?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/300f565b24f0cf1711fb33fc9b311f9c?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Anonymous</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-968">August 17, 2009 at 4:48 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hi Alex,<br />
No you don&#039;t have to. Just upload to the server and it&#039;s ready to run.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-968' onclick='return addComment.moveForm( "comment-968", "968", "respond", "760" )' aria-label='Reply to '>Reply</a>    </div>

    </li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->

    <li class="comment even thread-odd thread-alt depth-1" id="comment-949">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/0155404f449c47befad80cfbd52812be?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/0155404f449c47befad80cfbd52812be?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Alex</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-949">August 17, 2009 at 3:29 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>I have a  (probably stupid) question- if the hosting company on whose linux servers i&#8217;m hosting my page is using mono, do i have to configure something in my asp.net project or it should work already?</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-949' onclick='return addComment.moveForm( "comment-949", "949", "respond", "760" )' aria-label='Reply to Alex'>Reply</a>    </div>

    <ul class="children">

    <li class="comment byuser comment-author-ivankristianto bypostauthor odd alt depth-2" id="comment-950">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/6685a72b801dc159a59ed45887f0e8b2?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/6685a72b801dc159a59ed45887f0e8b2?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com' rel='external nofollow' class='url'>Ivan</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-950">August 17, 2009 at 12:48 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hi Alex,<br />
No you don&#8217;t have to. Just upload to the server and it&#8217;s ready to run.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-950' onclick='return addComment.moveForm( "comment-950", "950", "respond", "760" )' aria-label='Reply to Ivan'>Reply</a>    </div>

    </li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-969">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/f70b4c1765e0234d08e74d931266e52d?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f70b4c1765e0234d08e74d931266e52d?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Alex</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-969">August 17, 2009 at 8:22 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Thanks!</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-969' onclick='return addComment.moveForm( "comment-969", "969", "respond", "760" )' aria-label='Reply to Alex'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-951">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/f70b4c1765e0234d08e74d931266e52d?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f70b4c1765e0234d08e74d931266e52d?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Alex</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-951">August 17, 2009 at 4:22 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Thanks!</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-951' onclick='return addComment.moveForm( "comment-951", "951", "respond", "760" )' aria-label='Reply to Alex'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-952">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/f3d2ac2eeb02514549d7fc0bfcc175de?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f3d2ac2eeb02514549d7fc0bfcc175de?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Naveesh</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-952">October 28, 2009 at 7:57 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Does this also works for vb language</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-952' onclick='return addComment.moveForm( "comment-952", "952", "respond", "760" )' aria-label='Reply to Naveesh'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-953">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/b47651cddbc82d1616e8fdbf1eb42476?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/b47651cddbc82d1616e8fdbf1eb42476?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">RobertG</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-953">November 7, 2009 at 10:46 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Works great!  Very simple, concise directions!  One small glitch:  In step 5, you save BOTH files to the target directory, not just one.</p>
<p>Another answer to some who ask why run .NET on Linux:  Being knowledgeable in areas across disciplines is critical to long term career success in IT.  Being able to make very different systems talk to one another, or to write applications in .NET, Java for desktops, servers or even embedded applications makes you very employable in this economy.</p>
<p>Cheers!</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-953' onclick='return addComment.moveForm( "comment-953", "953", "respond", "760" )' aria-label='Reply to RobertG'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-954">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/cd0c1f282d0bd249a41acaa14bcff8da?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/cd0c1f282d0bd249a41acaa14bcff8da?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.thrita.com' rel='external nofollow' class='url'>Tohid</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-954">February 9, 2010 at 1:30 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hi Ivan,</p>
<p>Thanks for the useful Article.<br />
If I have a compiled asp.net application (I mean just some .aspx empty files and a /bin folder full of .dll), does it run as well on linux with your manual?</p>
<p>Regards,<br />
-T</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-954' onclick='return addComment.moveForm( "comment-954", "954", "respond", "760" )' aria-label='Reply to Tohid'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-955">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo avatar-default' height='48' width='48' />            <cite class="fn"><a href='http://profiles.yahoo.com/u/OJST4JNT6S3PRA5VVLY76PROLY' rel='external nofollow' class='url'>Catalin George</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-955">July 7, 2010 at 10:26 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hi your sample link is just the code , not running.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-955' onclick='return addComment.moveForm( "comment-955", "955", "respond", "760" )' aria-label='Reply to Catalin George'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-956">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com' rel='external nofollow' class='url'>Ivan Kristianto</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-956">July 10, 2010 at 3:04 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hi i&#39;m sorry for that.<br />Before i was host on my friend VPS, and i installed Mono there.<br />But now i move to shared hosting, that&#39;s doesn&#39;t have Mono. So the code won&#39;t running.<br />But it used to work.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-956' onclick='return addComment.moveForm( "comment-956", "956", "respond", "760" )' aria-label='Reply to Ivan Kristianto'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-958">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/e53873655330fee15bd7cf475b1e9899?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/e53873655330fee15bd7cf475b1e9899?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://runescape.com' rel='external nofollow' class='url'>Nottellinganyone</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-958">August 16, 2010 at 9:40 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Thank you sooo much, this is the only guide that actually worked for me!  i got it working in a few minutes, instead of beating my head against the ground following other peoples tutorials!</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-958' onclick='return addComment.moveForm( "comment-958", "958", "respond", "760" )' aria-label='Reply to Nottellinganyone'>Reply</a>    </div>

    <ul class="children">

    <li class="comment even depth-2" id="comment-974">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/133e42c5b4e1faef09e9cd08209d5fbd?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/133e42c5b4e1faef09e9cd08209d5fbd?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Pp</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-974">September 28, 2010 at 8:46 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Same here, top notch job !!</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-974' onclick='return addComment.moveForm( "comment-974", "974", "respond", "760" )' aria-label='Reply to Pp'>Reply</a>    </div>

    </li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->

    <li class="comment odd alt thread-even depth-1" id="comment-959">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com' rel='external nofollow' class='url'>Ivan Kristianto</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-959">August 17, 2010 at 6:35 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Thanks mate.<br />
Glad to hear that 🙂</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-959' onclick='return addComment.moveForm( "comment-959", "959", "respond", "760" )' aria-label='Reply to Ivan Kristianto'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-odd thread-alt depth-1" id="comment-961">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/9603a11e2d972b844135892d1d4061a3?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/9603a11e2d972b844135892d1d4061a3?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Papuyadav</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-961">August 26, 2010 at 6:16 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>I want to run dotNET application on RHEL 5. Iam unable to get all the packages for apache2-mod_mono. Plz Help&#8230;</p>
<p>Thank You</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-961' onclick='return addComment.moveForm( "comment-961", "961", "respond", "760" )' aria-label='Reply to Papuyadav'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-even depth-1" id="comment-960">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/9603a11e2d972b844135892d1d4061a3?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/9603a11e2d972b844135892d1d4061a3?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Papuyadav</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-960">August 26, 2010 at 6:17 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Please provide me the link from where i can download all the required packages.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-960' onclick='return addComment.moveForm( "comment-960", "960", "respond", "760" )' aria-label='Reply to Papuyadav'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-odd thread-alt depth-1" id="comment-962">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com' rel='external nofollow' class='url'>Ivan Kristianto</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-962">August 28, 2010 at 12:36 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>try to update your yum source list.<br />
i haven&#8217;t  play with rhel 5 for a while.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-962' onclick='return addComment.moveForm( "comment-962", "962", "respond", "760" )' aria-label='Reply to Ivan Kristianto'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-even depth-1" id="comment-973">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/3d0ca259ce83b64292a1e79fe7589e38?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/3d0ca259ce83b64292a1e79fe7589e38?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Kakkar Anchal</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-973">September 28, 2010 at 7:36 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>I want to run dotNET application on RHEL 5. Iam unable to get all the packages for apache2-mod_mono. Plz Help&#8230;<br />
thanx&#8230;..</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-973' onclick='return addComment.moveForm( "comment-973", "973", "respond", "760" )' aria-label='Reply to Kakkar Anchal'>Reply</a>    </div>

    <ul class="children">

    <li class="comment even depth-2" id="comment-975">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com' rel='external nofollow' class='url'>Ivan Kristianto</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-975">September 29, 2010 at 3:34 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>have you tried to update your repository?</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-975' onclick='return addComment.moveForm( "comment-975", "975", "respond", "760" )' aria-label='Reply to Ivan Kristianto'>Reply</a>    </div>

    </li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-977">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/0acc521e3d9b1ea688ce24fff10c04b0?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/0acc521e3d9b1ea688ce24fff10c04b0?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Prashanth</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-977">October 30, 2010 at 7:58 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Thanks that worked for me&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-977' onclick='return addComment.moveForm( "comment-977", "977", "respond", "760" )' aria-label='Reply to Prashanth'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-979">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/c17485a31f39962bae0480327a893d20?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/c17485a31f39962bae0480327a893d20?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">HirenPatel93</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-979">February 23, 2011 at 4:27 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>really nice article&#8230;&#8230;&#8230;</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-979' onclick='return addComment.moveForm( "comment-979", "979", "respond", "760" )' aria-label='Reply to HirenPatel93'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-980">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/3626ee61a14bc4d0104d8d490f23d327?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/3626ee61a14bc4d0104d8d490f23d327?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Barisbar</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-980">April 21, 2011 at 12:05 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>why do not work in firefox and chrome.<br />
 these http clients show resource code.<br />
pls help me?</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-980' onclick='return addComment.moveForm( "comment-980", "980", "respond", "760" )' aria-label='Reply to Barisbar'>Reply</a>    </div>

    <ul class="children">

    <li class="comment even depth-2" id="comment-981">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/f1ca98fc410737472e7a49d0879805aa?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com' rel='external nofollow' class='url'>Ivan Kristianto</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-981">April 22, 2011 at 5:44 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>It&#039;s not your browser. It is your apache configuration.You need to add apache handler for your aspx script. otherwise it will consider as text.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-981' onclick='return addComment.moveForm( "comment-981", "981", "respond", "760" )' aria-label='Reply to Ivan Kristianto'>Reply</a>    </div>

    <ul class="children">

    <li class="comment odd alt depth-3" id="comment-982">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/cd603b93279b6a34fcead135257302e1?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/cd603b93279b6a34fcead135257302e1?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">ecoLogic</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-982">June 18, 2011 at 12:36 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>I&#039;m new at this, can you what handler should I write for .aspx extension?</p>
<p>ty</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-982' onclick='return addComment.moveForm( "comment-982", "982", "respond", "760" )' aria-label='Reply to ecoLogic'>Reply</a>    </div>

    </li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-983">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/fbf824751b3cbfdca40f74723fd29227?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/fbf824751b3cbfdca40f74723fd29227?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">SauravGautam</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-983">July 11, 2011 at 3:08 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>I installed mono tools for visual studio&#8230; I have prepared a application on asp.net. But i have hosting space of APACHE server. Can i upload my aspx files there. Please help me</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-983' onclick='return addComment.moveForm( "comment-983", "983", "respond", "760" )' aria-label='Reply to SauravGautam'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-984">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/a8a1de9121f5dcda1f358197b0f1913d?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/a8a1de9121f5dcda1f358197b0f1913d?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">martinopresnik</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-984">July 15, 2011 at 4:07 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hello! When I go on my web page I get source code text and NOT web page. Can somebody tell me how to solve this? Thanks!</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-984' onclick='return addComment.moveForm( "comment-984", "984", "respond", "760" )' aria-label='Reply to martinopresnik'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-985">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/6685a72b801dc159a59ed45887f0e8b2?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/6685a72b801dc159a59ed45887f0e8b2?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com/' rel='external nofollow' class='url'>ivankrisdotcom</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-985">July 15, 2011 at 4:10 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>@martinopresnik It is because your web server doesn&#8217;t have the handler for you aspx file. You should install mono and add the correct handler for your aspx file.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-985' onclick='return addComment.moveForm( "comment-985", "985", "respond", "760" )' aria-label='Reply to ivankrisdotcom'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-986">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/a8a1de9121f5dcda1f358197b0f1913d?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/a8a1de9121f5dcda1f358197b0f1913d?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">martinopresnik</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-986">July 23, 2011 at 11:09 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>@ivankrisdotcom I DID THIS TOOOOOO. But still NOT WORKING</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-986' onclick='return addComment.moveForm( "comment-986", "986", "respond", "760" )' aria-label='Reply to martinopresnik'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-987">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/10311f9f97d5e3814a0ea763c4b04663?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/10311f9f97d5e3814a0ea763c4b04663?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">abdul1</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-987">June 15, 2012 at 8:49 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Very nice article thanks, I tried it and it worked, it would be great if you can update it for mono 2.8.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-987' onclick='return addComment.moveForm( "comment-987", "987", "respond", "760" )' aria-label='Reply to abdul1'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-988">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/c314ace7c70249b673e9ed3380654a88?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/c314ace7c70249b673e9ed3380654a88?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">rstoffers</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-988">August 11, 2012 at 7:00 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Thanks for the article.<br />
 <br />
If you want asp.net 4.0 then also do:<br />
 <br />
sudo apt-get install mono-apache-server4<br />
 <br />
in your mod_mono.conf put the following:<br />
 <br />
AddType application/x-asp-net .aspx .ashx .asmx .ascx .asax  .config .ascxDirectoryIndex index.aspxMonoAutoApplication enabledMonoServerPath &quot;/usr/bin/mod-mono-server4&quot;</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-988' onclick='return addComment.moveForm( "comment-988", "988", "respond", "760" )' aria-label='Reply to rstoffers'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-990">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/c314ace7c70249b673e9ed3380654a88?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/c314ace7c70249b673e9ed3380654a88?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">rstoffers</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-990">August 11, 2012 at 7:03 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Oh, and if you want to give yourself access to change files in the /var/ww directory, do:<br />
 <br />
cd /var/www<br />
sudo chown -R root:www-data .<br />
usermod -a -G www-data &lt;yourusername&gt; <br />
 </p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-990' onclick='return addComment.moveForm( "comment-990", "990", "respond", "760" )' aria-label='Reply to rstoffers'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-991">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/c314ace7c70249b673e9ed3380654a88?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/c314ace7c70249b673e9ed3380654a88?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">rstoffers</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-991">August 11, 2012 at 7:05 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Oh, and if you want to give yourself access to change files in the /var/ww directory, do:<br />
 <br />
cd /var/www<br />
sudo chown -R root:www-data .<br />
sudo chmod -R 774 .<br />
sudo usermod -a -G www-data &lt;yourusername&gt; <br />
 <br />
 </p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-991' onclick='return addComment.moveForm( "comment-991", "991", "respond", "760" )' aria-label='Reply to rstoffers'>Reply</a>    </div>

    </li><!-- #comment-## -->

    <li class="comment even thread-even depth-1" id="comment-54160">

    
    <div class="comment-author vcard">
            <img alt='' src='https://graph.facebook.com/v2.2/727658139/picture?type=large&#038;_md5=ea77a56c2159fb8889fc5757e7c704c4' srcset='https://secure.gravatar.com/avatar/863a285409f44fd18d1588e84ffc85c2?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.facebook.com/727658139' rel='external nofollow' class='url'>Indra Bayu</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-54160">July 12, 2015 at 4:42 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Thanks for posting this. I will be great if you can also post tutorials about this web server you&#8217;re using in Linux, specifically in handling ASP.NET Websites like what we deal with using ISS. </p>
<p>Thanks!</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-54160' onclick='return addComment.moveForm( "comment-54160", "54160", "respond", "760" )' aria-label='Reply to Indra Bayu'>Reply</a>    </div>

    <ul class="children">

    <li class="comment byuser comment-author-ivankristianto bypostauthor odd alt depth-2" id="comment-54395">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/6685a72b801dc159a59ed45887f0e8b2?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/6685a72b801dc159a59ed45887f0e8b2?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn"><a href='http://www.ivankristianto.com/' rel='external nofollow' class='url'>Ivan Kristianto</a></cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-54395">July 24, 2015 at 2:35 am</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>Hello Indra, it clear says that the web server is using Apache.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-54395' onclick='return addComment.moveForm( "comment-54395", "54395", "respond", "760" )' aria-label='Reply to Ivan Kristianto'>Reply</a>    </div>

    </li><!-- #comment-## -->
</ul><!-- .children -->
</li><!-- #comment-## -->

    <li class="comment even thread-odd thread-alt depth-1" id="comment-56120">

    
    <div class="comment-author vcard">
            <img alt='' src='https://secure.gravatar.com/avatar/a6fbd9c887433c1893d14b4d1b77638e?s=48&#038;d=mm&#038;r=g' srcset='https://secure.gravatar.com/avatar/a6fbd9c887433c1893d14b4d1b77638e?s=96&#038;d=mm&#038;r=g 2x' class='avatar avatar-48 photo' height='48' width='48' />            <cite class="fn">Vivek Patwardhan</cite> <span class="says">says:</span>    </div><!-- end .comment-author -->

    <div class="comment-meta commentmetadata">
            <a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-56120">August 19, 2016 at 3:50 pm</a>
                </div><!-- end .comment-meta -->

    <div class="comment-content">
            
            <p>what was sestatus then?<br />
I am working on same thing, having trouble in SELinux and mono configuration.<br />
My .aspx loads when selinux is disabled; and can&#8217;t when it is disabled or permissive.</p>
    </div><!-- end .comment-content -->

    <div class="reply">
        <a rel='nofollow' class='comment-reply-link' href='#comment-56120' onclick='return addComment.moveForm( "comment-56120", "56120", "respond", "760" )' aria-label='Reply to Vivek Patwardhan'>Reply</a>    </div>

    </li><!-- #comment-## -->
                </ol>
                <div class="comment-navigation">
                    <ul class="pager">
                        <li class="previous"></li>
                        <li class="next"></li>
                    </ul>
                </div>
        </div><!--end #comments-->
                <div id="pings">
                <h3>Trackbacks</h3>                <ol class="ping-list">
                    		<li id="comment-976" class="pingback even thread-even depth-1">
			<article id="div-comment-976" class="comment-body">
				<footer class="comment-meta">
					<div class="comment-author vcard">
												<b class="fn"><a href='http://onthefencedevelopment.com/?p=562' rel='external nofollow' class='url'>Running Screwturn Wiki under Mono @ On The Fence Development</a></b> <span class="says">says:</span>					</div><!-- .comment-author -->

					<div class="comment-metadata">
						<a href="https://www.ivankristianto.com/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#comment-976">
							<time datetime="2010-10-18T16:56:32+00:00">
								October 18, 2010 at 4:56 pm							</time>
						</a>
											</div><!-- .comment-metadata -->

									</footer><!-- .comment-meta -->

				<div class="comment-content">
					<p>[&#8230;] point of view). After installing the LAMP stack (click here if you need help with this) and Mono (click here for the step by step installation that I used for my investigations) I set about downloading Screwturn [&#8230;]</p>
				</div><!-- .comment-content -->

				<div class="reply"><a rel='nofollow' class='comment-reply-link' href='#comment-976' onclick='return addComment.moveForm( "div-comment-976", "976", "respond", "760" )' aria-label='Reply to Running Screwturn Wiki under Mono @ On The Fence Development'>Reply</a></div>			</article><!-- .comment-body -->
</li><!-- #comment-## -->
                </ol>
        </div><!-- end #pings -->
        
		<div id="respond" class="comment-respond">
							<h3 id="reply-title" class="comment-reply-title">Give me your feedback					<small><a rel="nofollow" id="cancel-comment-reply-link" href="/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono/#respond" style="display:none;">Cancel reply</a></small>
				</h3>
						<form id="commentform" class="comment-form">
				<iframe src="https://jetpack.wordpress.com/jetpack-comment/?blogid=6196678&#038;postid=760&#038;comment_registration=0&#038;require_name_email=1&#038;stc_enabled=0&#038;stb_enabled=0&#038;show_avatars=1&#038;avatar_default=mystery&#038;greeting=Give+me+your+feedback&#038;greeting_reply=Leave+a+Reply+to+%25s&#038;color_scheme=light&#038;lang=en_US&#038;jetpack_version=5.6&#038;sig=fb0a5369d40c4b74b4da658292ad91ae686ca3c5#parent=https%3A%2F%2Fwww.ivankristianto.com%2Fhowto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono%2F" style="width:100%; height: 430px; border:0;" name="jetpack_remote_comment" class="jetpack_remote_comment" id="jetpack_remote_comment"></iframe>
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
		window.WPCOM_sharing_counts = {"https:\/\/www.ivankristianto.com\/howto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono\/":760};
	</script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/syntaxhighlighter/syntaxhighlighter3/scripts/shCore.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/syntaxhighlighter/syntaxhighlighter3/scripts/shBrushBash.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/syntaxhighlighter/syntaxhighlighter3/scripts/shBrushXml.js'></script>
<script type='text/javascript' src='https://www.ivankristianto.com/wp-content/plugins/syntaxhighlighter/syntaxhighlighter3/scripts/shBrushCSharp.js'></script>
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
						frame.src = "https://jetpack.wordpress.com/jetpack-comment/?blogid=6196678&postid=760&comment_registration=0&require_name_email=1&stc_enabled=0&stb_enabled=0&show_avatars=1&avatar_default=mystery&greeting=Give+me+your+feedback&greeting_reply=Leave+a+Reply+to+%25s&color_scheme=light&lang=en_US&jetpack_version=5.6&sig=fb0a5369d40c4b74b4da658292ad91ae686ca3c5#parent=https%3A%2F%2Fwww.ivankristianto.com%2Fhowto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono%2F" + '&replytocom=' + parseInt( comm_par, 10 ).toString();
					} else {
						frame.src = "https://jetpack.wordpress.com/jetpack-comment/?blogid=6196678&postid=760&comment_registration=0&require_name_email=1&stc_enabled=0&stb_enabled=0&show_avatars=1&avatar_default=mystery&greeting=Give+me+your+feedback&greeting_reply=Leave+a+Reply+to+%25s&color_scheme=light&lang=en_US&jetpack_version=5.6&sig=fb0a5369d40c4b74b4da658292ad91ae686ca3c5#parent=https%3A%2F%2Fwww.ivankristianto.com%2Fhowto-run-asp-net-on-linux-with-apache-web-server-mono-mod_mono%2F";
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
	_stq.push([ 'view', {v:'ext',j:'1:5.6',blog:'6196678',post:'760',tz:'7',srv:'www.ivankristianto.com'} ]);
	_stq.push([ 'clickTrackerInit', '6196678', '760' ]);
</script>
</body>
</html>
<!-- Dynamic page generated in 0.236 seconds. -->
<!-- Cached page generated by WP-Super-Cache on 2017-12-11 20:40:27 -->
