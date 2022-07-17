<?php
// =======
// ↓ ①$cityに東京の都市コード、$appidに自身のAPIKeyを代入しよう
// =======
$city = "1850147";
$appid = "80579f5bb391baa7aec0099cddc0286f";

// =======
// ↓ ②URLからJSON形式で現在の天気情報を取得しよう(①で作った変数を使うこと)
// =======
// $url = "http://api.openweathermap.org/data/2.5/weather?id=" . $city . "&exclude=hourly,daily" . "&units=metric&APPID=" . $appid;
$url = "http://api.openweathermap.org/data/2.5/forecast?id=" . $city . "&units=metric&APPID=" . $appid;

// Webページの内容を読み込む
$json = file_get_contents($url);

// jsonを連想配列に変換
$json_decode = json_decode($json, true);

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>お天気パネル</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css">
</head>

<body>
  <div class="weather">
    <!--------今日の天気-------->
    <!--③今日の日付を表示させてみよう-->
    <h2><?php echo date("m/d", $json_decode['list'][0]['dt']); ?></h2>
    <div class="today">
      <div class="weather-icon">
        <!--④もし曇りだったら曇りアイコンを表示させよう-->
        <?php if ($json_decode['list'][0]['weather'][0]['main'] == "Clouds") : ?>
          <i class="wi wi-day-cloudy"></i>

          <!--⑤もし雨だったら雨アイコンを表示させよう-->
        <?php elseif ($json_decode['list'][0]['weather'][0]['main'] == "Rain") : ?>
          <i class="wi wi-day-rain"></i>

          <!--晴れの場合-->
        <?php else : ?>
          <i class="wi wi-day-sunny"></i>

        <?php endif; ?>
      </div>
      <div class="weather-detail">
        <!--⑥気温、地名、天気、湿度、気圧の順に表示してみよう-->
        <div class="temp"><?php echo $json_decode['list'][0]['main']['temp']; ?>°</div>
        <div><?php echo $json_decode['city']['name']; ?></div>
        <div><?php echo $json_decode['list'][0]['weather'][0]['main'] ?></div>
        <div><?php echo $json_decode['list'][0]['main']['humidity']; ?>%</div>
        <div><?php echo $json_decode['list'][0]['main']['pressure']; ?>hPa</div>
      </div>
    </div>

    <!--------明日以降の天気--------->
    <ul class="week_container">
      　
      <!--⑦明日以降の情報を取得してみよう-->
      <?php for ($i = 8; $i < count($json_decode['list']); $i += 8) { ?>
        <!--⑧もし曇りだったら日付、曇りアイコン、気温を表示させよう-->
        <?php if ($json_decode['list'][$i]['weather'][0]['main'] == "Clouds") : ?>
          <li class="clouds_color">
            <div class="day">
              <div class="date"><?php echo date("m/d", $json_decode['list'][$i]['dt']); ?></div>
              <div class="weather-icon">
                <i class="wi wi-day-cloudy"></i>
              </div>
              <div class="temp"><?php echo $json_decode['list'][$i]['main']['temp']; ?>°</div>
            </div>
          </li>

          <!--⑨もし雨だったら日付、雨アイコン、気温を表示させよう-->
        <?php elseif ($json_decode['list'][$i]['weather'][0]['main'] == "Rain") : ?>
          <li class="rain_color">
            <div class="day">
              <div class="date"><?php echo date("m/d", $json_decode['list'][$i]['dt']); ?></div>
              <div class="weather-icon">
                <i class="wi wi-day-rain"></i>
              </div>
              <div class="temp"><?php echo $json_decode['list'][$i]['main']['temp']; ?>°</div>
            </div>
          </li>

          <!--⑩もし晴れだったら日付、晴れアイコン、気温を表示させよう-->
        <?php else : ?>
          <li class="clear_color">
            <div class="day">
              <div class="date"><?php echo date("m/d", $json_decode['list'][$i]['dt']); ?></div>
              <div class="weather-icon">
                <i class="wi wi-day-sunny"></i>
              </div>
              <div class="temp"><?php echo $json_decode['list'][$i]['main']['temp']; ?>°</div>
            </div>
          </li>
        <?php endif; ?>
      <?php } ?>
    </ul>
  </div>
</body>

</html>

<!--最後にCSSで天気ごとに背景色を変えてみよう。今日の天気の背景色は変更不要-->
