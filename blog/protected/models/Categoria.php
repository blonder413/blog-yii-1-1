<?php

/**
 * This is the model class for table "categoria".
 *
 * The followings are the available columns in table 'categoria':
 * @property integer $id
 * @property string $categoria
 * @property string $slug
 * @property string $imagen
 * @property string $descripcion
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property Articulo[] $articulos
 * @property User $createdBy
 * @property User $updatedBy
 */
class Categoria extends CActiveRecord
{
	public $archivo;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoria, descripcion, archivo', 'required'),
//			array('archivo', 'required', 'on' => array('create')),
//			array('archivo', 'required', 'except' => 'update'), // string with scenario names separated with commas (spaces are ignored)
			array('created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('categoria, slug', 'length', 'max'=>100),
			array('imagen', 'length', 'max'=>50),
			array('descripcion', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, categoria, slug, imagen, descripcion, created_by, created_at, updated_by, updated_at', 'safe', 'on'=>'search'),
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
			'articulos' => array(self::HAS_MANY, 'Articulo', 'categoria_id',
				'order'=>'articulos.created_at DESC'	// categoria->artículos traerá los artículos ordenados por fecha de creación
			),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'categoria' => 'Categoria',
			'slug' => 'Slug',
			'imagen' => 'Imagen',
			'descripcion' => 'Descripcion',
			'created_by' => 'Created By',
			'created_at' => 'Created At',
			'updated_by' => 'Updated By',
			'updated_at' => 'Updated At',
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
		$criteria->compare('categoria',$this->categoria,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_at',$this->updated_at,true);

		$criteria->order = 't.created_at DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categoria the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
