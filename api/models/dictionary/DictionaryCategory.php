<?php

namespace app\models\dictionary;

use MongoDB\BSON\ObjectID;
use Yii;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "DictionaryCategory".
 *
 * @property ObjectID|string $_id
 * @property mixed $categoryId
 * @property mixed $name
 */
class DictionaryCategory extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function collectionName()
    {
        return 'DictionaryCategory';
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'categoryId',
            'name',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryId', 'name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id'        => Yii::t('app', 'ID'),
            'categoryId' => Yii::t('app', 'Category ID'),
            'name'       => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return array
     */
    public static function listAsOptions()
    {
        $items = [];
        $result = self::find()
            ->select(['categoryId', 'name'])
            ->asArray()
            ->all();

        if (!empty($result)) {
            foreach ($result as $item) {
                $items[$item['categoryId']] = $item['name'];
            }
        }

        return $items;
    }

    /**
     * @param $categoryId
     *
     * @return string
     */
    public static function nameById($categoryId): string
    {
        $result = self::find()
            ->where(['categoryId' => $categoryId])
            ->one();

        if ($result) {
            return $result->name;
        }

        return '';
    }
}
