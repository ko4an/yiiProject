<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "compatibility".
 *
 * @property int $Id
 * @property int|null $Xray
 * @property int|null $Vesta
 * @property int|null $Priora
 * @property int|null $Granta
 *
 * @property Items[] $items
 */
class Compatibility extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'compatibility';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Xray', 'Vesta', 'Priora', 'Granta'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Xray' => 'Xray',
            'Vesta' => 'Vesta',
            'Priora' => 'Priora',
            'Granta' => 'Granta',
        ];
    }

    /**
     * Gets query for [[Items]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItems()
    {
        return $this->hasMany(Items::className(), ['compatibility_Id' => 'Id']);
    }
}
