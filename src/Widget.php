<?php

namespace Mailery\Template\Email\CKEditor;

use Yiisoft\Widget\Widget as BaseWidget;
use Mailery\Web\Assets\AppAssetBundle;
use Mailery\Template\Email\CKEditor\AssetBundle;
use Yiisoft\Html\Html;
use Mailery\Template\Email\Model\EditorWidgetInterface;
use Mailery\Assets\AssetBundleRegistry;

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
     * @var AssetBundleRegistry
     */
    private AssetBundleRegistry $assetBundleRegistry;

    /**
     * @param AssetBundleRegistry $assetBundleRegistry
     */
    public function __construct(AssetBundleRegistry $assetBundleRegistry)
    {
        $this->assetBundleRegistry = $assetBundleRegistry;
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
        $this->assetBundleRegistry->add(AssetBundle::class);
    }
}
