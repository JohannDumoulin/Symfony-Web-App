<?php

namespace App\Twig;

use App\Converter\MarkdownConverter;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class MarkdownExtension extends AbstractExtension
{
    private MarkdownConverter $markdownConverter;

    public function __construct(MarkdownConverter $markdownConverter)
    {
        $this->markdownConverter = $markdownConverter;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('markdown_to_html', [$this, 'toHtml']),
        ];
    }

    public function toHtml(string $content): string
    {
        return $this->markdownConverter->toHtml($content);
    }
}