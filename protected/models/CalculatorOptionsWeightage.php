<?php

/**
 * This is the model class for table "calculator_options_weightage".
 *
 * The followings are the available columns in table 'calculator_options_weightage':
 * @property integer $id
 * @property integer $calculator_options_id
 * @property integer $calculator_branches_id
 * @property integer $status
 * @property integer $weightage
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property CalculatorBranches $calculatorBranches
 * @property CalculatorOptions $calculatorOptions
 */
class CalculatorOptionsWeightage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculator_options_weightage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('calculator_options_id, calculator_branches_id', 'required'),
			array('calculator_options_id, calculator_branches_id, status, weightage', 'numerical', 'integerOnly'=>true),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, calculator_options_id, calculator_branches_id, status, weightage, created, modified', 'safe', 'on'=>'search'),
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
			'calculatorBranches' => array(self::BELONGS_TO, 'CalculatorBranches', 'calculator_branches_id'),
			'calculatorOptions' => array(self::BELONGS_TO, 'CalculatorOptions', 'calculator_options_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'calculator_options_id' => 'Calculator Options',
			'calculator_branches_id' => 'Calculator Branches',
			'status' => 'Status',
			'weightage' => 'Weightage',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('calculator_options_id',$this->calculator_options_id);
		$criteria->compare('calculator_branches_id',$this->calculator_branches_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('weightage',$this->weightage);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
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

	public static function sortWeights($x, $y) {
	    if ($x == $y) {
	        return 0;
	    }
	    return ($x > $y) ? -1 : 1;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CalculatorOptionsWeightage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
