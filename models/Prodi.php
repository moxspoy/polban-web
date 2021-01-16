<?php

namespace app\models;

/**
 * This is the model class for table "prodi".
 *
 * @property int $id
 * @property string $official_name
 * @property string|null $initial
 *
 * @property User $user
 * @property Faculty[] $ids
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prodi';
    }

    /**
     * {@inheritdoc}
     * @return ProdiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProdiQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['official_name'], 'string', 'max' => 255],
            [['initial'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'official_name' => 'Official Name',
            'initial' => 'Initial',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Ids]].
     *
     * @return \yii\db\ActiveQuery|FacultyQuery
     */
    public function getIds()
    {
        return $this->hasMany(Faculty::className(), ['id' => 'id'])->viaTable('user', ['id' => 'id']);
    }
}
