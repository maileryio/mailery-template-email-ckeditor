<?php

namespace Mailery\Template\Email\CKEditor;

use Mailery\Template\Editor\EditorInterface;
use Mailery\Template\Email\CKEditor\Widget;
use Mailery\Template\Editor\EditorWidgetInterface;

class Editor implements EditorInterface
{
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
    public function getWidget(): EditorWidgetInterface
    {
        return Widget::widget();
    }
}
