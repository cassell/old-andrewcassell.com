<?php

require_once('inc/config.inc.php');

$page = new AndrewCassellPage();
$page->insertStyleSheet('/css/home.css');
$page->open();

?>
<img style="display:none" src="<?php echo $page->wrapImageS3('/img/cassell-right.jpg'); ?>">
<div id="name-menu-back"></div>
<div id="name-menu">
	<div id="mobile-me"><img src="/img/cassell-square.jpg"></div>
	<div id="signature"><a href="/">Andrew Cassell</a></div>
	<div id="tagline">Web Application Developer<div>Herndon, Virginia</div></div>
	<ul id="menu">
		<li><a href="/blog/">Blog</a></li>
		<li><a href="http://www.github.com/cassell">GitHub</a></li>
		<li><a href="http://www.twitter.com/andrewcassell">Twitter</a></li>
		<li><a href="http://www.facebook.com/andrewcassell">Facebook</a></li>
		<li><a href="http://www.sweetradish.com">SweetRadish</a></li>
	</ul>
</div>
<script>
setInterval(function()
{
	var offsets = $("#name-menu").offset();
	if(offsets.top > 500)
	{
			
		$("#name-menu").offset({ top: 400, left: 30 })
	}
},3000);
</script>
<?php

$page->close();


?>