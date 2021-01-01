<?php
/*
PHP CLASS BY PHAIWAN STUDIO
FACEBOOK : https://www.facebook.com/phaiwan.nakrub/
FAN PAGE : https://www.facebook.com/PhaiwanStudio/

DONATE
  True Wallet : 0910504092
  BANK : 0638058804 - Kasikorn
  PayPal : insensak.007@gmail.com
*/
class phaiwan_tmn_gif {

  public function verify($url) {
    $hash = $this->hashcode($url);
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://gift.truemoney.com/campaign/vouchers/'.$hash.'/verify');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $result = curl_exec($ch);
    return $result;
    curl_close($ch);
  }
  public function redeem($hash,$phone){
    $hash = $this->hashcode($hash);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://gift.truemoney.com/campaign/vouchers/'.$hash.'/redeem');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"mobile":"'.$phone.'","voucher_hash":"'.$hash.'"}');

    $headers = array();
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;

  }
  public function hashcode($code){
    return explode("?v=",$code)["1"];    
  }
  public function line($msg){
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://notify-api.line.me/api/notify",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "message=".$msg,
      CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer fsVGElInn1irCHQgxjvkjCH5rWXzguqs5tNIWGHRLRb",
      "Cache-Control: no-cache",
      "Content-Type: application/x-www-form-urlencoded"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    return $response;
  }
}

?>
