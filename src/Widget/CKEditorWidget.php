<?php

namespace Mailery\Template\Email\CKEditor\Widget;

use Yiisoft\Widget\Widget;
use Mailery\Template\Email\Model\EmailEditorInterface;

class CKEditorWidget extends Widget implements EmailEditorInterface
{
    private const NAME = 'ckeditor';

    /**
     * @inheritdoc
     */
    public function match(?string $value): bool
    {
        return $value === self::NAME;
    }
}
