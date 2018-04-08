<?php
/**
 * Created by PhpStorm.
 * User: wzj-dev
 * Date: 18/3/12
 * Time: 下午12:04
 */

namespace app\modules\controllers\outer;
use yii\web\Controller;

class CommitController extends Controller
{
    public function actions(){
        return [
            "addSchool"                     => 'app\modules\actions\outer\commit\AddSchoolAction',
            "addClass"                      => 'app\modules\actions\outer\commit\AddClassAction',
            "addStudents"                   => 'app\modules\actions\outer\commit\AddStudentsAction',
            "createParentCode"              => 'app\modules\actions\outer\commit\CreateParentCodeAction',
            "createBindTeacherClassQRCode"  => 'app\modules\actions\outer\commit\CreateBindTeacherClassQRCodeAction',
            "bindChildToParent"             => 'app\modules\actions\outer\commit\BindChildToParentAction',
            "bindTeacherToClass"            => 'app\modules\actions\outer\commit\BindTeacherToClassAction',
            "createRegisterQRCode"          => 'app\modules\actions\outer\commit\CreateRegisterQRCodeAction',
        ];
    }
}