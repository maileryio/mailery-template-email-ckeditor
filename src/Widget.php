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
     * @param AssetBundleRegistry $assetBundleRegistry
     */
    public function __construct(
        private AssetBundleRegistry $assetBundleRegistry
    ) {}

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
        $this->assetBundleRegistry->add(AssetBundle::class);

        $value = HtmlForm::getAttributeValue($this->data, $this->attribute);
        if ($value !== null && is_scalar($value)) {
            $value = (string) $value;
        }

        return Field::widget()
            ->textArea($this->data, $this->attribute, $this->options)
            ->template(strtr(
                "{label}\n{input}\n{hint}\n{error}",
                [
                    '{input}' => Html::tag(
                        'ui-template-email-ckeditor',
                        '',
                        [
                            'input-name' => HtmlForm::getInputName($this->data, $this->attribute),
                            'input-value' => $value,
                        ]
                    )
                ]
            ));
    }

}
