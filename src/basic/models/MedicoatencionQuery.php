<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Medicoatencion]].
 *
 * @see Medicoatencion
 */
class MedicoatencionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Medicoatencion[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Medicoatencion|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
