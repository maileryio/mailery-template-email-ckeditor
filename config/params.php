<?php

use Mailery\Template\Email\CKEditor\Model\CKEditorEditor;

return [
    'maileryio/mailery-template-email' => [
        'editors' => [
            CKEditorEditor::class => CKEditorEditor::class,
        ],
    ],
];
