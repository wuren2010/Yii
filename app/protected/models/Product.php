<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $product_id
 * @property integer $category_id
 * @property string $product_name
 * @property string $product_introduce
 * @property string $product_picture
 * @property string $product_create_time
 * @property integer $user_id
 * @property string $product_keys
 * @property string $product_content
 */
class Product extends BasicModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Product the static model class
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
		return '{{product}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('product_id, category_id, user_id', 'numerical', 'integerOnly'=>true),
			array('product_name, product_introduce, product_picture, product_create_time, product_keys, product_content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('product_id, category_id, product_name, product_introduce, product_picture, product_create_time, user_id, product_keys, product_content', 'safe', 'on'=>'search'),
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
                    'picture'=>array(self::HAS_MANY, 'Picture', array('pic_foreign_id'=>'product_id'),'on'=>'pic_module = "product"'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'product_id' => 'Product',
			'category_id' => 'Category',
			'product_name' => 'Product Name',
			'product_introduce' => 'Product Introduce',
			'product_picture' => 'Product Picture',
			'product_create_time' => 'Product Create Time',
			'user_id' => 'User',
			'product_keys' => 'Product Keys',
			'product_content' => 'Product Content',
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

		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('product_introduce',$this->product_introduce,true);
		$criteria->compare('product_picture',$this->product_picture,true);
		$criteria->compare('product_create_time',$this->product_create_time,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('product_keys',$this->product_keys,true);
		$criteria->compare('product_content',$this->product_content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}