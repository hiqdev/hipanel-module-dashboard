<?php

namespace hipanel\modules\dashboard\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class SmallBox extends Widget
{
    const COLOR_GRAY = 'bg-gray';
    const COLOR_GRAY_LIGHT = 'bg-gray-light';
    const COLOR_BLACK = 'bg-black';
    const COLOR_RED = 'bg-red';
    const COLOR_YELLOW = 'bg-yellow';
    const COLOR_AQUA = 'bg-aqua';
    const COLOR_BLUE = 'bg-blue';
    const COLOR_LIGHT_BLUE = 'bg-light-blue';
    const COLOR_GREEN = 'bg-green';
    const COLOR_NAVY = 'bg-navy';
    const COLOR_TEAL = 'bg-teal';
    const COLOR_OLIVE = 'bg-olive';
    const COLOR_LIME = 'bg-lime';
    const COLOR_ORANGE = 'bg-orange';
    const COLOR_FUCHSIA = 'bg-fuchsia';
    const COLOR_PURPLE = 'bg-purple';
    const COLOR_MAROON = 'bg-maroon';

    /**
     * http://fontawesome.io/icons/
     * @var string
     */
    public $boxIcon = 'fa-globe';

    public $boxTitle = 'Lorem Ipsum';

    public $boxColor = self::COLOR_AQUA;

    public function init()
    {
        print '<div class="small-box ' . $this->boxColor . '">';
    }

    public function beginBody()
    {
        print '<div class="inner">' . Html::tag('h3', $this->boxTitle) . '<p>';
    }

    public function endBody()
    {
        print "</p><br></div>";
    }

    public function beginFooter()
    {
        print '<div class="icon"><i class="fa ' . $this->boxIcon . '"></i></div><div class="small-box-footer-container">';
    }

    public function endFooter()
    {
        print '<div class="clearfix"></div></div></div>';
    }

    public function icon($faIcon = 'fa-arrow-circle-right')
    {
        return "&nbsp;<i class=\"fa {$faIcon}\"></i>";
    }
}
