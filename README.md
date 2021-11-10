# TrueWallet Gift PHP CLASS
# ใช้ไม่เป็นก็ไปตาย
## Installation

```php
include "library/tmn_gif.class.php";
$tw = new phaiwan_tmn_gif();
```

## Example
```php
$redeem = json_decode($tw->redeem($_GET['link'], $_GET['phone']),true);
if ($xxx['status']['code'] == "SUCCESS") {
    $amount = number_format($xxx['data']['voucher']['amount_baht'], 0, '.', '');
    echo $amount." บาท";
    //code here 
} else {
    //error here
}
```

## Contact
#### [Facebook : PN PN](https://www.facebook.com/phaiwan.nakrub/)
#### [Facebook Fanpage : Phaiwan Studio](https://www.facebook.com/PhaiwanStudio/)

## DONATE
#### Pyapal : insensak.007@gmail.com
#### True Wallet : 0910504092
#### Bank : 0638058804 - กสิกรไทย
