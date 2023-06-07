<?php

namespace Aeusteixeira\MagicSeo\RobotsTxt;

class RobotsTxtGenerator
{
    private string $userAgent = '*';
    private array $rules = [];
    private string $sitemap = '';

    public function setUserAgent(string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }

    public function allow(string $path): void
    {
        $this->rules[] = 'Allow: ' . $path;
    }

    public function disallow(string $path): void
    {
        $this->rules[] = 'Disallow: ' . $path;
    }

    public function setSitemap(string $sitemap): void
    {
        $this->sitemap = $sitemap;
    }

    public function generateRobotsTxt(): string
    {
        $robotsTxt = 'User-agent: ' . $this->userAgent . "\n";

        foreach ($this->rules as $rule) {
            $robotsTxt .= $rule . "\n";
        }

        if (!empty($this->sitemap)) {
            $robotsTxt .= 'Sitemap: ' . $this->sitemap . "\n";
        }

        return $robotsTxt;
    }

    public function writeToFile(string $filePath): void
    {
        file_put_contents($filePath, $this->generateRobotsTxt());
    }
}
