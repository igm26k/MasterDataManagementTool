<?php

namespace app\models\menu;

use app\models\dictionary\DictionaryCategory;
use MongoDB\BSON\ObjectID;
use Yii;
use yii\behaviors\AttributeTypecastBehavior;
use yii\mongodb\ActiveRecord;
use yii\mongodb\Connection;

/**
 * This is the model class for collection "Menu".
 *
 * @property ObjectID|string $_id
 * @property string $name
 * @property int $dictionaryId
 * @property bool $active
 */
class Menu extends ActiveRecord
{
    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'typecast' => [
                'class'                 => AttributeTypecastBehavior::class,
                'attributeTypes'        => [
                    'dictionaryId' => AttributeTypecastBehavior::TYPE_INTEGER,
                    'name'         => AttributeTypecastBehavior::TYPE_STRING,
                    'active'       => AttributeTypecastBehavior::TYPE_BOOLEAN,
                ],
                'typecastAfterValidate' => true,
                'typecastBeforeSave'    => true,
                'typecastAfterFind'     => true,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return ['MDMToolMongo', 'Menu'];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'name',
            'dictionaryId',
            'active',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'dictionaryId', 'active'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id'          => Yii::t('app', 'ID'),
            'name'         => Yii::t('app', 'Name'),
            'dictionaryId' => Yii::t('app', 'Dictionary'),
            'active'       => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @param $attribute
     *
     * @return string
     */
    public static function label($attribute)
    {
        $model = new self();

        return $model->getAttributeLabel($attribute);
    }

    /**
     * @return array
     * @throws \yii\mongodb\Exception
     */
    public static function items()
    {
        /**
         * @var $mongo Connection
         */
        $mongo = Yii::$app->mongodb;
        $params = [
            [
                '$match' => [
                    'active' => true,
                ],
            ],
            [
                '$lookup' => [
                    'from'         => 'DictionaryMeta',
                    'localField'   => 'dictionaryId',
                    'foreignField' => 'dictionaryId',
                    'as'           => 'dictionaryMeta',
                ],
            ],
        ];

        $result = $mongo
            ->getCollection(self::collectionName())
            ->aggregate($params, [
                'allowDiskUse' => true,
            ]);

        if (empty($result)) {
            return [];
        }

        $items = [];
        $children = [];

        foreach ($result as $index => $item) {
            $route = $item['dictionaryMeta'][0]['route'];
            $categoryId = $item['dictionaryMeta'][0]['categoryId'];
            $categoryName = DictionaryCategory::findOne(['categoryId' => $categoryId])->name;
            $children[$categoryName][] = [
                'text'  => $item['name'],
                'route' => $route,
            ];
        }

        foreach ($children as $index => $child) {
            $items[] = [
                'text'     => $index,
                'model'    => false,
                'children' => $child,
            ];
        }

        return $items;
    }
}
