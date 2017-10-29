<?php
namespace API\output;

function json_error($error) {
    exit(json_encode(array('error' => $error)));
}
function json_success($msg, $return_data = array()) {
    $success_msg = array('success' => $msg);
    $return_obj = array_merge($success_msg, array('data' => $return_data));
    exit(json_encode($return_obj));
}
?>