<?php

namespace Mailery\Template\Email\CKEditor;

use Mailery\Template\Email\Model\EditorInterface;
use Mailery\Template\Email\CKEditor\Widget;

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
    public function getWidget(): Widget
    {
        return Widget::widget();
    }
}
