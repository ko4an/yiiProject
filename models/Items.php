<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string|null $number
 * @property string|null $info
 * @property int $catalog_id
 * @property int $compatibility_Id
 *
 * @property Catalog $catalog
 * @property Compatibility $compatibility
 * @property Orders[] $orders
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalog_id', 'compatibility_Id'], 'required'],
            [['catalog_id', 'compatibility_Id'], 'integer'],
            [['number'], 'string', 'max' => 20],
            [['info'], 'string', 'max' => 200],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
            [['compatibility_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Compatibility::className(), 'targetAttribute' => ['compatibility_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Number',
            'info' => 'Info',
            'catalog_id' => 'Catalog ID',
            'compatibility_Id' => 'Compatibility ID',
        ];
    }

    /**
     * Gets query for [[Catalog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalog_id']);
    }

    /**
     * Gets query for [[Compatibility]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompatibility()
    {
        return $this->hasOne(Compatibility::className(), ['Id' => 'compatibility_Id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['items_id' => 'id']);
    }
}
