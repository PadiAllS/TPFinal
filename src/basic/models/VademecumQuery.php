<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Vademecum]].
 *
 * @see Vademecum
 */
class VademecumQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Vademecum[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Vademecum|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
