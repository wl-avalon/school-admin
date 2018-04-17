<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/2/26
 * Time: 下午9:07
 */

namespace app\modules\controllers\inner;
use yii\web\Controller;

class QueryController extends Controller
{
    public function actions(){
        return [
            'getMyAllClass'             => 'app\modules\actions\inner\query\GetMyAllClassAction',
            'getStudentOfClass'         => 'app\modules\actions\inner\query\GetStudentOfClassAction',
            'getChildList'              => 'app\modules\actions\inner\query\GetChildListAction',
            'getStudentByStudentUuid'   => 'app\modules\actions\inner\query\GetStudentByStudentUuidAction',
            'getClassList'              => 'app\modules\actions\inner\query\GetClassListAction',
        ];
    }
}