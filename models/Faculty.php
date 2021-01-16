<?php

namespace app\models;

/**
 * This is the model class for table "faculty".
 *
 * @property int $id
 * @property string $official_name
 * @property string|null $initial
 *
 * @property User $user
 * @property Prodi[] $ids
 */
class Faculty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faculty';
    }

    /**
     * {@inheritdoc}
     * @return FacultyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FacultyQuery(get_called_class());
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
     * @return \yii\db\ActiveQuery|ProdiQuery
     */
    public function getIds()
    {
        return $this->hasMany(Prodi::className(), ['id' => 'id'])->viaTable('user', ['id' => 'id']);
    }
}
