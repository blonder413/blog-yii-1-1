<?php

/**
 * This is the model class for table "articulo".
 *
 * The followings are the available columns in table 'articulo':
 * @property integer $id
 * @property integer $numero
 * @property string $titulo
 * @property string $slug
 * @property string $tema
 * @property string $detalle
 * @property string $resumen
 * @property string $video
 * @property string $descarga
 * @property integer $categoria_id
 * @property string $etiquetas
 * @property integer $estado
 * @property integer $vistas
 * @property integer $descargas
 * @property integer $curso_id
 * @property integer $created_by
 * @property string $created_at
 * @property integer $updated_by
 * @property string $updated_at
 *
 * The followings are the available model relations:
 * @property Categoria $categoria
 * @property Curso $curso
 * @property User $createdBy
 * @property User $updatedBy
 * @property Comentario[] $comentarios
 */
class Articulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'articulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, slug, detalle, resumen, categoria_id, etiquetas, estado, created_by, created_at, updated_by, updated_at', 'required'),
			array('numero, categoria_id, estado, vistas, descargas, curso_id, created_by, updated_by', 'numerical', 'integerOnly'=>true),
			array('titulo, slug', 'length', 'max'=>150),
			array('tema, descarga', 'length', 'max'=>100),
			array('resumen', 'length', 'max'=>300),
			array('video, etiquetas', 'length', 'max'=>255),
			array('estado', 'boolean'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, titulo, slug, tema, detalle, resumen, video, descarga, categoria_id, etiquetas, estado, vistas, descargas, curso_id, created_by, created_at, updated_by, updated_at', 'safe', 'on'=>'search'),
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
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_id'),
			'curso' => array(self::BELONGS_TO, 'Curso', 'curso_id'),
			'createdBy' => array(self::BELONGS_TO, 'User', 'created_by'),
			'updatedBy' => array(self::BELONGS_TO, 'User', 'updated_by'),
			'comentarios' => array(self::HAS_MANY, 'Comentario', 'articulo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'numero' => 'Numero',
			'titulo' => 'Titulo',
			'slug' => 'Slug',
			'tema' => 'Tema',
			'detalle' => 'Detalle',
			'resumen' => 'Resumen',
			'video' => 'Video',
			'descarga' => 'Descarga',
			'categoria_id' => 'Categoria',
			'etiquetas' => 'Etiquetas',
			'estado' => 'Estado',
			'vistas' => 'Vistas',
			'descargas' => 'Descargas',
			'curso_id' => 'Curso',
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

		$criteria->with = array('categoria','createdBy');
		$criteria->together = true; // ADDED THIS

		$criteria->compare('id',$this->id);
		$criteria->compare('numero',$this->numero);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('tema',$this->tema,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('descarga',$this->descarga,true);
		$criteria->compare('categoria_id',$this->categoria_id);
		$criteria->compare('etiquetas',$this->etiquetas,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('vistas',$this->vistas);
		$criteria->compare('descargas',$this->descargas);
		$criteria->compare('curso_id',$this->curso_id);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_by',$this->updated_by);
		$criteria->compare('updated_at',$this->updated_at,true);

//		$criteria->condition='estado = 1';

		$criteria->order = 't.created_at DESC';

//		$criteria->limit = 5;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Articulo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
