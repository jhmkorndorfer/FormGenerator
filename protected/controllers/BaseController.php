<?php

class BaseController extends CController {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCadastrarFormulario() {
        $model = new FormularioModel;

        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='formulario-model-CadastrarFormulario-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        if (isset($_POST['FormularioModel'])) {
            $model->attributes = $_POST['FormularioModel'];
            if ($model->validate()) {
                $model->save();
                return;
            }
        }
        $this->render('CadastrarFormulario', array('model' => $model));
    }

    public function actionSss() {
        $model = new ResultadosModel;

        // uncomment the following code to enable ajax-based validation
        /*
          if(isset($_POST['ajax']) && $_POST['ajax']==='resultados-model-sss-form')
          {
          echo CActiveForm::validate($model);
          Yii::app()->end();
          }
         */

        if (isset($_POST['ResultadosModel'])) {
            $model->attributes = $_POST['ResultadosModel'];
            if ($model->validate()) {
                $model->save();
                return;
            }
        }
        $this->render('sss', array('model' => $model));
    }

    public function actionVer() {

        $model = new MascaraModel;
//    $model->setAttribute('CodFormulario', 1);
        $model = $model->findAllByAttributes(array('CodFormulario' => 3));
//        echo($model[1]->getAttribute('CodTipoCampo'));
//    CVarDumper::dump($model,10,true);
//        $model = ResultadosModel::model()->findByAttributes(array('CodResultado'=>1));
        $this->render('ver',array('model'=>$model));
    }
    public function actionSalvaMasc() {
        if (isset($_POST['htmlMasc'])) {
            $htmlMasc = $_POST['htmlMasc'];
            $nomeMasc = $_POST['nomeM'];
            $codForm = $_POST['codForm'];
            $dataInicio = $_POST['dataInicio'];
            $dataFim = $_POST['dataFim'];
            foreach ($htmlMasc as $value) {
                $novaMascara = new MascaraModel();
                $novaMascara->setAttributes(array('CodFormulario'=>$codForm, 'NomeMascara'=>$nomeMasc, 'CodTipoCampo'=>1, 
                'InicioValidade'=>$dataInicio, 'FimValidade'=>$dataFim, 'htmlMascara'=>$value));
                $novaMascara->save();
            }
            echo 'salvo';
        }
    }
    public function actionCriaMascara() {

        $modelMascara = new MascaraModel;
        $modelCampo = new CampoModel;
        $campos = $modelCampo->findAll(array('condition'=>'CodTipoCampo > 1'));
        $modelFormulario = new FormularioModel;
        $formularios = $modelFormulario->findAll();
        
        $this->render('CriaMascara',array('campos'=>$campos, 'formularios'=>$formularios));
    }

}
//    $model->setAttribute('CodFormulario', 1);
//    $model = $model->findAllByAttributes(array('CodFormulario' => 1));
//    echo($model[1]->getAttribute('CodTipoCampo'));
//    CVarDumper::dump($model,10,true);