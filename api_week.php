<?php
// =======
// ↓ ①$cityに東京の都市コード、$appidに自身のAPIKeyを代入しよう
// =======
$city = "";
$appid = "";

// =======
// ↓ ②URLからJSON形式で現在の天気情報を取得しよう(①で作った変数を使うこと)
// =======
$url = "";

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
        <h2><?php echo date("m/d",$json_decode['list'][⚪︎⚪︎]['dt']);?></h2>
        <div class="today">
          <div class="weather-icon">
            <!--④もし曇りだったら曇りアイコンを表示させよう-->
            <?php if():?>
              <i class="wi wi-day-cloudy"></i>

            <!--⑤もし雨だったら雨アイコンを表示させよう-->
            <?php elseif():?>
              <i class="wi wi-day-rain"></i>

            <!--晴れの場合-->
            <?php else:?>
              <i class="wi wi-day-sunny"></i>

            <?php endif; ?>
          </div>
          <div class="weather-detail">
            <!--⑥気温、地名、天気、湿度、気圧の順に表示してみよう-->
            <div class="temp"><?php echo ; ?>°</div>
            <div><?php echo ; ?></div>
            <div><?php echo ; ?></div>
            <div><?php echo ; ?>%</div>
            <div><?php echo ; ?>hPa</div>
          </div>
        </div>

        <!--------明日以降の天気--------->
        <ul class="week_container">
        　<!--⑦明日以降の情報を取得してみよう-->
          <?php for($i=⚪︎⚪︎; $i<count($json_decode['list']); $i+=⚪︎⚪︎) {?>
            <!--⑧もし曇りだったら日付、曇りアイコン、気温を表示させよう-->
            <?php if():?>
              <li class="clouds_color">
                <div class="day">
                  <div class="date"><?php echo //ここに日付を記述 ;?></div>
                  <div class="weather-icon">
                    <i class="wi wi-day-cloudy"></i>
                  </div>
                  <div class="temp"><?php echo //ここに気温を記述 ;?>°</div>
                </div>
              </li>

            <!--⑨もし雨だったら日付、雨アイコン、気温を表示させよう-->
            <?php elseif():?>
              <li class="rain_color">
                <div class="day">
                  <div class="date"><?php echo //ここに日付を記述 ;?></div>
                  <div class="weather-icon">
                    <i class="wi wi-day-rain"></i>
                  </div>
                  <div class="temp"><?php echo //ここに気温を記述;?>°</div>
                </div>
              </li>
              
            <!--⑩もし晴れだったら日付、晴れアイコン、気温を表示させよう-->
            <?php else:?>
              <li class="clear_color">
                <div class="day">
                  <div class="date"><?php echo //ここに日付を記述 ;?></div>
                  <div class="weather-icon">
                    <i class="wi wi-day-sunny"></i>
                  </div>
                  <div class="temp"><?php echo //ここに気温を記述 ;?>°</div>
                </div>
              </li>
            <?php endif; ?>
          <?php } ?>
      </ul>
    </div>
  </body>
</html>

<!--最後にCSSで天気ごとに背景色を変えてみよう。今日の天気の背景色は変更不要-->



