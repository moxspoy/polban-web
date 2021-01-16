<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Faculty]].
 *
 * @see Faculty
 */
class FacultyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Faculty[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Faculty|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
