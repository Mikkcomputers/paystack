<?php
if(isset($_GET['reference'])){
  $reference = $_GET['reference']; // Retrieving the transaction reference from the URL
  $curl = curl_init();
  curl_setopt_array($curl, array(
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER , false),
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10 ,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ------------------",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    echo $response;
    // $result = json_decode($response, true);
    // print_r($result['data'])."<br>";
  }
} else {
  echo "Transaction reference not provided.";
}
?>
