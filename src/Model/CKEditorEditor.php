<?php

namespace Mailery\Template\Email\CKEditor\Model;

use Mailery\Template\Email\Model\EmailEditorInterface;

class CKEditorEditor implements EmailEditorInterface
{
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
    public function getValue(): string
    {
        return 'ckeditor';
    }
}
