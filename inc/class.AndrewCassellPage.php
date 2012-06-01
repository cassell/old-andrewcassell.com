<?php

require_once('class.HTMLPage.php');

class AndrewCassellPage extends HTMLPage
{
	const MENU_BLOG = 'blog';
	const MENU_SWEET_RADISH = 'sr';
	const MENU_ABOUT = 'about';
	const MENU_PHOTOS = 'photos';
	const MENU_GITHUB = 'github';
	const MENU_TWITTER = 'twitter';
	const MENU_FACEBOOK = 'facebook';
	const MENU_FORTASK = 'fortask';
	
	function __construct()
	{
		parent::__construct();
		
		$this->setHtmlTitle('Andrew Cassell Web Application Developer in Herndon, Virginia');
		
		$this->insertStyleSheet('/css/main.css');
		$this->insertPrintMediaStyleSheet('/css/print.css');
		
		if(php_sapi_name() == 'cli')
		{
			$this->insertAnalytics();
		}
	}
	
// 	function getCustomMeta()
// 	{
// 		$meta = '';
		
// 		$meta .= '<link href="http://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet" type="text/css">';
		
// 		return $meta;
// 	}
	
	function open($selectedMenu = null)
	{
		$this->printHtmlHeader();
		
		echo '<div class="printOnly printHeader"><div class="printHeaderName">Andrew Cassell</div>Web Application Developer<br/>www.AndrewCassell.com<br/></div>';
		
		echo '<div class="width960">';
		
			echo '<div id="left">';
		
				echo '<div id="signature"><a href="/">Andrew Cassell</a></div>';
				echo '<div id="signatureLine"></div>';
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
				
				echo '</ul>';
		
		echo '</div>';
		
		echo '<div id="right">';
		
	}
	
	function close()
	{
		
		echo '</div>'; // close right
		echo '</div>'; // close width960
		
		$this->printHtmlFooter();
	}
	
	function wrapImageS3($imgUrl)
	{
		if(Properties::THIS_IS_PRODUCTION)
		{
			return Properties::STATIC_HOST . Properties::STATIC_VERSIONING . $imgUrl;
		}
		else
		{
			return $imgUrl;
		}
	}
	
	static function getLinkUrl($url)
	{
		if(Properties::REPLACE_PHP_WITH_HTML_ON_RELEASE)
		{
			// return .html instead of .php
			if(substr($url,0,7) == 'http://' || substr($url,0,8) == 'https://')
			{
				return $url;
			}
			else if(substr($url,0,1) == '/')
			{
				return str_replace(".php",".html",$url);
			}
			else
			{
				die("first character of url must be a slash, or http://, or https://");
			}
		}
		else
		{
			return $url;
		}
	}
	
	function insertAnalytics()
	{
		ob_start();
		?>
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-16667504-1']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	 	  })();
		<?php
		$this->insertJavaScriptBlock(ob_get_clean());
	}
	
}

?>