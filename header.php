<!--

+----------------------------------------------------------------------+
| Anavi Design                                                         |
| Creative Boutique                                                    |
| anavidesign.com                                                      |
+----------------------------------------------------------------------+
| Copyright (c) 2010 Anavi Design                                      |
+----------------------------------------------------------------------+
| SITE: uphpu.org                                                      |
+----------------------------------------------------------------------+
| VERSION: 1.0                                                         |
+----------------------------------------------------------------------+
| AUTHOR(S): Wade Preston Shearer                                      |
+----------------------------------------------------------------------+
| DATE: 2007/11/16                                                     |
+----------------------------------------------------------------------+
| SECTION:                                                             |
+----------------------------------------------------------------------+
| MODULE:                                                              |
+----------------------------------------------------------------------+
| FILE: global template                                                |
+----------------------------------------------------------------------+
| NOTES:                                                               |
+----------------------------------------------------------------------+

-->

<!DOCTYPE html PUBLIC
	"-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!-- TkTilnoAOsUYtMGNCLgs5gSe1P4 -->
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Discussion Board Archive <?php } ?> <?php wp_title(); ?></title>

<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://shearerfam.com/xmlrpc.php?rsd" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="Utah Preppers Syndication" href="/feed/" />

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<style media="screen" type="text/css">
@import url('<?php bloginfo('stylesheet_url'); ?>');
</style>


<?php wp_head(); ?>

<script src="<?php bloginfo('template_directory'); ?>/scripts/prototype.js" type="text/javascript"></script>
<!-- script src="<?php bloginfo('template_directory'); ?>/scripts/scriptaculous.js" type="text/javascript"></script -->
<script src="//ajax.googleapis.com/ajax/libs/scriptaculous/1.8.3/scriptaculous.js" type="text/javascript"></script>
<!--script src="//ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script-->
<!--script src="<?php bloginfo('template_directory'); ?>/scripts/combo.js" type="text/javascript"></script-->
<script type='text/javascript' src='http://partner.googleadservices.com/gampad/google_service.js'>
</script>
<script type='text/javascript'>
GS_googleAddAdSenseService("ca-pub-2586279575739262");
GS_googleEnableAllServices();
</script>
<script type='text/javascript'>
GA_googleAddSlot("ca-pub-2586279575739262", "HomePage_Header");
</script>
<script type='text/javascript'>
GA_googleFetchAds();
</script>
</head>
<body>

<div id="parch_a">
<div id="parch_b">

	<div id="header">
		<a id="home" href="/">return home</a>
		<ul id="nav">
			<li><a href="/utah-bulk-food-suppliers/">Resources</a></li>
			<li><a href="/glossary">Glossary</a></li>
			<li><a href="/authors">Authors</a></li>
			<li><a href="/contact">Contact</a></li>
		</ul>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	</div>
<div id="wrapper">
	<div id="page">
		<div id="column_1">
	