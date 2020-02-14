<?php

/**
 * This is the model class for table "comentario".
 *
 * The followings are the available columns in table 'comentario':
 * @property integer $id
 * @property string $nombre
 * @property string $correo
 * @property string $web
 * @property string $rel
 * @property string $comentario
 * @property string $fecha
 * @property integer $articulo_id
 * @property integer $estado
 * @property string $ip_cliente
 * @property string $puerto_cliente
 *
 * The followings are the available model relations:
 * @property Articulo $articulo
 */
class Comentario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comentario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, correo, comentario, fecha, articulo_id', 'required'),
			array('articulo_id, estado', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>150),
			array('correo, web', 'length', 'max'=>100),
			array('rel', 'length', 'max'=>20),
			array('ip_cliente', 'length', 'max'=>15),
			array('puerto_cliente', 'length', 'max'=>5),
			array('web', 'url'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, correo, web, rel, comentario, fecha, articulo_id, estado, ip_cliente, puerto_cliente', 'safe', 'on'=>'search'),
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
			'articulo' => array(self::BELONGS_TO, 'Articulo', 'articulo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'correo' => 'Correo',
			'web' => 'Web',
			'rel' => 'Rel',
			'comentario' => 'Comentario',
			'fecha' => 'Fecha',
			'articulo_id' => 'Articulo',
			'estado' => 'Estado',
			'ip_cliente' => 'Ip Cliente',
			'puerto_cliente' => 'Puerto Cliente',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('rel',$this->rel,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('articulo_id',$this->articulo_id);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('ip_cliente',$this->ip_cliente,true);
		$criteria->compare('puerto_cliente',$this->puerto_cliente,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comentario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
