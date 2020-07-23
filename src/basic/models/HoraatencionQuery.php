<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Horaatencion]].
 *
 * @see Horaatencion
 */
class HoraatencionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Horaatencion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Horaatencion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
