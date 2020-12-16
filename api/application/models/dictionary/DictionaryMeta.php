<?php

namespace app\models\dictionary;

use app\models\dictionary\columns\ColumnsModel;
use MongoDB\BSON\ObjectID;
use Yii;
use yii\behaviors\AttributeTypecastBehavior;
use yii\mongodb\ActiveRecord;

/**
 * This is the model class for collection "DictionaryMeta".
 *
 * @property ObjectID|string $_id
 * @property int $dictionaryId
 * @property string $name
 * @property string $categoryId
 * @property string $route
 * @property array $columns
 * @property array $rules
 */
class DictionaryMeta extends ActiveRecord
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
                    'categoryId'   => AttributeTypecastBehavior::TYPE_STRING,
                    'route'        => AttributeTypecastBehavior::TYPE_STRING,
                    'columns'      => function ($columns) {
                        if (!empty($columns)) {
                            foreach ($columns as $index => $column) {
                                $model = new ColumnsModel();
                                $model->setAttributes($column, false);
                                $model->typecastAttributes();

                                $columns[$index] = $model->getAttributes();
                            }
                        }

                        return $columns;
                    },
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
        return ['MDMToolMongo', 'DictionaryMeta'];
    }

    /**
     * @return array
     */
    public static function fieldTypes()
    {
        return [
            'num'      => Yii::t('fieldTypes', 'Numeric'),
            'text'     => Yii::t('fieldTypes', 'Text Input'),
            'textArea' => Yii::t('fieldTypes', 'Text Area'),
            'select'   => Yii::t('fieldTypes', 'Select'),
            'checkbox' => Yii::t('fieldTypes', 'Checkbox'),
            'boolean'  => Yii::t('fieldTypes', 'Boolean'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributes()
    {
        return [
            '_id',
            'dictionaryId',
            'name',
            'categoryId',
            'route',
            'columns',
            'rules',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dictionaryId'], 'integer'],
            [['name', 'categoryId', 'route', 'columns', 'rules'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            '_id'          => Yii::t('app', 'ID'),
            'dictionaryId' => Yii::t('app', 'Dictionary ID'),
            'name'         => Yii::t('app', 'Dictionary name'),
            'categoryId'   => Yii::t('app', 'Category'),
            'route'        => Yii::t('app', 'Route'),
            'columns'      => Yii::t('app', 'Columns'),
            'rules'        => Yii::t('app', 'Rules'),
        ];
    }

    /**
     * {@inheritdoc}
     *
     * @return DictionaryMetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DictionaryMetaQuery(get_called_class());
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
     */
    public static function listAsOptions()
    {
        $items = [];
        $result = self::find()
            ->select(['dictionaryId', 'name'])
            ->asArray()
            ->all();

        if (!empty($result)) {
            foreach ($result as $item) {
                $items[$item['dictionaryId']] = $item['name'];
            }
        }

        return $items;
    }

    /**
     * @param $dictionaryId
     *
     * @return array
     */
    public static function columnsAsOptions(int $dictionaryId)
    {
        $items = [];
        $result = self::find()
            ->select(['columns'])
            ->where(['dictionaryId' => $dictionaryId])
            ->asArray()
            ->one();

        if (!empty($result['columns'])) {
            foreach ($result['columns'] as $index => $column) {
                $items[$column['name']] = $column['description'];
            }
        }

        return $items;
    }

    /**
     * @param $dictionaryId
     *
     * @return string
     */
    public static function nameById(int $dictionaryId): string
    {
        $result = DictionaryMeta::find()
            ->where(['dictionaryId' => $dictionaryId])
            ->one();

        if ($result) {
            return $result->name;
        }

        return '';
    }

    /**
     * @param $dictionaryRoute
     *
     * @return array
     */
    public static function headersAndFields($dictionaryRoute)
    {
        $meta = self::find()
            ->where(['route' => $dictionaryRoute])
            ->one();
        $headers = [];
        $fields = [];

        foreach ($meta['columns'] as $index => $column) {
            if ($column['showInTable']) {
                $headers[] = [
                    'text'     => $column['description'],
                    'sortable' => $column['sortable'],
                    'value'    => $column['name'],
                ];
            }

            if ($column['canEdit']) {
                $fields[] = [
                    'name'  => $column['name'],
                    'type'  => $column['fieldType'],
                    'label' => $column['description'],
                ];
            }
        }

        return [
            'headers' => $headers,
            'fields'  => $fields
        ];
    }
}
