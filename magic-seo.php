<?php



require __DIR__ . '/vendor/autoload.php';

use Aeusteixeira\MagicSeo\MetaTags\MetaTagsGenerator;

$metaTags = new MetaTagsGenerator();
$metaTags->setTitle("Magic SEO");
$metaTags->setDescription("Biblioteca PHP para gerar tags de SEO automaticamente");
$metaTags->setKeywords("magic seo, seo automatic com php");
$metaTags->setAuthor("Matheus Teixeira");
$metaTags->setPublicationDate("07/06/2023");

echo $metaTags->generateAllTags();