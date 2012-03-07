<?php

require_once('../inc/config.inc.php');

$page = new AndrewCassellPage();
$page->setHtmlTitle('PHP Amazon S3 Static Site Baker');
$page->open();

echo '<div class="content blog"><h1>PHP Amazon S3 Static Site Baker</h1>';

echo '<p><a href="https://github.com/cassell/Amazon-S3-Static-Site-Baker-for-PHP">Visit this project on GitHub</a></p>';

echo '</div>';

$page->close();


?>