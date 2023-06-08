<?php

namespace Aeusteixeira\MagicSeo\MetaTags;

class MetaTagsGenerator
{
    private string $title;
    private string $description;
    private string $keywords;
    private string $author;
    private string $publicationDate;
    private string $language;
    private string $copyright;
    private array $structuredData;


    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        if (strlen($title) > 60) {
            throw new \InvalidArgumentException('O título é muito longo. Deve ter no máximo 60 caracteres.');
        }
        $this->title = $title;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        if (strlen($description) > 160) {
            throw new \InvalidArgumentException('A descrição é muito longa. Deve ter no máximo 160 caracteres.');
        }
        $this->description = $description;
    }

    /**
     * @param string $keywords
     * @return void
     */
    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    /**
     * @param string $author
     * @return void
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    /**
     * @param string $date
     * @return void
     */
    public function setPublicationDate(string $date): void
    {
        $this->publicationDate = $date;
    }

    /**
     * @param string $language
     * @return void
     */
    public function setLanguage(string $language): void
    {
        $this->language = $language;
    }

    /**
     * @param string $copyright
     * @return void
     */
    public function setCopyright(string $copyright): void
    {
        $this->copyright = $copyright;
    }

    /**
     * Generate the title tag
     * @param array $structuredData
     * @return void
     */
    public function generateTitleTag(): string
    {
        return '<title>' . htmlspecialchars($this->title) . '</title>';
    }

    /**
     * Generate the description tag
     * @return string
     */
    public function generateDescriptionTag(): string
    {
        return '<meta name="description" content="' . htmlspecialchars($this->description) . '">';
    }

    /**
     * Generate the keywords tag
     * @return string
     */
    public function generateKeywordsTag(): string
    {
        return '<meta name="keywords" content="' . htmlspecialchars($this->keywords) . '">';
    }

    /**
     * Generate the social tags
     * @param array $networks
     * @return string
     */
    public function generateSocialTags(array $networks = ['facebook', 'twitter']): string
    {
        $socialTags = '';
        foreach ($networks as $network) {
            switch ($network) {
                case 'facebook':
                    $socialTags .= $this->generateOpenGraphTags();
                    break;
                case 'twitter':
                    $socialTags .= $this->generateTwitterTags();
                    break;
                    // Adicione mais redes sociais aqui conforme necessário
            }
        }
        return $socialTags;
    }

    /**
     * Generate the Open Graph tags
     * @return string
     */
    private function generateOpenGraphTags(): string
    {
        return '<meta property="og:title" content="' . htmlspecialchars($this->title) . '">' . "\n"
            . '<meta property="og:description" content="' . htmlspecialchars($this->description) . '">' . "\n";
    }

    /**
     * Generate the Twitter tags
     * @return string
     */
    private function generateTwitterTags(): string
    {
        return '<meta name="twitter:title" content="' . htmlspecialchars($this->title) . '">' . "\n"
                .'<meta name="twitter:description" content="' . htmlspecialchars($this->description) . '">' . "\n";
    }

    /**
     * Generate the author tag
     * @return string
     */
    public function generateAuthorTag(): string
    {
        return '<meta name="author" content="' . htmlspecialchars($this->author) . '">';
    }

    /**
     * Generate the publication date tag
     * @return string
     */
    public function generatePublicationDateTag(): string
    {
        return '<meta name="date" content="' . htmlspecialchars($this->publicationDate) . '">';
    }

    /**
     * Generate the language tag
     * @return string
     */
    public function generateLanguageTag(): string
    {
        return '<meta name="language" content="' . htmlspecialchars($this->language) . '">';
    }

    /**
     * Generate the robots tag
     * @param array $robots
     * @return string
     */
    public function generateCopyrightTag(): string
    {
        return '<meta name="copyright" content="' . htmlspecialchars($this->copyright) . '">';
    }

    /**
     * Create the structured data
     * @param array $robots
     * @return string
     */
    public function setWebPageStructuredData(): void
    {
        $this->structuredData = [
            "@context" => "https://schema.org/",
            "@type" => "WebPage",
            "name" => $this->title,
            "description" => $this->description,
            "author" => [
                "@type" => "Person",
                "name" => $this->author
            ],
            "datePublished" => date('Y-m-d')
        ];
    }

    /**
     * Generate the structured data tag
     * @return string
     */
    public function generateStructuredDataTag(): string
    {
        $structuredDataJson = json_encode($this->structuredData);
        return '<script type="application/ld+json">' . $structuredDataJson . '</script>';
    }

    /**
     * Generate all tags
     * @return string
     */
    public function generateAllTags(): string
    {
        $tags = $this->generateTitleTag() . "\n";
        $tags .= $this->generateDescriptionTag() . "\n";
        $tags .= $this->generateKeywordsTag() . "\n";
        $tags .= $this->generateSocialTags() . "\n";
        $tags .= $this->generateAuthorTag() . "\n";
        $tags .= $this->generatePublicationDateTag() . "\n";
        $tags .= $this->generateLanguageTag() . "\n";
        $tags .= $this->generateCopyrightTag() . "\n";
        $tags .= $this->generateStructuredDataTag() . "\n";

        return $tags;
    }
}

