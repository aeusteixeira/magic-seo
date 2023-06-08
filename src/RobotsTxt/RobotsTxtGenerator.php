<?php

namespace Aeusteixeira\MagicSeo\RobotsTxt;

class RobotsTxtGenerator
{
    private string $userAgent = '*';
    private array $rules = [];
    private string $sitemap = '';

    /**
     * @param string $userAgent
     * @return void
     */
    public function setUserAgent(string $userAgent): void
    {
        $this->userAgent = $userAgent;
    }

    /**
     * @param string $path
     * @return void
     */
    public function allow(string $path): void
    {
        $this->rules[] = 'Allow: ' . $path;
    }

    /**
     * @param string $path
     * @return void
     */
    public function disallow(string $path): void
    {
        $this->rules[] = 'Disallow: ' . $path;
    }

    /**
     * @param string $sitemap
     * @return void
     */
    public function setSitemap(string $sitemap): void
    {
        $this->sitemap = $sitemap;
    }

    /**
     * Generate robots.txt file content
     * @return string
     */
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

    /**
     * Write the robots.txt file
     * @param string $filePath
     * @return void
     */
    public function writeToFile(string $filePath): void
    {
        file_put_contents($filePath, $this->generateRobotsTxt());
    }
}
