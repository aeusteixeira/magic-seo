<?php

namespace Aeusteixeira\MagicSeo\PreviewImage;

use Intervention\Image\ImageManagerStatic as Image;

class PreviewImageGenerator{

    private string $title;
    private string $description;
    private string $outputPath;

    public function __construct(string $title, string $description, string $outputPath)
    {
        $this->title = $title;
        $this->description = $description;
        $this->outputPath = $outputPath;
    }

    public function generateImage()
    {
        // Crie uma nova imagem em branco
        $image = Image::canvas(1200, 630, '#ffffff');

        // Adicione o título à imagem
        $image->text($this->title, 10, 50, function($font) {
            $font->file('arial.ttf');
            $font->size(30);
            $font->color('#000000');
        });

        // Adicione a descrição à imagem
        $image->text($this->description, 10, 100, function($font) {
            $font->file('arial.ttf');
            $font->size(20);
            $font->color('#000000');
        });

        // Salve a imagem no caminho de saída
        $image->save($this->outputPath);
    }
}
