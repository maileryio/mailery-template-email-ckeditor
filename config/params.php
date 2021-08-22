<?php

use Mailery\Template\Email\CKEditor\Editor;
use Yiisoft\Factory\Definition\Reference;

return [
    'maileryio/mailery-template-email' => [
        'editors' => [
            Reference::to(Editor::class),
        ],
    ],
];
