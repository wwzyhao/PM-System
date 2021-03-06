<?php

class CodeInfoController extends Controller {

    public function init() {
        parent::init();
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/CodeHome.js');


        Yii::app()->clientScript->registerCoreScript('jquery');
    }

    public function actionIndex($projectid) {
        // CodeMainController::
       
        $id = Yii::app()->user->getState('id');
        $projectid = $_GET['projectid'];
//           $this->redirect($this->createUrl('View'));

        $categoryInfo = CategoryInfo::model()->findAllByAttributes(array(
            'Flag' => 'c'
                ));

//        $criteria = new CDbCriteria;
//        $criteria->condition = 'ProjectID=:projectid,Flag=:flag';
//        $criteria->params = array(':projectid' => $projectid,':flag' => 'a');
        //find the comment table where the flag=c and eager find the relation user

        $project = Project::model()->with('projectCodes', 'user')->findByPk($projectid);
        $categoryID = AppCodeCategory::model()->with('category')->findAllByAttributes(array(
            'ProjectID' => $projectid
                ));
         if(empty ($project)){
            $this->redirect(array('codemain/index'));
        }
        foreach ($categoryID as $value) {
            if ($value->category[Flag] == 'c') {
                $category = $value->category;
            }
        }
        //$category = CategoryInfo::model()->findByPk($category->CategoryID);
        //$categoryID[] = $category->category[SecondLevel];

        $comment = ProjectComment::model()->with('user')->findAllByAttributes(array(
            'ProjectID' => $projectid, 'Flag' => 'c'
                ));

        $count = ProjectComment::model()->count("ProjectID=:projectid AND Flag=:f", array(
            ':projectid' => $projectid, ':f' => 'c'));

        $refered = ProjectReference::model()->findAllByAttributes(array(
            'WhoRefer' => $projectid
                ));
        foreach ($refered as $value) {
            $reference[$value->BeRefered] = Project::model()->findByPk($value->BeRefered);
        }

        $tagID = AppCodeTag::model()->with('tag')->findAllByAttributes(array(
            'ProjectID' => $projectid
                ));
        foreach ($tagID as $value) {
            if ($value->tag[Flag] == 'c') {
                $tag[] = $value->tag;
            }
        }
//
//        if (empty($name)) {
//            $name = $username;
//        }

        $this->render('index', array(
            'categoryInfo' => $categoryInfo, 'tag' => $tag,
            'comment' => $comment, 'project' => $project, 'category' => $category,
            'count' => $count, 'reference' => $reference, 'userid' => $id, 'projectid' => $projectid
        ));
    }

    public function actionComment() {

        $model = new ProjectComment;
//     if (isset ($_POST['ProjectComment'])) {
//         $model->attributes =  $_POST['ProjectComment'];
        $model->Content = $_POST['comment-content'];
        $model->UserID = $_POST['userid'];
        $model->ProjectID = $_POST['projectid'];
        $model->Flag = $_POST['flag'];
        switch ($_POST['flag']) {
            case 'c':
                if ($model->save()) {
                    $this->redirect(array('codeinfo/index', 'projectid' => $_POST['projectid']));
                } else {
                    $this->redirect(array('codemain/index'));
                }

                break;
            case 'a':
                if ($model->save()) {
                    $this->redirect(array('appinfo/index', 'projectid' => $_POST['projectid']));
                } else {
                    $this->redirect(array('appmain/index'));
                }
                break;
            default:
                break;
        }

//     }
    }

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' acti
                //'users'=>array('@'),
                expression => (Yii::app()->user->getState('authority') == 1 ? null : 'false'),
            ),
            array('deny', // allow all users to perform 'index' and 'view' acti
                'users' => array('*'),
//                        'verbs'=>array('GET', 'POST')
            ),
        );
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}