<?php

require_once('inc/config.inc.php');

$page = new AndrewCassellPage();

$page->open();

echo '<div class="content photo" style="width:596px;"><img alt="Andrew Cassell as a child carrying an inflatable crayon." title="Andrew Cassell as a child carrying an inflatable crayon." src="' . $page->wrapImageS3('/img/andrew-cassell-404.jpg') . '"></div>';

$page->close();


?>