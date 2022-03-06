<?php

namespace Mailery\Template\Email\CKEditor;

use Yiisoft\Widget\Widget as BaseWidget;
use Mailery\Template\Email\CKEditor\AssetBundle;
use Yiisoft\Html\Html;
use Yiisoft\Form\FormModelInterface;
use Yiisoft\Form\Helper\HtmlForm;
use Yiisoft\Form\Widget\Field;
use Mailery\Template\Email\Model\EditorWidgetInterface;
use Mailery\Assets\AssetBundleRegistry;

final class Widget extends BaseWidget implements EditorWidgetInterface
{

    /**
     * @var FormModelInterface
     */
    private FormModelInterface $data;

    /**
     * @var string
     */
    private string $attribute;

    /**
     * @var array
     */
    private array $options = [];

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
     * @inheritdoc
     */
    public function config(FormModelInterface $data, string $attribute): self
    {
        $new = clone $this;
        $new->data = $data;
        $new->attribute = $attribute;
        return $new;
    }

    /**
     * @inheritdoc
     */
    public function options(array $options = []): self
    {
        $new = clone $this;
        $new->options = $options;
        return $new;
    }

    /**
     * @inheritdoc
     */
    protected function run(): string
    {
        $this->registerAssets();

        $value = HtmlForm::getAttributeValue($this->data, $this->attribute);
        if ($value !== null && is_scalar($value)) {
            $value = (string)$value;
        }

        return Field::widget()
            ->config($this->data, $this->attribute)
            ->template(strtr(
                "{label}\n{input}\n{hint}\n{error}",
                [
                    '{input}' => Html::tag(
                        'ui-template-email-ckeditor',
                        '',
                        [
                            'input-name' => $this->attribute,
                            'input-value' => $value,
                        ]
                    )
                ]
            ))
            ->textArea($this->options);
    }

    /**
     * @return void
     */
    private function registerAssets()
    {
        $this->assetBundleRegistry->add(AssetBundle::class);
    }
}
