<?php

namespace app\models;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $student_id
 * @property string $username
 * @property string $password
 * @property string $password_salt
 * @property string $fullname
 * @property string $email
 * @property int $role
 * @property string|null $address
 * @property string $phone_number
 * @property int|null $generation
 * @property string|null $date_of_birth
 * @property int $gender
 * @property string|null $photo_url
 * @property int $faculty_id
 * @property int $prodi_id
 * @property int $status
 * @property string $last_updated
 * @property string $created_at
 *
 * @property Faculty $id0
 * @property Prodi $id1
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id', 'gender', 'faculty_id', 'prodi_id'], 'required'],
            [['student_id', 'role', 'generation', 'gender', 'faculty_id', 'prodi_id', 'status'], 'integer'],
            [['address', 'photo_url'], 'string'],
            [['date_of_birth', 'last_updated', 'created_at'], 'safe'],
            [['username'], 'string', 'max' => 100],
            [['password', 'password_salt'], 'string', 'max' => 1000],
            [['fullname', 'email'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 15],
            [['username', 'email', 'photo_url', 'password', 'password_salt', 'phone_number'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Faculty::className(), 'targetAttribute' => ['id' => 'id']],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'username' => 'Username',
            'password' => 'Password',
            'password_salt' => 'Password Salt',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'role' => 'Role',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'generation' => 'Generation',
            'date_of_birth' => 'Date Of Birth',
            'gender' => 'Gender',
            'photo_url' => 'Photo Url',
            'faculty_id' => 'Faculty ID',
            'prodi_id' => 'Prodi ID',
            'status' => 'Status',
            'last_updated' => 'Last Updated',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery|FacultyQuery
     */
    public function getId0()
    {
        return $this->hasOne(Faculty::className(), ['id' => 'id']);
    }

    /**
     * Gets query for [[Id1]].
     *
     * @return \yii\db\ActiveQuery|ProdiQuery
     */
    public function getId1()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
