<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property string|null $image
 * @property string $date
 *
 * @property Likes[] $likes
 * @property Users $user
 * @property Users[] $users
 */
class Posts extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'posts';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['user_id', 'text'], 'required'],
			[['user_id'], 'integer'],
			[['date'], 'safe'],
			[['text', 'image'], 'string', 'max' => 255],
			// [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user_id' => 'User ID',
			'text' => 'Text',
			'image' => 'Image',
			'date' => 'Date',
		];
	}

	/**
	 * Gets query for [[Likes]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getLikes()
	{
		// return $this->hasMany(Likes::className(), ['post_id' => 'id']);
	}

	/**
	 * Gets query for [[User]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser()
	{
		// return $this->hasOne(Users::className(), ['id' => 'user_id']);
	}

	/**
	 * Gets query for [[Users]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getUsers()
	{
		// return $this->hasMany(Users::className(), ['id' => 'user_id'])->viaTable('likes', ['post_id' => 'id']);
	}
}
