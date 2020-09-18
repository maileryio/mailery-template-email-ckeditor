<?php

namespace Mailery\Template\Email\CKEditor\Widget;

use Mailery\Template\Email\Model\EmailEditorInterface;
use Yiisoft\Widget\Widget;

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
