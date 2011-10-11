<?php

get_currentuserinfo() ;
global $user_level;

?>

<div id="column_3">
	<div id="column_3_box">
		
		<h2>Authors</h2>	
		<ul>
			<?php wp_list_authors(array('optioncount' => true)); ?>
			
		</ul>
		<h2>Social Media</h2>
		<ul>
			<li><a href="http://americanpreppersnetwork.net/viewforum.php?f=80" target="_new">UtahPreppers Forum</a></li>
			<li><a href="http://www.facebook.com/pages/Utah-Preppers/272107165236" target="_new">Facebook Page</a></li>
			<li><a href="http://twitter.com/#!/UtahPreppers" target="_new">Twitter</a></li>
		</ul>
		<h2>General Preparedness Sites</h2>	
		<ul>
			<?php wp_list_bookmarks('title_li=&categorize=0&category=296'); ?>
		</ul>		
		<h2>Other State prepper groups</h2>	
		<ul>
			<?php wp_list_bookmarks('title_li=&categorize=0&category=31'); ?>
		</ul>
		
		<h2>Utah preparedness sites</h2>
		<ul>
			<?php wp_list_bookmarks('title_li=&categorize=0&category=2'); ?>
		</ul>
	
		<h2>Archives</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
		
		<h2>Syndication</h2>
		<ul>
			<li><a href="feed:<?php bloginfo('rss2_url'); ?>">posts RSS</a></li>
			<li><a href="feed:<?php bloginfo('comments_rss2_url'); ?>">comments RSS</a></li>
		</ul>
	</div>
</div>
<div id="column_2">
	<div id="social">
		<a class="social_link" id="rss" href="/feed">Subscribe to our feed</a>
		<a class="social_link" id="twitter" href="http://twitter.com/utahpreppers">Follow us on Twitter</a>
	</div>
		
	<h2>Recent posts</h2>
		
	<div class="column_2_box">
		<ul class="post">
			<?php limited_width_recent_posts('type=postbypost&limit=20'); ?>
		</ul>
	</div>
	
	<h2>Recent comments</h2>
	<div class="column_2_box">
		<?php
		
		if(function_exists('src_simple_recent_comments')) {
			src_simple_recent_comments(20,29,'','');
		}
		
		?>
	</div>
        
        <h2>Supporting the Site</h2>
	<div class="column_2_box">

<!-- Project Wonderful ad code -->
<script type="text/javascript">
   var pw_d=document;
   pw_d.projectwonderful_adbox_id = "53433";
   pw_d.projectwonderful_adbox_type = "4";
</script>
<script type="text/javascript" src="http://www.projectwonderful.com/ad_display.js"></script>
<!-- End of Project Wonderful ad code -->
<div>
<!-- Ready Store -->
<a href="http://www.thereadystore.com/freeze-dried-food-storage?aid=4b02fb2078a16&amp;bid=f319a963" target="_top"><img src="http://www.thereadystore.com/affiliate/accounts/default1/banners/125x125fdf.jpg" alt="Freeze Dried Food" title="Freeze Dried Food" width="125" height="125" /></a><img style="border:0" src="http://www.thereadystore.com/affiliate/scripts/imp.php?aid=4b02fb2078a16&amp;bid=f319a963" width="1" height="1" alt="" />

<!-- Emergency Essentials -->
<a href="http://click.linksynergy.com/fs-bin/click?id=ON7t3pQ577Q&offerid=206969.10000083&type=4&subid=0"><IMG alt="New Baking Combo On Sale" border="0" src="http://beprepared.com/images/art/ls125125Feb2011.jpg"></a><IMG border="0" width="1" height="1" src="http://ad.linksynergy.com/fs-bin/show?id=ON7t3pQ577Q&bids=206969.10000083&type=4&subid=0">
</div>
<!-- Amazon -->
<iframe src="http://rcm.amazon.com/e/cm?t=prepper-20&o=1&p=21&l=ur1&category=outdoorrecreation&banner=164JRD7N4C2VKTAZDFG2&f=ifr" width="125" height="125" scrolling="no" border="0" marginwidth="0" style="border:none;" frameborder="0"></iframe>

<!-- Cabelas -->
<a href="http://gan.doubleclick.net/gan_click?lid=41000000034719893&pubid=21000000000303062"><img src="http://gan.doubleclick.net/gan_impression?lid=41000000034719893&pubid=21000000000303062" border=0 alt=""></a>

<!-- ThinkGeek -->
<a href="http://www.kqzyfj.com/22111nmvsmu9EAGIEEH9BAHGEGFG" target="_blank" onmouseover="window.status='http://www.thinkgeek.com/';return true;" onmouseout="window.status=' ';return true;">
<img src="http://www.ftjcfx.com/ok79h48x20MRNTVRRUMONUTRTST" alt="ThinkGeek Stuff for Smart Masses" border="0"/></a>

<!-- NitroPak -->
<a href="http://www.anrdoezrs.net/3p101dlurlt8D9FHDDG8A9DEICD9?sid=sidebar" target="_blank" onmouseover="window.status='http://www.nitro-pak.com';return true;" onmouseout="window.status=' ';return true;">
<img src="http://www.awltovhc.com/8e77snrflj495BD99C4659AE895" alt="Nitro-Pak Preparedness Center" border="0"/></a>


<a href="http://gan.doubleclick.net/gan_click?lid=41000000028375637&pubid=21000000000303062"><img src="http://gan.doubleclick.net/gan_impression?lid=41000000028375637&pubid=21000000000303062" border=0 alt="The Sportsman&#39;s Guide - Brand Banner"></a>

<a href="http://www.prepperpodcast.com/"><img src="http://www.utahpreppers.com/wp-content/uploads/2011/10/PrepperPodcastLogo2.png" border=0 alt="The Prepper Podcast" width="200" height="200"/></a>
	</div>
	        
        <h2>Tweet Stream</h2>
	<div class="column_2_box">
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 5,
  interval: 6000,
  width: 210,
  height: 300,
  theme: {
    shell: {
      background: '#333333',
      color: '#ffffff'
    },
    tweets: {
      background: '#000000',
      color: '#ffffff',
      links: '#4aed05'
    }
  },
  features: {
    scrollbar: true,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('UtahPreppers').start();
</script>
        </div>
</div>

<div class="clear"></div>
