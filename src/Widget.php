<?php

namespace Mailery\Template\Email\CKEditor;

use Yiisoft\Widget\Widget as BaseWidget;
use Yiisoft\Assets\AssetManager;
use Mailery\Web\Assets\AppAssetBundle;
use Mailery\Template\Email\CKEditor\AssetBundle;

final class Widget extends BaseWidget
{
    /**
     * @var AssetManager
     */
    private AssetManager $assetManager;

    /**
     * @param AssetManager $assetManager
     */
    public function __construct(AssetManager $assetManager)
    {
        $this->assetManager = $assetManager;
    }

    /**
     * @param string $content
     * @return self
     */
    public function content(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function run(): string
    {
        $bundle = $this->assetManager->getBundle(AppAssetBundle::class);
        $bundle->depends[] = AssetBundle::class;

        return '<div>.....</div>';
    }
}
