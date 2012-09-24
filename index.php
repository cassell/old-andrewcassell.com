<?php

require_once('inc/config.inc.php');

$page = new AndrewCassellPage();
$page->insertStyleSheet('/css/home.css');
$page->open();

?>
<div id="name-menu-back"></div>
<div id="name-menu">
	<div id="mobile-me"><img src="<?php echo $page->wrapImageS3('img/cassell-square.jpg'); ?>"></div>
	<div id="signature"><a href="/">Andrew Cassell</a></div>
	<div id="tagline">Web Application Developer<div>Herndon, Virginia</div></div>

	<ul id="menu">
		<li><a href="/blog/">Blog</a></li>
		<li><a href="http://www.github.com/cassell">GitHub</a></li>
		<li><a href="http://www.twitter.com/alc277">Twitter</a></li>
		<li><a href="http://www.facebook.com/andrewcassell">Facebook</a></li>
		<li><a href="http://www.sweetradish.com">SweetRadish</a></li>
	</ul>
</div>
<?php
/*

echo '<div class="container">';
		
		echo '<div class="row">';
		
			echo '<div class="span3">';
			
			echo '<div id="signature"><a href="/">Andrew Cassell</a></div>';
				echo '<div id="tagline">Web Application Developer<div>Herndon, Virginia</div></div>';
			
				$menu = array();
				//$menu[self::MENU_ABOUT] = array("url" => "/", "alt" => "About" , "img" => "about");
				$menu[self::MENU_BLOG] = array("url" => $this->getLinkUrl("/blog/"), "text" => "Blog" );
				$menu[self::MENU_GITHUB] = array("url" => "http://www.github.com/cassell", "text" => "GitHub" , "img" => "github");
				$menu[self::MENU_TWITTER] = array("url" => "http://www.twitter.com/alc277", "text" => "Twitter" , "img" => "twitter");
				$menu[self::MENU_FACEBOOK] = array("url" => "http://www.facebook.com/andrewcassell", "text" => "Facebook" , "img" => "facebook");
				$menu[self::MENU_SWEET_RADISH] = array("url" => "http://www.sweetradish.com", "text" => "SweetRadish" , "img" => "sweetradish");
				
				echo '<ul id="menu">';
				foreach($menu as $key => $item)
				{
					echo '<li>';
					
						echo '<a href="' . $item['url'] . '">';
						
						echo $item['text'];

						
						echo '</a>';
						
					echo '</li>';
				}
				
		echo '</div>';
			
		echo '<div class="span9">';
			echo '<div id="right-content">';



*/
//echo '<div class="content photo" style="width:500px;"><img alt="Andrew Cassell" title="Andrew Cassell" src="' . $page->wrapImageS3('/img/andrew-cassell.jpg') . '"></div>';

$page->close();


?>