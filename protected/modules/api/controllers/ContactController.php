<?php
class ContactController extends Controller
{
    /** @var CActiveRecord|null */

       //You cannnot call $class::model()->find  with older versions of PHP
    //so I have commented out the lines that call this and  hardcoded the model class Contact.
    protected $modelClass = 'Contact';

    const JSON_RESPONSE_ROOT_SINGLE='contact';
   const JSON_RESPONSE_ROOT_PLURAL='contacts';

 /*   public function filters()
    {
        	return array('accessControl'); // perform access control for CRUD operations
    }*/

    /*	public function accessRules()
     {
         return array(
             array('allow', 'users' => array('@')),
             array('deny')
         );
     }*/

    public function init()
    {
        parent::init();
        if ($this->modelClass === NULL) {
            throw new CHttpException(500, 'Model class is not declared in ' . get_called_class());
        }
    }

    public function  actionRead($id)
    {
        $class = $this->modelClass;
      // $model = $class::model()->findByPk($id);
        $model = Contact::model()->findByPk($id);
        $response = array(self::JSON_RESPONSE_ROOT_SINGLE=> $model);
        $this->sendResponse(200, CJSON::encode($response));
    }

    public function actionList()
    {
        $qs = Yii::app()->request->queryString;
        $attributes_query = array();

        //the following allows parsing of query strings for specific attribute values
        if ($qs) {
            $props = Contact::model()->safeAttributeNames;
            $queries_array = explode("&", $qs);
            foreach ($queries_array as $query) {
                $query_array = explode("=", $query);
                $prop = $query_array[0];
                $value = $query_array[1];
                $prop_is_property = in_array($prop, $props);
                if ($prop_is_property) $attributes_query[$prop] = $value;
            }
            $class = $this->modelClass;
          //  $models = $class::model()->findAllByAttributes($attributes_query);
            $models =   Contact::model()->findAllByAttributes($attributes_query);
            $response = array(self::JSON_RESPONSE_ROOT_PLURAL => $models);
            $this->sendResponse(200, CJSON::encode($response));
        }

        $class = $this->modelClass;
       // $models = $class::model()->findAll();
        $models = Contact::model()->findAll();
        $response = array(self::JSON_RESPONSE_ROOT_PLURAL=> $models);
        $this->sendResponse(200, CJSON::encode($response));
    }

    public function actionCreate()
    {
        $class = $this->modelClass;
        $data = $this->getInputAsJson();

       // $model = new $class();
        $model = new Contact();
        $model->setAttributes($data[self::JSON_RESPONSE_ROOT_SINGLE], false);
        $response = array(self::JSON_RESPONSE_ROOT_SINGLE => $model);

        if (!$model->save()) {
            $this->sendResponse(401);
        }

        $this->sendResponse(200, CJSON::encode($response));
    }

    public function actionUpdate($id)
    {
        $class = $this->modelClass;
        $data = $this->getInputAsJson();
      //  $model = $class::model()->findByPk($id);
        $model = Contact::model()->findByPk($id);
        if (!$model)
            $this->sendResponse(404);
        $model->setAttributes($data[self::JSON_RESPONSE_ROOT_SINGLE], false);

        if (!$model->save()) {
            $this->sendResponse(401);
        }
        $this->sendResponse(200);
    }

    public function actionDelete($id)
    {
        $class = $this->modelClass;
       // $model = $class::model()->findByPk($id);
        $model = Contact::model()->findByPk($id);
        if (!$model)
            $this->sendResponse(404);
        if (!$model->delete()) {
            $this->sendResponse(401);
        }
        $this->sendResponse(200);
    }
}