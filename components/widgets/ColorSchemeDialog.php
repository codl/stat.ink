<?php
/**
 * @copyright Copyright (C) 2015-2019 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@bouhime.com>
 */

declare(strict_types=1);

namespace app\components\widgets;

use Yii;
use app\assets\ThemeAsset;
use yii\helpers\Html;

class ColorSchemeDialog extends Dialog
{
    public $bootswatch = [
        'bootswatch-cosmo' => 'Cosmo',
        'bootswatch-cyborg' => 'Cyborg',
        'bootswatch-darkly' => 'Darkly',
        'bootswatch-flatly' => 'Flatly',
        'bootswatch-paper' => 'Paper',
        'bootswatch-slate' => 'Slate',
    ];

    public function init()
    {
        parent::init();
        $this->title = implode(' ', [
            FA::fas('palette')->fw(),
            Html::encode(Yii::t('app', 'Color Scheme')),
        ]);
        $this->titleFormat = 'raw';
        $this->hasClose = true;
        $this->footer = Dialog::FOOTER_CLOSE;
        $this->body = $this->createBody();
        $this->wrapBody = false;
    }

    private function createBody(): string
    {
        ThemeAsset::register($this->view);

        return Html::tag(
            'div',
            $this->renderDefaultScheme() . $this->renderBootswatch(),
            ['class' => 'list-group-flush']
        );
    }

    private function renderDefaultScheme(): string
    {
        return implode('', [
            $this->renderScheme('default', Yii::t('app', 'Default Color')),
            $this->renderScheme('color-blind', Yii::t('app', 'Color-Blind Support')),
        ]);
    }

    private function renderBootswatch(): string
    {
        return implode('', [
            Html::tag(
                'div',
                Yii::t('app', 'Themes from {name}', [
                    'name' => Html::a(
                        'Bootswatch',
                        'https://bootswatch.com/3/',
                        [
                            'target' => '_blank',
                            'style' => [
                                'color' => '#fff',
                            ],
                        ]
                    ),
                ]),
                [
                    'class' => 'list-group-item',
                    'style' => [
                        'color' => '#fff',
                        'background-color' => '#868e96',
                        'font-size' => '75%',
                    ],
                ]
            ),
            implode('', array_map(
                function (string $key, string $name): string {
                    return $this->renderScheme(
                        $key,
                        Yii::t('app', '{theme} Theme', [
                            'theme' => $name,
                        ])
                    );
                },
                array_keys($this->bootswatch),
                array_values($this->bootswatch)
            )),
        ]);
    }

    private function renderScheme(string $key, string $name): string
    {
        if ($key === Yii::$app->theme->theme) {
            return Html::tag(
                'div',
                Html::encode($name),
                [
                    'class' => [
                        'list-group-item',
                    ],
                    'style' => [
                        'color' => '#fff',
                        'background' => '#337ab7',
                    ],
                ]
            );
        } else {
            return Html::a(
                Html::encode($name),
                'javascript:;',
                [
                    'class' => [
                        'list-group-item',
                        'theme-switcher',
                        'text-dark',
                    ],
                    'data' => [
                        'theme' => $key,
                    ],
                ]
            );
        }
    }
}