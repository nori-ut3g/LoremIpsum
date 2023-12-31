<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 5;
$max = $_GET['max'] ?? 20;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;

// ユーザーの生成
$users = \Helpers\RandomGenerator::users($min, $max);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <style>
        /* ユーザーカードのスタイル */
        .user-card {
            width: 300px;
            border: 1px solid #ddd;
            margin: 10px;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #ddd;
        }
        .user-card h2 {
            margin: 0;
            padding: 0;
            font-size: 20px;
        }
        .user-card p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
<h1>User Profiles</h1>

<?php foreach ($users as $user): ?>
    <?= $user->toHTML() ?>
<?php endforeach; ?>

</body>
</html>