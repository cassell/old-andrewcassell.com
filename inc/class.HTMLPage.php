<?php

require_once('class.Constant.php');

class HTMLPage
{
	private $scripts;
	private $styleSheets;
	
	const PRINTABLE_VERSION_GET = 'pf';
	const FAVICON_PNG = '/img/andrew_cassell_touch_icon.png';
	const MOBILE_SAFARI_VIEWPORT_WIDTH = '1036';
	const TOUCH_ICON_PNG = '/img/andrew_cassell_touch_icon.png';
	
	// prototypes
	function open() { }
	function close() { }
	
	function __construct()
	{
		if(Constant::DEBUG_MEMORY)
		{
			register_shutdown_function('HTMLPage::memoryTest');
		}
	}
	
	function insertScript($scriptName)
	{
		$this->scripts[] =  self::formatScript($scriptName);
	}
	
	function insertStyleSheet($styleSheet)
	{
		$this->styleSheets[] = self::formatStyleSheet($styleSheet);
	}
	
	function insertPrintMediaStyleSheet($styleSheet)
	{
		$this->styleSheets[] = self::formatPrintStyleSheet($styleSheet);
	}
	
	function insertJavaScriptBlock($block)
	{
		$this->scripts[] = '<script language="Javascript" type="text/javascript">' . $block . '</script>';
	}
	
	function insertStyleBlock($block)
	{
		$this->styleSheets[] = '<style type="text/css">' . $block . '</style>';
	}
	
	function formatScript($scriptName)
	{
		if(Properties::THIS_IS_PRODUCTION)
		{
			return '<script language="Javascript" type="text/javascript" src="' . Properties::STATIC_HOST . Properties::STATIC_VERSIONING . $scriptName . '"></script>';
		}
		else
		{
			return '<script language="Javascript" type="text/javascript" src="' . $scriptName . '"></script>';
		}
		
	}
	
	function formatStyleSheet($styleSheet)
	{
		if(Properties::THIS_IS_PRODUCTION)
		{
			return '<link rel="stylesheet" href="' . Properties::STATIC_HOST . Properties::STATIC_VERSIONING . $styleSheet . '" type="text/css" />';
		}
		else
		{
			return '<link rel="stylesheet" href="' . $styleSheet . '" type="text/css" />';
		}
		
	}
	
	function formatPrintStyleSheet($styleSheet)
	{
		if(Properties::THIS_IS_PRODUCTION)
		{
			return '<link rel="stylesheet" href="' . Properties::STATIC_HOST . Properties::STATIC_VERSIONING . $styleSheet . '" type="text/css" media="print" />';
		}
		else
		{
			return '<link rel="stylesheet" href="' . $styleSheet . '" type="text/css" media="print" />';
		}
	}
	
	function getScripts()
	{
		return @implode("",$this->scripts);
	}
	
	function getStyleSheets()
	{
		return @implode("",$this->styleSheets);
	}
	
	function isPF()
	{
		return array_key_exists(self::PRINTABLE_VERSION_GET, $_GET);
	}
	
	function setHtmlTitle($val) { $this->htmlTitle = $val; }
	function getHtmlTitle() { return $this->htmlTitle; }
	
	function detectInternetExplorer6()
	{
		if(strpos(Server::getHTTPUserAgent(),"MSIE 6"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function detectInternetExplorer7()
	{
		if(strpos(Server::getHTTPUserAgent(),"MSIE 7"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function detectInternetExplorer8()
	{
		if(strpos(Server::getHTTPUserAgent(),"MSIE 8"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function detectInternetExplorer9()
	{
		if(strpos(Server::getHTTPUserAgent(),"MSIE 9"))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function humanFileSize($size)
	{
		if ($size == 0) return 0;
		
		$filesizename = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
		return round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i];
	}
	
	function memoryTest()
	{
		echo '<div style="margin:20px;">';
			echo '<div style="background:#FFE2AF;font-size:16px;padding:5px;">Current Memory Usage: ' . self::humanFileSize(memory_get_usage(true)) . '</div>';
			echo '<div style="background:#FFE2AF;font-size:16px;padding:5px;">Max Memory Usage: ' .  self::humanFileSize(memory_get_peak_usage(true)) . '</div>';
			echo '<div style="background:#FFE2AF;font-size:16px;padding:5px;">PHP Max Memory Allowed: ' .  ini_get('memory_limit') . '</div>';
			
			$files = get_included_files();
			$fileList = array();
			$fileTotals = array(
				"count" => count($files),
				"size" => 0,
				"largest" => 0,
			);
			foreach($files as $key => $file) {
				$size = filesize($file);
				$fileList[] = array(
						'name' => $file,
						'size' => self::humanFileSize($size)
					);
				$fileTotals['size'] += $size;
				if($size > $fileTotals['largest']) $fileTotals['largest'] = $size;
			}
			$fileTotals['size'] = self::humanFileSize($fileTotals['size']);
			$fileTotals['largest'] = self::humanFileSize($fileTotals['largest']);
			
			echo '<div style="background:#FFE2AF;font-size:16px;padding:5px;">Included Files: ' . $fileTotals['count'] . '</div>';
			echo '<div style="background:#FFE2AF;font-size:16px;padding:5px;">Included File Size: ' . $fileTotals['size'] . '</div>';
			
		echo '</div>';
	}
	
	function printHtmlHeader()
	{
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
			 '<html xmlns="http://www.w3.org/1999/xhtml">',
		 	 '<head>',
		  	 '<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />',
			 '<meta http-equiv="Pragma" content="no-cache" />',
		 	 '<meta http-equiv="content-script-type" content="text/javascript" />',
			 '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
			 '<title>' , $this->getHtmlTitle() , '</title>',
			 '<link rel="shortcut icon" href="', self::FAVICON_PNG ,'" type="image/png" />',
		     '<link rel="icon" href="', self::FAVICON_PNG ,'" type="image/png" />',
			 '<link rel="apple-touch-icon" href="' . self::TOUCH_ICON_PNG . '" />';
		
		echo $this->getScripts();
		echo $this->getStyleSheets();
		
		?>

<!--[if lte IE 6]>
	<?php echo self::formatStyleSheet("/css/ie6.css"); ?>
<![endif]-->

<?php
		echo '</head>';

		flush();
		
		echo '<body>';
	}
	
	function getCustomMeta() { }
	
	function getViewPortMeta()
	{
		if(self::detectiPad() || self::detectiPhone() || self::detectiPod())
		{
			return  '<meta name="viewport" content="width=' . self::MOBILE_SAFARI_VIEWPORT_WIDTH . '" />';
		}
	}
	
	function printHtmlFooter() 
	{
		echo '</body></html>';
	}
	
	function detectMobileBrowser()
	{
		return (self::detectiPhone() || self::detectiPod() || self::detectKindle() || self::detectiPad() || self::detectSmartPhoneBrowser());
	}
	
	function detectiPhone()
	{
		if(strpos($_SERVER['HTTP_USER_AGENT'],"Safari") && strpos($_SERVER['HTTP_USER_AGENT'],"iPhone"))
		{
			return true;
		}
		else return false;
	}
	
	function detectiPad()
	{
		if(strpos($_SERVER['HTTP_USER_AGENT'],"Safari") && strpos($_SERVER['HTTP_USER_AGENT'],"iPad"))
		{
			return true;
		}
		else return false;
	}
	
	function detectiPod()
	{
		if(strpos($_SERVER['HTTP_USER_AGENT'],"Safari") && strpos($_SERVER['HTTP_USER_AGENT'],"iPod"))
		{
			return true;
		}
		else return false;
	}
	
	function detectKindle()
	{
		if(strpos($_SERVER['HTTP_USER_AGENT'],"Kindle"))
		{
			return true;
		}
		else return false;
	}
	
	private function detectSmartPhoneBrowser()
	{
		$op = strtolower($_SERVER['HTTP_X_OPERAMINI_PHONE']);
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		$ac = strtolower($_SERVER['HTTP_ACCEPT']);
		
		return strpos($ac, 'application/vnd.wap.xhtml+xml') !== false
		        || $op != ''
		        || strpos($ua, 'sony') !== false 
		        || strpos($ua, 'symbian') !== false 
		        || strpos($ua, 'nokia') !== false 
		        || strpos($ua, 'samsung') !== false 
		        || strpos($ua, 'mobile') !== false
		        || strpos($ua, 'windows ce') !== false
		        || strpos($ua, 'epoc') !== false
		        || strpos($ua, 'opera mini') !== false
		        || strpos($ua, 'nitro') !== false
		        || strpos($ua, 'j2me') !== false
		        || strpos($ua, 'midp-') !== false
		        || strpos($ua, 'cldc-') !== false
		        || strpos($ua, 'netfront') !== false
		        || strpos($ua, 'mot') !== false
		        || strpos($ua, 'up.browser') !== false
		        || strpos($ua, 'up.link') !== false
		        || strpos($ua, 'audiovox') !== false
		        || strpos($ua, 'blackberry') !== false
		        || strpos($ua, 'ericsson,') !== false
		        || strpos($ua, 'panasonic') !== false
		        || strpos($ua, 'philips') !== false
		        || strpos($ua, 'sanyo') !== false
		        || strpos($ua, 'sharp') !== false
		        || strpos($ua, 'sie-') !== false
		        || strpos($ua, 'portalmmm') !== false
		        || strpos($ua, 'blazer') !== false
		        || strpos($ua, 'avantgo') !== false
		        || strpos($ua, 'danger') !== false
		        || strpos($ua, 'palm') !== false
		        || strpos($ua, 'series60') !== false
		        || strpos($ua, 'palmsource') !== false
		        || strpos($ua, 'pocketpc') !== false
		        || strpos($ua, 'smartphone') !== false
		        || strpos($ua, 'rover') !== false
		        || strpos($ua, 'ipaq') !== false
		        || strpos($ua, 'au-mic,') !== false
		        || strpos($ua, 'alcatel') !== false
		        || strpos($ua, 'ericy') !== false
		        || strpos($ua, 'up.link') !== false
		        || strpos($ua, 'vodafone/') !== false
		        || strpos($ua, 'wap1.') !== false
		        || strpos($ua, 'wap2.') !== false;
	}
	
}

?>