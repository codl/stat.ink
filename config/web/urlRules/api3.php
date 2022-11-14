<?php

declare(strict_types=1);

use app\components\helpers\UuidRegexp;

$uuid = UuidRegexp::get(false);

return [
    "DELETE api/v3/battle/<uuid:{$uuid}>" => 'api-v3/delete-battle',

    'POST api/v3/salmon' => 'api-v3/post-salmon',
    'PUT api/v3/salmon' => 'api-v3/post-salmon',

    'api/v3/s3s/<action:[\w-]+>' => 'api-v3/s3s-<action>',
    'api/v3/<action:[\w-]+>.<format:[\w]+>' => 'api-v3/<action>',
    'api/v3/<action:[\w-]+>' => 'api-v3/<action>',
];
