<?php

/**
 * This is the model class for table "calculator_category".
 *
 * The followings are the available columns in table 'calculator_category':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $created
 * @property string $modified
 * @property integer $is_deleted
 * @property integer $is_cal_lpu
 *
 * The followings are the available model relations:
 * @property CalculatorQuestion[] $calculatorQuestions
 */
class CalculatorCategory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculator_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, description', 'required'),
			array('is_deleted, is_cal_lpu', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, created, modified, is_deleted, is_cal_lpu', 'safe', 'on'=>'search'),
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
			'calculatorQuestions' => array(self::HAS_MANY, 'CalculatorQuestion', 'category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'created' => 'Created',
			'modified' => 'Modified',
			'is_deleted' => 'Is Deleted',
			'is_cal_lpu' => 'Is Cal Lpu',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('is_cal_lpu',$this->is_cal_lpu);
		$criteria->order='id desc';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'pagination'=>array(
                        'pageSize'=>50,
                ),
			'sort'=>array(
			        'attributes'=>array( 
			        	'id'=>array(
			                'asc'=>'id',
			                'desc'=>'id DESC',
			            )
			        )
			    )
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CalculatorCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
