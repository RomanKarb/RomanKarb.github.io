<?php
require_once('vendor/autoload.php');
use VK\Client\VKApiClient;

$vk = new VKApiClient();

$access_token = 'токен_для_доступа_к_API_VK';
$group_id = 'идентификатор_группы'; 

$longpoll = $vk->groups()->getLongPollServer($access_token, array(
    'group_id' => $group_id,
));

while (true) {
    $response = file_get_contents($longpoll['server']."?act=a_check&key=".$longpoll['key']."&ts=".$longpoll['ts']."&wait=25");
    $decoded_response = json_decode($response, true);

    if (isset($decoded_response['updates']) && count($decoded_response['updates']) > 0) {
        foreach ($decoded_response['updates'] as $update) {
            if ($update['type'] == 'message_new' && $update['object']['text'] == 'привет') {
                $user_id = $update['object']['from_id'];
                $message = 'Привет!';

                $vk->messages()->send($access_token, array(
                    'user_id' => $user_id,
                    'message' => $message,
                ));
            }
        }
        $longpoll = $decoded_response['ts'];
    }
}
?>