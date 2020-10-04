<?php

namespace Mailery\Template\Email\CKEditor;

use Mailery\Web\Assets\VueAssetBundle;
use Yiisoft\Assets\AssetBundle;

class AssetBundle extends AssetBundle
{
    /**
     * {@inheritdoc}
     */
    public ?string $basePath = '@public/assets/@maileryio/mailery-template-email-ckeditor-assets';

    /**
     * {@inheritdoc}
     */
    public ?string $baseUrl = '@web/@maileryio/mailery-template-email-ckeditor-assets';

    /**
     * {@inheritdoc}
     */
    public ?string $sourcePath = '@npm/@maileryio/mailery-template-email-ckeditor-assets/dist';

    /**
     * {@inheritdoc}
     */
    public array $js = [
        'main.umd.min.js',
    ];

    /**
     * {@inheritdoc}
     */
    public array $css = [
        'main.min.css',
    ];

    /**
     * {@inheritdoc}
     */
    public array $depends = [
        VueAssetBundle::class,
    ];
}
