<?php

require_once('inc/config.inc.php');

$page = new AndrewCassellPage();

$page->open();

echo '<div class="content photo" style="width:500px;"><img alt="Andrew Cassell" title="Andrew Cassell" src="' . $page->wrapImageS3('/img/andrew-cassell.jpg') . '"></div>';

$page->close();


?>