<?php

namespace app\models\dictionary\columns;

use yii\base\Model;
use yii\behaviors\AttributeTypecastBehavior;

/**
 * Class ColumnsModel
 *
 * @package app\models\dictionary\columns
 *
 * @property string $name
 * @property string $type
 * @property string $fieldType
 * @property string $canEdit
 * @property string $showInTable
 * @property string $description
 * @property array $relation
 */
class ColumnsModel extends Model
{
    public $name;
    public $type;
    public $fieldType;
    public $canEdit;
    public $showInTable;
    public $description;
    public $relation;

    /**
     * {@inheritDoc}
     */
    public function behaviors()
    {
        return [
            'typecast' => [
                'class'                 => AttributeTypecastBehavior::class,
                'attributeTypes'        => [
                    'name'        => AttributeTypecastBehavior::TYPE_STRING,
                    'type'        => AttributeTypecastBehavior::TYPE_STRING,
                    'fieldType'   => AttributeTypecastBehavior::TYPE_STRING,
                    'canEdit'     => AttributeTypecastBehavior::TYPE_BOOLEAN,
                    'showInTable' => AttributeTypecastBehavior::TYPE_BOOLEAN,
                    'description' => AttributeTypecastBehavior::TYPE_STRING,
                    'relation'    => AttributeTypecastBehavior::TYPE_INTEGER,
                ],
                'typecastAfterValidate' => true,
                'typecastBeforeSave'    => true,
                'typecastAfterFind'     => true,
            ],
        ];
    }
}
