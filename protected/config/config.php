<?php
return CMap::mergeArray(
		array('import' => array(
				'application.models.*',
				'application.components.*',
                                'application.components.validators.*',
			),
			'components' => array(
				'urlManager' => array(
					'urlFormat' => 'path',
					'showScriptName' => true,
					'rules' => array(
						'<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
					),
				),
            'db'=>array(
				/**
				* Para mudar o Banco, alterar o DATABASE
				*/
                'connectionString'=>'mysql:host=localhost;dbname=tcc',
                'username'=>'root',
                'password'=>'',

            ),
				
				'errorHandler' => array(
					'errorAction' => 'base/Error',
				),
			),
			'defaultController' => 'base',
			'charset' => 'ISO-8859-1',
			'sourceLanguage' => 'pt_br',
			'language' => 'pt_br',
			'name' => 'Gerador De Formulários',
		),
		YII_DEBUG ? 
			array ('components' => array(
				'log' => array(
					'class' => 'CLogRouter',
					'routes' => array(
					),
				),
				 'urlManager' => array(
						 'urlFormat' => 'path',
						 'rules' => array(
							 'gii' => 'gii',
							 'gii/<controller:\w+>' => 'gii/<controller>',
							 'gii/<controller:\w+>/<action:\w+>' => 'gii/<controller>/<action>',
						 ),
				  ),   				
			),
                         'modules'=>array(
                         'gii'=>array(
                                 'class'=>'system.gii.GiiModule',
                                 'password'=>'gii',
//                                 'ipFilters' => array('143.54.235.184'),//143.54.235.190
                                 'generatorPaths'=>array(
                                     'ext.gtc',   // Gii Template Collection
                                 ),
                             ),
                         ),  			
			) : 
			array ('components' => array(
					'log' => array(
						'class' => 'CLogRouter',
						'routes' => array(
						),
					),
				)
			)
		);