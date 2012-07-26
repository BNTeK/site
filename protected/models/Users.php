<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $name
 * @property integer $corp_id
 * @property string $race
 * @property string $dob
 * @property string $sp
 */
class Users extends CActiveRecord
{
    public $eve_id, $eve_key;

    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
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
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('eve_id', 'numerical', 'integerOnly'=>true, 'message' => 'Поле "eve_id" может содержать только целые числа'),
                        array('eve_id', 'length', 'is'=>6, 'message' => 'Поле "eve_id" должно иметь длинну в 6 символов'), 
                        array('eve_id', 'required', 'message' => 'Поле "eve_id" незаполнено'),
			array('eve_key','match','pattern' => '[^a-z0-9]', 'message' => 'Поле "eve_key" может содержать только числа от 0 до 9 и буквы от A до Z'),
			
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
			'eve_id' => 'EVE ID',
			'eve_key' => 'EVE_KEY',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('corp_id',$this->corp_id);
		$criteria->compare('race',$this->race,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('sp',$this->sp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        protected function getDataFromApi($eve_id,$eve_key){
            $api = new Eveapi();
            $charID = $api->apikeyinfo($eve_id, $eve_key);
            if(!$charID)
            {
                $charID = $charID->characterID;
                if(!$charSheet = $api->character_sheet($eve_id, $eve_key, $charID))
                {
                    $user=Users::model()->find('where',array('id' => $charSheet->CharacterID));
                    if($user===NULL)
                    {
                        $model = new Users;
                        $model->id = $charSheet->ChatacterID;
                        
                        
                    }
                }
                
            }
        }
}