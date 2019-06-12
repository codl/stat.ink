<?php
/**
 * @copyright Copyright (C) 2015-2019 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@bouhime.com>
 */

declare(strict_types=1);

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "stat_weapon2_tier".
 *
 * @property integer $id
 * @property integer $version_group_id
 * @property string $month
 * @property integer $rule_id
 * @property integer $weapon_id
 * @property integer $players_count
 * @property integer $win_count
 * @property double $win_percent
 * @property double $avg_kill
 * @property double $med_kill
 * @property double $stderr_kill
 * @property double $avg_death
 * @property double $med_death
 * @property double $stderr_death
 * @property string $updated_at
 *
 * @property Rule2 $rule
 * @property SplatoonVersionGroup2 $versionGroup
 * @property Weapon2 $weapon
 */
class StatWeapon2Tier extends ActiveRecord
{
    public static function tableName()
    {
        return 'stat_weapon2_tier';
    }

    public function rules()
    {
        return [
            [
                [
                    'version_group_id',
                    'month',
                    'rule_id',
                    'weapon_id',
                    'players_count',
                    'win_count',
                    'win_percent',
                    'avg_kill',
                    'med_kill',
                    'stderr_kill',
                    'avg_death',
                    'med_death',
                    'stderr_death',
                    'updated_at',
                ],
                'required',
            ],
            [['version_group_id', 'rule_id', 'weapon_id', 'players_count', 'win_count'], 'default',
                'value' => null,
            ],
            [['version_group_id', 'rule_id', 'weapon_id', 'players_count', 'win_count'], 'integer'],
            [['month', 'updated_at'], 'safe'],
            [
                [
                    'win_percent',
                    'avg_kill',
                    'med_kill',
                    'stderr_kill',
                    'avg_death',
                    'med_death',
                    'stderr_death',
                ],
                'number',
            ],
            [['version_group_id', 'month', 'rule_id', 'weapon_id'], 'unique',
                'targetAttribute' => ['version_group_id', 'month', 'rule_id', 'weapon_id'],
            ],
            [['rule_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Rule2::class,
                'targetAttribute' => ['rule_id' => 'id'],
            ],
            [['version_group_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => SplatoonVersionGroup2::class,
                'targetAttribute' => ['version_group_id' => 'id'],
            ],
            [['weapon_id'], 'exist',
                'skipOnError' => true,
                'targetClass' => Weapon2::class,
                'targetAttribute' => ['weapon_id' => 'id'],
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'version_group_id' => 'Version Group ID',
            'month' => 'Month',
            'rule_id' => 'Rule ID',
            'weapon_id' => 'Weapon ID',
            'players_count' => 'Players Count',
            'win_count' => 'Win Count',
            'win_percent' => 'Win Percent',
            'avg_kill' => 'Avg Kill',
            'med_kill' => 'Med Kill',
            'stderr_kill' => 'Stderr Kill',
            'avg_death' => 'Avg Death',
            'med_death' => 'Med Death',
            'stderr_death' => 'Stderr Death',
            'updated_at' => 'Updated At',
        ];
    }

    public function getRule(): ActiveQuery
    {
        return $this->hasOne(Rule2::class, ['id' => 'rule_id']);
    }

    public function getVersionGroup(): ActiveQuery
    {
        return $this->hasOne(SplatoonVersionGroup2::class, ['id' => 'version_group_id']);
    }

    public function getWeapon(): ActiveQuery
    {
        return $this->hasOne(Weapon2::class, ['id' => 'weapon_id']);
    }
}
