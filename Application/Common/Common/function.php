<?php
/**
 * ajax��������
 * @param mixed $data Ҫ���ص�����
 * @param string $msg ���ص���Ϣ
 * @param int $status ���صĴ�����
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