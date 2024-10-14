<?php
function get_weather($city) {
    $api_key = 'YOUR_OPENWEATHERMAP_API_KEY';
    $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$api_key&units=metric";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if ($data['cod'] == 200) {
        return $data['main']['temp'] . '°C'; // Возвращаем температуру
    } else {
        return 'Ошибка получения данных';
    }
}

// Пример использования
$city = 'Moscow';
$temperature = get_weather($city);
echo "Текущая температура в $city: $temperature";
?>
