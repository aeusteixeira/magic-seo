<?php 

require __DIR__ . '/vendor/autoload.php';

use Aeusteixeira\MagicSeo\MetaTags\MetaTagsGenerator;
use Aeusteixeira\MagicSeo\RobotsTxt\RobotsTxtGenerator;

$robotsTxtGenerator = new RobotsTxtGenerator();
$robotsTxtGenerator->allow('/path1');
$robotsTxtGenerator->allow('/path2');
$robotsTxtGenerator->disallow('/path2');
$robotsTxtGenerator->setSitemap('https://example.com/sitemap.xml');
$robotsTxtGenerator->writeToFile(__DIR__ . '/robots.txt');