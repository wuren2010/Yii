<?php

/**
 * This is the model class for table "{{picture}}".
 *
 * The followings are the available columns in table '{{picture}}':
 * @property integer $pic_id
 * @property string $pic_alt
 * @property string $pic_path
 * @property string $pic_module
 * @property string $pic_foreign_id
 * @property string $pic_create_time
 */
class Picture extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Picture the static model class
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
		return '{{picture}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pic_alt, pic_path, pic_module, pic_foreign_id, pic_create_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pic_id, pic_alt, pic_path, pic_module, pic_foreign_id, pic_create_time', 'safe', 'on'=>'search'),
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
			'pic_id' => 'Pic',
			'pic_alt' => 'Pic Alt',
			'pic_path' => 'Pic Path',
			'pic_module' => 'Pic Module',
			'pic_foreign_id' => 'Pic Foreign',
			'pic_create_time' => 'Pic Create Time',
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

		$criteria->compare('pic_id',$this->pic_id);
		$criteria->compare('pic_alt',$this->pic_alt,true);
		$criteria->compare('pic_path',$this->pic_path,true);
		$criteria->compare('pic_module',$this->pic_module,true);
		$criteria->compare('pic_foreign_id',$this->pic_foreign_id,true);
		$criteria->compare('pic_create_time',$this->pic_create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}