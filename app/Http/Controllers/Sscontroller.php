<?php

namespace App\Http\Controllers;
class Sscontroller{
  function call($method, $params=[], $requestID=[])
  {

      $data = array(
        'method' => $method,
        'params' => $params,
        'id' => session_id(),
    );
      $queryString = http_build_query(array('accountID' => env("SS_ACCOUNTID"), 'secretKey' => env("SS_SECRETKEY")));
      $url = "http://api.sharpspring.com/pubapi/v1/?$queryString";

      $data = json_encode($data);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
    ));

      $result = curl_exec($ch);
      curl_close($ch);

      return json_decode($result);
  }
}
