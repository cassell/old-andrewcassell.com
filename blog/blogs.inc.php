<?php

//require_once(Properties::DOC.'inc/class.StaticSiteBlog.php');

$d = Properties::DOC.'blog/entries/' ;


$blog = new StaticSiteBlog();
$blog->setBlogFolder('/blog/');
$blog->setBlogTitle("Andrew Cassell's Blog");
$blog->setBlogSubTitle("Andrew Cassell is a Web Application Developer in Herndon, VA");
$blog->setAtomFeedURL("http://www.andrewcassell.com/blog/atom.xml");
$blog->setHomeURL("http://www.andrewcassell.com/");
$blog->setAuthor('Andrew Cassell');
$blog->setBlogBaseURL('http://www.andrewcassell.com/blog/');


// place newest entires at the top

$a = new StaticSiteBlogArticle();
$a->setDate("06/11/2012");
$a->setDestinationUrl("2012/sqlicious-php-orm-mysql-closure-database-processor-open-source");
$a->setTitle("SQLicious is an Open Source PHP ORM and Closure Based Database Processor and Abstraction Layer for MySQL");
$a->setMarkdownSource($d."2012/sqlicious/sqlicious.md");
$blog->addArticle($a);

$a = new StaticSiteBlogArticle();
$a->setDate("02/27/2012");
$a->setDestinationUrl("2012/pictures-of-people-scanning-qr-codes");
$a->setTitle("QR Code for Pictures of People Scanning QR Codes");
$a->setMarkdownSource($d."2012/pictures-of-people-scanning-qr-codes/pictures-of-people-scanning-qr-codes.txt");
$blog->addArticle($a);

$a = new StaticSiteBlogArticle();
$a->setDate("02/27/2012");
$a->setDestinationUrl("2012/my-bash-profile");
$a->setTitle("My Bash Profile");
$a->setMarkdownSource($d."2012/my-bash-profile/my-bash-profile.txt");
$blog->addArticle($a);

$a = new StaticSiteBlogArticle();
$a->setDate("02/26/2012");
$a->setDestinationUrl("2012/iphone-and-ipad-css-media-queries");
$a->setTitle("iPhone and iPad CSS Media Queries");
$a->setMarkdownSource($d."2012/iphone-and-ipad-css-media-queries/iphone-and-ipad-css-media-queries.txt");
$blog->addArticle($a);

$a = new StaticSiteBlogArticle();
$a->setDate("02/25/2012");
$a->setDestinationUrl("2012/open-sourced-my-personal-site");
$a->setTitle("Open Sourced This Site");
$a->setMarkdownSource($d."2012/open-sourced-my-personal-site/open-sourced-my-personal-site.txt");
$blog->addArticle($a);

$a = new StaticSiteBlogArticle();
$a->setDate("02/08/2012");
$a->setDestinationUrl("2012/remember-mac-window-positions");
$a->setTitle("Mac Window Positioning Utility");
$a->setMarkdownSource($d."2012/remember-mac-window-positions/remember-mac-window-positions.txt");
$blog->addArticle($a);

$a = new StaticSiteBlogArticle();
$a->setDate("12/15/2011");
$a->setDestinationUrl("2011/amazon-s3-static-site-baker");
$a->setTitle("Amazon S3 Static Site Baker");
$a->setMarkdownSource($d."2011/amazon-s3-static-site-baker/amazon-s3-static-site-baker.txt");
$blog->addArticle($a);

$a = new StaticSiteBlogArticle();
$a->setDate("11/1/2011");
$a->setDestinationUrl("2011/static-blogging-engine");
$a->setTitle("PHP Static Blogging Engine");
$a->setMarkdownSource($d."2011/static-blogging-engine/static-blogging-engine.txt");
$blog->addArticle($a);


$a = new StaticSiteBlogArticle();
$a->setDate("7/14/2011");
$a->setDestinationUrl("2011/techzing-tech-podcast");
$a->setTitle("TechZing Tech Podcast");
$a->setMarkdownSource($d."2011/techzing-tech-podcast/techzing-tech-podcast.txt");
$blog->addArticle($a);

$a = new StaticSiteBlogArticle();
$a->setDate("6/17/2011");
$a->setDestinationUrl("2011/hello-world");
$a->setTitle("Hello World, Again.");
$a->setMarkdownSource($d."2011/hello-world/hello-world.txt");
$blog->addArticle($a);

?>