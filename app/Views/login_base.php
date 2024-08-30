<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="#">
    <title><?= isset($page_title)? $page_title.'|' : ""?><?=env('system_name')?></title>

    <style>
        html,body{
            height:100%;
            width: 100%;
        }
        body{
            display: flex;
            flex-direction:row;
            align-items:center;
            justify-content:center;
        }
    </style>
</head>
        <?= $this->renderSection('content')?>
<body>
    <?= $this->renderSection('custom_js')?>
</body>
</html>