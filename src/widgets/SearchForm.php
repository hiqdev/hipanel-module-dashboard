<?php

namespace hipanel\modules\dashboard\widgets;

use Yii;
use yii\base\Widget;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

class SearchForm extends Widget
{
    public $formOptions = [];

    protected $defaultFormOptions = [
        'method' => 'get',
    ];

    public $inputOptions = [];

    public $inputType = 'text';

    /**
     * @var string Widget class name
     */
    public $inputWidget;

    /**
     * @var \yii\base\Model Search model
     */
    public $model;

    /**
     * @var string
     */
    public $attribute;

    /** @var  string css class */
    public $buttonColor;

    public function run()
    {
        $formId = $this->formOptions['id'];
        $this->getView()->registerCss("#{$formId} button {-webkit-box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);}");
        $form = ActiveForm::begin(array_merge($this->defaultFormOptions, $this->formOptions));
        print Html::beginTag('div', ['class' => 'row']);
        print Html::beginTag('div', ['class' => 'col-xs-12']);
        print Html::beginTag('div', ['class' => 'input-group']);
        if ($this->inputWidget) {
            print $form->field($this->model, $this->attribute, ['template' => '{input}'])->widget($this->inputWidget, $this->inputOptions);
        } else {
            print $form->field($this->model, $this->attribute, ['template' => '{input}'])->input($this->inputType, array_merge([
                'placeholder' => $this->model->getAttributeLabel($this->attribute),
                'class' => 'form-control',
            ], $this->inputOptions));
        }
        print Html::beginTag('span', ['class' => 'input-group-btn']);
        print Html::submitButton(Yii::t('hipanel', 'Search'), ['class' => 'btn btn-flat ' . $this->buttonColor]);
        print Html::endTag('span');
        print Html::endTag('div');
        print Html::endTag('div');
        print Html::endTag('div');
        ActiveForm::end();
    }
}
