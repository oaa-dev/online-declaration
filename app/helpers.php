<?php
use App\ActivityLogs;

function actionLogs($module = "", $action = ""){
    $logs = new ActivityLogs;
    $logs->user_id = \Auth::user()->id;
    $logs->module = strtoupper($module);
    $logs->action = strtoupper($action);
    $logs->date = date("Y-m-d");
    $logs->time = date("H:i:s");
    $logs->save();
}

?>