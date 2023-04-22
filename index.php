<?php
$apiKey = "AIzaSyDJffUnwG1cJjcHG9sHm8ZFQhpB1KU5W3s";
$cx = "b053e66b068564407";
$search = "сериалы";

if (isset($_GET['search'])){
    $search = $_GET['search'];
}
$url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";
$ch = curl_init ( ) ; // відкрити сеанс cURL
curl_setopt ($ch, CURLOPT_URL, $url); // встановити параметр $ url
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Повернути відповідь в рядок
$resultJson = curl_exec ($ch); // Виконати запит
curl_close ($ch);
$arr = json_decode($resultJson, true);
//var_dump($arr);
//die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="/index.php">
    <label for="url">Url:</label>
    <input type="text" id="url" name="url" value="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
    <h2>Search Result</h2>
</ form >
<?php
foreach ($arr['items'] as $item) {
    echo  "<p >".$item['link'] . '</p>' ;
    echo "<a href='{$item['title']}'>" . $item['title'] . '</a>' . '<br>' . '<br>';
}
?>
</body>
</html>
