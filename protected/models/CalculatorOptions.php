<?php

/**
 * This is the model class for table "calculator_options".
 *
 * The followings are the available columns in table 'calculator_options':
 * @property integer $id
 * @property integer $question_id
 * @property string $options
 * @property string $hour
 * @property string $price
 * @property string $created
 * @property string $modified
 * @property string $icon
 * @property integer $is_deleted
 *
 * The followings are the available model relations:
 * @property CalculatorQuestion $question
 * @property CalculatorOptionsWeightage[] $calculatorOptionsWeightages
 * @property CalculatorResult[] $calculatorResults
 */
class CalculatorOptions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculator_options';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id, options, icon', 'required'),
			array('question_id, is_deleted', 'numerical', 'integerOnly'=>true),
			array('hour, price', 'length', 'max'=>100),
			array('icon', 'length', 'max'=>50),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, question_id, options, hour, price, created, modified, icon, is_deleted', 'safe', 'on'=>'search'),
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
			'question' => array(self::BELONGS_TO, 'CalculatorQuestion', 'question_id'),
			'calculatorOptionsWeightages' => array(self::HAS_MANY, 'CalculatorOptionsWeightage', 'calculator_options_id'),
			'calculatorResults' => array(self::HAS_MANY, 'CalculatorResult', 'option_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question_id' => 'Question',
			'options' => 'Options',
			'hour' => 'Hour',
			'price' => 'Price',
			'created' => 'Created',
			'modified' => 'Modified',
			'icon' => 'Icon',
			'is_deleted' => 'Is Deleted',
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
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('options',$this->options,true);
		$criteria->compare('hour',$this->hour,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('icon',$this->icon,true);
		$criteria->compare('is_deleted',$this->is_deleted);
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
	 * @return CalculatorOptions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
