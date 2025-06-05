<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// SHAKES

Header('Location: thanks.php?fbp=' . $_POST['fbp']);


$apiKey = '15131bd537c9b3eb555cfd3856cba986';  //API Key Anton

$url = "http://shakes.pro?r=/api/order/in&key=" . $apiKey;

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if (filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    } else {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

$order = [
    'name' => (!empty($_POST['name']) ? $_POST['name'] : null),
    'tel' => (!empty($_POST['tel']) ? $_POST['tel'] : null),
    'offerId' => '12441', // можно смотреть в ссылке оффера (4 цифры)
    'countryCode' => 'GT',  // код гео по ИСО
    'ip' => $user_ip,
    'createdAt' => date('Y-m-d H:i:s'),
    'landingUrl' => 'http://coi.teccardinsale.com/', // взять любой из оффера в идеале фрейм
    'streamCode' => 'gf2v',  // код потока  НЕ ОБЯЗАТЕЛЕН
    'userAgent' => (!empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '-'),
    'sub1' => (!empty($_POST['subid']) ? $_POST['subid'] : null),
    'sub2' => (!empty($_POST['buy']) ? $_POST['buy'] : null),
    'sub3' => 'bd-optimax-1',
    // 'sub4' => 'sub4Value',
    // 'sub5' => 'sub5Value',
];

$fp = fopen(__DIR__ . '/lead.csv', 'a+');
fputcsv($fp, [date('Y.m.d H:i:s'), $order['sub2'], $order['sub1'], $order['name'], $order['tel'], $order['countryCode'], $order['ip']], ',');
fclose($fp);


$headers = [
    "Keep-Alive" => '15',
    "Connection" => "keep-alive",

];
/**
 * @see http://php.net/manual/ru/book.curl.php
 */
$curl = curl_init();
/**
 * @see http://php.net/manual/ru/function.curl-setopt.php
 */
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $order);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
/**
 * @see http://php.net/manual/ru/language.exceptions.php
 */
try {
    $responseBody = curl_exec($curl);
    // тело оказалось пустым
    if (empty($responseBody)) {
        throw new Exception(date('Y.m.d H:i:s') . 'Error: Empty response for order. ' .
            var_export($order, true));
    }
    /**
     * @var StdClass $response
     */
    $response = json_decode($responseBody);
    print_r($response);

    // возможно пришел некорректный формат
    if (empty($response)) {
        throw new Exception('Error: Broken json format for order. ' . PHP_EOL .
            var_export($order, true));
    }
    // заказ не принят API
    if ($response->status != 'ok') {
        throw new Exception('Invalid: Order processing error. ' .
            PHP_EOL . var_export($order, true));
    }
    /**
     * логируем данные об обработке заказа         * @see http://php.net/manual/ru/function.file-put-contents.php
     */
    file_put_contents(
        __DIR__ . '/order.success.log',
        date('Y.m.d H:i:s') . ' ' . $responseBody,
        FILE_APPEND
    );
    curl_close($curl);
} catch (Exception $e) {
    /**
     * логируем ошибку        * @see http://php.net/manual/ru/function.file-put-contents.php
     */
    file_put_contents(
        __DIR__ . '/order.error.log',
        date('Y.m.d H:i:s') . ' ' . $e->getMessage() . PHP_EOL . $e->getTraceAsString(),
        FILE_APPEND
    );
}
