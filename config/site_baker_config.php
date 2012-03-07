<?php

/* PHP Site Baker Config File */

// www.andrewcassell.com

// s3 setup
$baker->setS3Key('S3KEYS3KEYS3KEYS3KEYS3KEYS3KEY');
$baker->setS3Secret('S3SECRETS3SECRETS3SECRETS3SECRETS3SECRETS3SECRET');
$baker->setStaticFilesBucketName('static.andrewcassell.com');
$baker->setWebFilesBucketName('www.andrewcassell.com');
$baker->setStaticFilesVersioning(date("YmdHi"));

// temp
$baker->setTempDirectory('/tmp');


$baker->addStaticFolder('/Library/WebServer/Documents/andrewcassell/css','/css');
$baker->addStaticFolder('/Library/WebServer/Documents/andrewcassell/img','/img');

$baker->addWebFile('/Library/WebServer/Documents/andrewcassell/robots.txt','/robots.txt');

$baker->addPHPWebFile('/Library/WebServer/Documents/andrewcassell/index.php',null,'/index.html');
$baker->addPHPWebFile('/Library/WebServer/Documents/andrewcassell/error.php',null,'/error.html');

$baker->addPHPWebFile('/Library/WebServer/Documents/andrewcassell/sitebaker/index.php',null,'/sitebaker/index.html');


$baker->addPHPWebFile('/Library/WebServer/Documents/andrewcassell/blog/index.php',null,'/blog/index.html');
$baker->addPHPWebFile('/Library/WebServer/Documents/andrewcassell/blog/feed.php',null,'/blog/atom.xml');

/* blog */
require_once('/Library/WebServer/Documents/andrewcassell/inc/config.inc.php');
include(Properties::DOC.'blog/blogs.inc.php');

foreach($blog->getArticles() as $article)
{
	$baker->addPHPWebFile('/Library/WebServer/Documents/andrewcassell/blog/index.php','?id='.$article->getId(),'/blog/' . $article->getDestinationUrl() . "/index.html");
}


?>