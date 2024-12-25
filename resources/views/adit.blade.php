<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>動的な時間表示</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }

        .time-display {
            font-size: 2em;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>現在の時間</h1>
    <div class="time-display" id="current-time">
        <!-- 時間がここに表示されます -->
    </div>

    <script>
        // 時間を動的に更新する関数
        function updateTime() {
            const now = new Date(); // 現在の日時を取得
            const hours = String(now.getHours()).padStart(2, '0'); // 時間を2桁に整形
            const minutes = String(now.getMinutes()).padStart(2, '0'); // 分を2桁に整形
            const seconds = String(now.getSeconds()).padStart(2, '0'); // 秒を2桁に整形
            const formattedTime = `${hours}:${minutes}:${seconds}`; // "HH:mm:ss"形式で表示

            document.getElementById('current-time').textContent = formattedTime; // HTMLに表示
        }

        // 初期表示
        updateTime();

        // 毎秒時間を更新
        setInterval(updateTime, 1000);
    </script>
</body>
</html>


