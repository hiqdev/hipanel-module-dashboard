<?php
/**
 * Dashboard Plugin for HiPanel.
 *
 * @link      https://github.com/hiqdev/hipanel-module-dashboard
 * @package   hipanel-module-dashboard
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2015-2017, HiQDev (http://hiqdev.com/)
 */

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

    /** @var string css class */
    public $buttonColor;

    public function run()
    {
        $formId = $this->formOptions['id'];
        $this->getView()->registerCss("#{$formId} button {-webkit-box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);}");
        $form = ActiveForm::begin(array_merge($this->defaultFormOptions, $this->formOptions));
        echo Html::beginTag('div', ['class' => 'row']);
        echo Html::beginTag('div', ['class' => 'col-xs-12']);
        echo Html::beginTag('div', ['class' => 'input-group']);
        if ($this->inputWidget) {
            echo $form->field($this->model, $this->attribute, ['template' => '{input}'])->widget($this->inputWidget, $this->inputOptions);
        } else {
            echo $form->field($this->model, $this->attribute, ['template' => '{input}'])->input($this->inputType, array_merge([
                'placeholder' => $this->model->getAttributeLabel($this->attribute),
                'class' => 'form-control',
            ], $this->inputOptions));
        }
        echo Html::beginTag('span', ['class' => 'input-group-btn']);
        echo Html::submitButton(Yii::t('hipanel', 'Search'), ['class' => 'btn btn-flat ' . $this->buttonColor]);
        echo Html::endTag('span');
        echo Html::endTag('div');
        echo Html::endTag('div');
        echo Html::endTag('div');
        ActiveForm::end();
    }
}
