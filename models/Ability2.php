<?php
/**
 * @copyright Copyright (C) 2015-2017 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@bouhime.com>
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "ability2".
 *
 * @property integer $id
 * @property string $key
 * @property string $name
 *
 * @property Brand2[] $strengthBrands
 * @property Brand2[] $weaknessBrands
 */
class Ability2 extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ability2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'name'], 'required'],
            [['key', 'name'], 'string', 'max' => 32],
            [['key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStrengthBrands()
    {
        return $this->hasMany(Brand2::class, ['strength_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWeaknessBrands()
    {
        return $this->hasMany(Brand2::class, ['weakness_id' => 'id']);
    }
}