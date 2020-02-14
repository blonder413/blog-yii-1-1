<?php

// This is the database connection configuration.
return array(
//	'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	
	'connectionString' => 'mysql:host=localhost;dbname=blog_yii_1_1_22',
	'emulatePrepare' => true,
	'username' => 'pruebas',
	'password' => 'Pass@1234',
	'charset' => 'utf8',
	'schemaCachingDuration'=>3600,
);