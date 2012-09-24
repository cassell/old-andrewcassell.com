<?php

require_once('../inc/config.inc.php');

$page = new AndrewCassellContentPage();
$page->setHtmlTitle('PHP Amazon S3 Static Site Baker');
$page->open();

echo '<div class="container">';

	echo '<div class="major-white-content">';

		echo '<h1>PHP Amazon S3 Static Site Baker</h1>';

		echo '<p><a href="https://github.com/cassell/Amazon-S3-Static-Site-Baker-for-PHP">Visit this project on GitHub</a></p>';

	echo '</div>';
echo '</div>';

$page->close();


?>