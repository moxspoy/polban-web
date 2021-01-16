<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Prodi]].
 *
 * @see Prodi
 */
class ProdiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Prodi[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Prodi|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
