<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $news_id
 * @property string $category_id
 * @property string $news_title
 * @property string $news_intro
 * @property string $news_content
 * @property integer $user_id
 * @property string $news_create_time
 * @property string $news_view
 * @property string $news_comment
 * @property string $news_picpath
 * @property string $news_description
 * @property string $news_keywords
 */
class News extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('category_id', 'length', 'max'=>50),
			array('news_title, news_intro, news_content, news_create_time, news_view, news_comment, news_picpath, news_description, news_keywords', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('news_id, category_id, news_title, news_intro, news_content, user_id, news_create_time, news_view, news_comment, news_picpath, news_description, news_keywords', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'news_id' => 'News',
			'category_id' => 'Category',
			'news_title' => 'News Title',
			'news_intro' => 'News Intro',
			'news_content' => 'News Content',
			'user_id' => 'User',
			'news_create_time' => 'News Create Time',
			'news_view' => 'News View',
			'news_comment' => 'News Comment',
			'news_picpath' => 'News Picpath',
			'news_description' => 'News Description',
			'news_keywords' => 'News Keywords',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('news_id',$this->news_id);
		$criteria->compare('category_id',$this->category_id,true);
		$criteria->compare('news_title',$this->news_title,true);
		$criteria->compare('news_intro',$this->news_intro,true);
		$criteria->compare('news_content',$this->news_content,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('news_create_time',$this->news_create_time,true);
		$criteria->compare('news_view',$this->news_view,true);
		$criteria->compare('news_comment',$this->news_comment,true);
		$criteria->compare('news_picpath',$this->news_picpath,true);
		$criteria->compare('news_description',$this->news_description,true);
		$criteria->compare('news_keywords',$this->news_keywords,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}