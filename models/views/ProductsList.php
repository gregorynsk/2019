<?php

namespace app\models\views;

use Yii;

/**
 * This is the model class for table "products_list".
 *
 * @property int $id
 * @property int $category_id
 * @property int $price
 * @property int $hidden
 * @property string $name
 */
class ProductsList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_list';
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'price', 'hidden'], 'integer'],
            [['category_id', 'price', 'hidden'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'price' => 'Price',
            'hidden' => 'Hidden',
            'name' => 'Name',
        ];
    }
}
