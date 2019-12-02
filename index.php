<?php
include './src/functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>2-Homework</title>
    <style>
        body {
            font-family: arial, sans-serif;
        }

        p {
            font-size: 22px;
            color: dimgrey;
        }


        table {
            margin-bottom: 20px;

        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }

        th {
            background: dimgrey;
            color: azure;
        }

        tr:nth-child(odd) {
            background-color: #dddddd;
        }

        tr:hover {
            background-color: #999;
            color: azure;
            cursor: pointer;
        }

        .strong {
            display: block;
            background: red;
            color: aliceblue;
            padding: 20px 10px;
            font-size: 20px;
        }

        .bold {
            color: red;
            font-size: 20px;
        }

        section {
            margin: 50px;

        }

        .title {
            border-left: 10px solid #999999;
            margin: 50px 0 10px;
            padding: 10px 20px;
            color: #999999;
            font-size: 25px;
        }

    </style>
</head>
<body>
<h2>Задание #1</h2>
<?php echo task1('data.xml'); ?>

<h2>Задание #2</h2>
<?php echo task2(); ?>


<h2>Задание #3</h2>
<?php echo task3(); ?>

<h2>Задание #4</h2>
<?php echo task4(); ?>
</body>
</html>


