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
		$this->insertStyleSheet('/css/bootstrap.min.css');
		$this->insertStyleSheet('/css/bootstrap-responsive.min.css');
		$this->insertStyleSheet('/css/site.css');
		$this->insertScript('/js/jquery.js');
		$this->insertScript('/js/bootstrap.min.js');
		$this->insertScript('/js/jquery.backstretch.min.js');
		$this->insertJavaScriptBlock("
$(document).ready(function() {
$(\"#background\").backstretch(\"" . $this->wrapImageS3('/img/cassell-right.jpg') . "\");
});");
		
		// build script causes this to run
		if(php_sapi_name() == 'cli')
		{
			$this->insertAnalytics();
		}
	}
	
	function open()
	{
		
		$this->printHtmlHeader();
		
		echo '<div id="background"><div id="stripe">&nbsp;</div></div>';
		echo '<div id="background-mobile"><div id="stripe">&nbsp;</div></div>';
		
	}
	
	function close()
	{
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