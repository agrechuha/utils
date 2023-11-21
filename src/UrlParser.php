<?php

namespace Agrechuha\Utils;

class UrlParser
{
    private ?string            $url;
    private ?string            $scheme;
    private ?string            $host;
    private ?int               $port;
    private ?string            $user;
    private ?string            $pass;
    private array              $path;
    private ?string            $fragment;
    private array              $queryConditions   = [];

    public function __construct(string $url)
    {
        if ($url) {
            $urlData = parse_url($url);

            $this->url      = $url;
            $this->scheme   = $urlData['scheme'] ?? null;
            $this->host     = $urlData['host'] ?? null;
            $this->port     = isset($urlData['port']) ? (int)$urlData['port'] : null;
            $this->user     = $urlData['user'] ?? null;
            $this->pass     = $urlData['pass'] ?? null;
            $this->fragment = $urlData['fragment'] ?? null;
            $this->path     = $urlData['path']
                ? array_values(
                    array_filter(explode('/', $urlData['path']), function (?string $element) {
                        return $element !== '';
                    })
                )
                : [];

            if (isset($urlData['query']) && $urlData['query']) {
                parse_str($urlData['query'], $this->queryConditions);
            }
        }
    }

    /**
     * @return string|null
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return string|null
     */
    public function getScheme(): ?string
    {
        return $this->scheme;
    }

    /**
     * @return string|null
     */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * @return int|null
     */
    public function getPort(): ?int
    {
        return $this->port;
    }

    /**
     * @return string|null
     */
    public function getUser(): ?string
    {
        return $this->user;
    }

    /**
     * @return string|null
     */
    public function getPass(): ?string
    {
        return $this->pass;
    }

    /**
     * @return array
     */
    public function getPath(): array
    {
        return $this->path;
    }

    /**
     * @return array
     */
    public function getQueryConditions(): array
    {
        return $this->queryConditions;
    }

    /**
     * @return string|null
     */
    public function getFragment(): ?string
    {
        return $this->fragment;
    }
}
