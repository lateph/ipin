<?php

/**
 * This is the model class for table "akun".
 *
 * The followings are the available columns in table 'akun':
 * @property integer $id
 * @property string $nama
 * @property string $email
 * @property integer $umur
 * @property string $password
 * @property string $telepon
 * @property string $tanggalDaftar
 */
class Akun extends CActiveRecord
{
        public $password2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'akun';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama, email, umur, password', 'required'),
			array('umur', 'numerical', 'integerOnly'=>true),
                        array('nama,email','unique'),
			array('nama', 'length', 'max'=>30),
			array('email', 'length', 'max'=>50),
			array('password', 'length', 'max'=>32),
			array('telepon', 'length', 'max'=>255),
			array('tanggalDaftar,password2', 'safe'),
                        array('email','email'),
                        array('password', 'compare','compareAttribute'=>'password2','on'=>'register'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nama, email, umur, password, telepon, tanggalDaftar', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'nama' => 'Nama',
			'email' => 'Email',
			'umur' => 'Umur',
			'password' => 'Password',
			'telepon' => 'Telepon',
			'tanggalDaftar' => 'Tanggal Daftar',
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
		$criteria->compare('nama',$this->nama,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('umur',$this->umur);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('telepon',$this->telepon,true);
		$criteria->compare('tanggalDaftar',$this->tanggalDaftar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Akun the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getToken(){
            return md5($this->nama.$this->password);
        }
}
