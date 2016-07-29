## ReviewSystem

#Getting new Token
```
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://localhost/reviewSystem/api/oAuth2/token");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, "key:Secret");

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
```
#Order API
1. Creating new order
New order will be created and a unique link to the review page will be output.
```
$ch = curl_init();
$post_data = array(
			'order_id' => ORDER ID
	);
curl_setopt($ch, CURLOPT_URL, "http://localhost/reviewSystem/api/order");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$curl_header = array();
$curl_header[] = 'Authorization: Bearer TOKEN';
curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_header);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
curl_setopt($ch, CURLOPT_POST, 1);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
```

Reponse will be something like this *(json object)*
```
{"status":"Success","review_page_url":"\/reviewSystem\/review?ud=UNIQUE ID"}
```
2. Getting Order
```
$order_id = null; //if get all record
$order_id = ORDER ID; //if get specific record
$ch = curl_init();

if($order_id)
	curl_setopt($ch, CURLOPT_URL, "http://localhost/reviewSystem/api/order?order_id=".$order_id);
else 
	curl_setopt($ch, CURLOPT_URL, "http://localhost/reviewSystem/api/order");

$curl_header = array();
$curl_header[] = 'Authorization: Bearer TOKEN';
curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_header);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch); 
```

Respone will contain *json object* of details of order
```
[{"order_id":"1","user_id":"1","date_creation":"0000-00-00 00:00:00","review_page_id":"\/reviewSystem\/review?ud=UNIQUE ID"}]
```

3. Delete order
```
$ch = curl_init();
	
curl_setopt($ch, CURLOPT_URL, "http://localhost/reviewSystem/api/order?order_id=1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$curl_header = array();
$curl_header[] = 'Authorization: Bearer TOKEN';
curl_setopt($ch, CURLOPT_HTTPHEADER, $curl_header);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");


$result = curl_exec($ch);
print_r($result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
```

Resonse of delete request will be
```
{"status":"Order deleted successfully"}
```

In case if the record is already deleted or not found then error message will appear in *json object* form
```
{"error":"invalid order","error_description":"No order found"}
```

