<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <!--引用bootstrap-->
    <meta charset="UTF-8">
    <title>部門</title>
    <link rel="stylesheet" href="department.css">
</head>

<body>
    <header>
        <div class="logo">
            <img src="resource/logo.png" alt="海大logo" width="75%">
        </div>
        <!--hover會跑掉算了css真的好難QQ-->
        <div class="dropdown">
            <button class="btn hamburger" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                style="background: url('resource/ham.png') no-repeat center center; background-size: contain; height: 35px; width: 35px;"></button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#">編輯</a></li>
                <li><a class="dropdown-item" href="#">刪除</a></li>
            </ul>
        </div>

    </header>

    <main>
        <!--抓單位名字放最上面-->
        <div id="department-name"></div>
        <!--動態生成card放的區塊-->
        <div id="department-result" class="row mt-3"></div>
        <!--寫PHP 動態生成card-->

    </main>

</body>

</html>