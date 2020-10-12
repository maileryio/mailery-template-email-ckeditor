<?php

namespace Mailery\Template\Email\CKEditor;

use Yiisoft\Widget\Widget as BaseWidget;
use Yiisoft\Assets\AssetManager;
use Mailery\Web\Assets\AppAssetBundle;
use Mailery\Template\Email\CKEditor\AssetBundle;
use Yiisoft\Html\Html;
use Mailery\Template\Email\Model\EditorWidgetInterface;

final class Widget extends BaseWidget implements EditorWidgetInterface
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $value;

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
     * @param string $name
     * @return self
     */
    public function withName(string $name): self
    {
        $new = clone $this;
        $new->name = $name;

        return $new;
    }

    /**
     * @param string $value
     * @return self
     */
    public function withValue(string $value): self
    {
        $new = clone $this;
        $new->value = $value;

        return $new;
    }

    /**
     * {@inheritdoc}
     */
    protected function run(): string
    {
        $this->registerAssets();

        return Html::tag(
            'ui-template-email-ckeditor',
            '',
            [
                'input-name' => $this->name,
                'input-value' => $this->value,
            ]
        );
    }

    /**
     * @return void
     */
    private function registerAssets()
    {
        $bundle = $this->assetManager->getBundle(AppAssetBundle::class);
        $bundle->depends[] = AssetBundle::class;
    }
}
