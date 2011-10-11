<?php

/*
Template Name: Events
*/

?>

<?php get_header(); ?>
		<h1>Events</h1>
		<p>We gather monthly for presenations, to listen to speakers, workshops, or to simply visit. We also strive to support 
		other local user groups and organizations. Please feel free to submit ideas and to contribute to the calendar.</p>
		
		<p>Unless otherwise noted on the calendar, we meet on the third Thursday of each month at:<br /<br />
		<strong>Bill Good Marketing, 12393 Gateway Park Place, Suite 600, Draper, Utah</strong><br /><br />
		
		<a href="http://maps.google.com/maps?f=q&hl=en&geocode=&time=&date=&ttype=&q=12393+Gateway+Park+Pl+Ste+600,+draper,+utah&sll=40.520259,-111.894593&sspn=0.032297,0.037165&ie=UTF8&ll=40.527566,-111.89764&spn=0.064587,0.074329&z=14&iwloc=addr&om=1"><img style="border-top: 1px solid #909090; border-bottom: 1px solid #909090;" src="/wp-content/themes/choke/images/map.jpg" /></a>
		</p>
	
		<h2>calendar</h2>
		<p>The calendar is a aggregate of local user groups, organizations, 
		and group sponsored activities. Subscribe to our feed to have it 
		automatically added to your own calendar. If you do not have a 
		calendar application that can subscribe to feeds, you may use this 
		<a href="/calendar/month.php" target="_blank">web calendar</a> to view the events.</p>
		<p>Are you aware of a PHP or web development related event that's not listed here? Do you 
		or your organization publish a calendar that could be included? Send an email 
		about it to the list or post a note in the channel and we'll add it to the calendar.</p>
		<p><a class="subscribecal" href="webcal://ugaf.org/calendar/calendars/UGAF.ics">subscribe to calendar</a></p>
	
		<h2>events</h2>
		<ul class="nobullets">
			<?php
			//$from = time() - (90 * 24 * 60 * 60); // three months back
			//$from = time();
			$from = time() - (1 * 24 * 60 * 60);
			ICalEvents::display_events('url=http://uphpu.org/calendar/calendars/UPHPU.ics&limit=20&use_description=0&use_location=1&after_date=</strong><br />&date_format=%G %B %e / &time_format=%R&gmt_start=' . $from);
			?>
		</ul>

<?php get_footer(); ?>

