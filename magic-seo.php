<?php 

require __DIR__ . '/vendor/autoload.php';

use Aeusteixeira\MagicSeo\MetaTags\MetaTagsGenerator;

$metaTags = new MetaTagsGenerator();
$metaTags->setTitle('Título da página');
$metaTags->setDescription('Descrição da página');
$metaTags->setKeywords('palavra-chave 1, palavra-chave 2, palavra-chave 3');
$metaTags->setAuthor('Matheus Teixeira');
$metaTags->setPublicationDate('2021-01-01');
$metaTags->setLanguage('pt-br');
$metaTags->setCopyright('');
$metaTags->setWebPageStructuredData();

echo $metaTags->generateAllTags() . PHP_EOL;
