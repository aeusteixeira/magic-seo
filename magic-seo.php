<?php

use Aeusteixeira\MagicSeo\PreviewImage\PreviewImageGenerator;

require __DIR__ . '/vendor/autoload.php';

$generator = new PreviewImageGenerator('Título da Página', 'Descrição da Página', 'path/to/background-image.jpg');
$result = $generator->generateImage('path/to/output-image.jpg');

if ($result) {
    echo 'Imagem gerada com sucesso!';
} else {
    echo 'Falha ao gerar a imagem.';
}
