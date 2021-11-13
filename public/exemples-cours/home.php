<?php $user = "John";
$curl = curl_init();
 
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://imdb-api.com/API/Search/k_bj3ys5s9/superman",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
));
 
$response = curl_exec($curl);
/* echo $response;
 */
curl_close($curl);
$json = json_decode($response, true);
/* print_r($json);
 */
/* echo $json['results'][0]['title'];  
 */
foreach ($json['results'] as $key => $value) {
    echo $value['title'] . "<br>";
}
$odd_numbers = [1, 3, 5, 7, 9];
$even_numbers = [2, 4, 6, 8, 10];
$all_numbers = array_merge($odd_numbers, $even_numbers);
$numbers = [1,2,3,4,5,6];
/* print_r(array_slice($numbers, 3, 1));
 */
/* print_r($all_numbers);
 */?>
<html>

<head></head>

<body>
    Hello <?php echo $user;
/*             print_r($numbers);
 */            ?>!
</body>

</html>