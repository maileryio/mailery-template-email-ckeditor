<?php

namespace Mailery\Template\Email\CKEditor;

use Mailery\Template\Email\Model\EditorInterface;
use Mailery\Template\Email\CKEditor\Widget;

class Editor implements EditorInterface
{
    /**
     * @var string
     */
    private string $content;

    /**
     * @inheritdoc
     */
    public function withContent(string $content): self
    {
        $new = clone $this;
        $new->content = $content;

        return $new;
    }

    /**
     * @inheritdoc
     */
    public function getName(): string
    {
        return 'ckeditor';
    }

    /**
     * @inheritdoc
     */
    public function getLabel(): string
    {
        return 'CKEditor';
    }

    /**
     * @inheritdoc
     */
    public function getWidget(): Widget
    {
        return Widget::widget()
            ->content($this->content);
    }
}
