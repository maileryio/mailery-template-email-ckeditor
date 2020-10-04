<?php

namespace Mailery\Template\Email\CKEditor;

use Yiisoft\Widget\Widget as BaseWidget;

final class Widget extends BaseWidget
{
    /**
     * @param string $content
     * @return self
     */
    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }
}
