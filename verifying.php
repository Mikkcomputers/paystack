
<?php
if(isset($_GET['ref'])){
  $reference = $_GET['ref']; // Retrieving the transaction reference from the URL
  $curl = curl_init();
  curl_setopt_array($curl, array(
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER , false),
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/ $reference",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_10a3311c9241cd23901670d08f9142ef70636210",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($response === false) {
    echo "cURL Error #:" . $err;
  } else {
    $result = json_decode($response, true);
    // print_r($result);
    if ($result['status'] === true) {
      // var_dump($data = $result['data']);

      // $amount = $data['amount'] /100;
      // $status = $data['status'];
      // $email = $data['customer']['email'];
      // $date = $data['transaction_date'];
      // $fullname = $data['metadata']['custom_fields'][0]['fullname'];
      // $fullname = $data['metadata']['custom_fields'][0]['username'];
      // $fullname = $data['metadata']['custom_fields'][0]['phone'];


    }
  }
} else {
  echo "Transaction reference not provided.";
}
?>
