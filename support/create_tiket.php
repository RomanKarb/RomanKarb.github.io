<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Вход в систему</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>
<style>
        body {
            background: linear-gradient(to bottom right, #3498db, #2c3e50);
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }
        form {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            border-radius: 25px;
            padding: 60px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.25);
        }
        h2 {
            color: #2c3e50;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
		        p {
            color: #2c3e50;
			font-family: Arial;
            font-size: 22px;
            margin-bottom: 1px;
            text-align: left;
        }
        input[type=text] {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 3px;
            border: 1px solid #CCCCCC; /* добавляем серую рамку */
            margin-bottom: 10px;
            width: calc(100% - 42px); /* вычитаем размер кнопки */
            background-color: #f2f2f2;
            border-radius: 10px;
			margin-bottom: -5px;
        }
        input[type=password] {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 3px;
            border: 1px solid #CCCCCC; /* добавляем серую рамку */
            margin-bottom: 10px;
            width: calc(100% - 42px); /* вычитаем размер кнопки */
            background-color: #f2f2f2;
            border-radius: 10px;
        }
        label[for="username"],
        label[for="password"] {
            margin-bottom: 70px;
        }
        button[type=submit] {
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 3px;
            border: none;
            margin-bottom: 10px;
            width: 100%;
        }
        a {
            display: block;
            color: #2c3e50;
            text-decoration: none;
            margin-top: 20px;
        }
        a:hover {
            text-decoration: underline;
        }
        button[type=submit] {
            background-color: #2c3e50;
            color: #fff;
            transition: all 0.3s ease;
            cursor: pointer;
            border-radius: 10px;
        }
        button[type=submit]:hover {
            background-color: #3498db;
        }
    </style>
</head>
<body>
<form method="post">
<input type="text" placeholder="Sss" required></input>