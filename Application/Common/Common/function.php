<?php
/**
 * ajax方法返回
 * @param mixed $data 要返回的数据
 * @param string $msg 返回的消息
 * @param int $status 返回的错误码
 */
function ajaxReturn($data, $msg, $status){
    $r              = array(
        'data'      => $data,
        'msg'       => $msg,
        'status'    => $status
    );
    header('Content-Type:application/json; charset=utf-8');
    exit(json_encode($r));
}