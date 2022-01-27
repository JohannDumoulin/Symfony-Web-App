<?php

namespace App\Converter;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Output\RenderedContentInterface;

final class MarkdownConverter
{
    public function toHtml(string $content): string
    {
        $converter = new CommonMarkConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);

        /** @var RenderedContentInterface $rendererContent */
        $rendererContent = $converter->convert($content);
        return $rendererContent->getContent();
    }
}