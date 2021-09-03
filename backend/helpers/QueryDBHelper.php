<?php


namespace backend\helpers;


use backend\models\Bts;
use common\models\User;
use common\models\TblPartner;
use yii\helpers\ArrayHelper;
use yii\helpers\VarDumper;

class QueryDBHelper
{
    public static function queryUnit($id)
    {
        $branchid = User::findIdentity($id)->branch_id;
        if ($branchid) {
            $data = Bts::findBtsByBranch($branchid );
           return $data;
        }
        return [];

    }
    public static function queryPartner($id)
    {
        $branchid = User::findIdentity($id)->branch_id;
        if ($branchid) {
            $data = TblPartner::findPartnerByBranch($branchid);
            return $data;
        }
        return [];

    }
    public static  function queryUserType($id) {
       $userType = User::findIdentity($id)->user_type;
        return $userType;
    }


}