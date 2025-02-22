<?php

/**
 * @copyright Copyright (C) 2015-2022 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\assets;

use yii\web\AssetBundle;

final class FlagIconCssAsset extends AssetBundle
{
    public $sourcePath = '@node/flag-icons';
    public $css = [
        'css/flag-icons.min.css',
    ];
    public $publishOptions = [
        'only' => [
            'css/*',
            'flags/*/*',
        ],
    ];
}
