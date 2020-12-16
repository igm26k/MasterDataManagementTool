<?php

namespace app\models\dictionary;

use yii\mongodb\ActiveQuery;

/**
 * This is the ActiveQuery class for [[DictionaryMeta]].
 *
 * @see DictionaryMeta
 */
class DictionaryMetaQuery extends ActiveQuery
{
    /**
     * {@inheritdoc}
     *
     * @return DictionaryMeta[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     *
     * @return DictionaryMeta|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @param string $route
     *
     * @return DictionaryMetaQuery
     */
    public function byRoute(string $route)
    {
        return $this->andWhere(['route' => $route]);
    }
}
