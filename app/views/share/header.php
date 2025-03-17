<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .container {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 150px;
            height: auto;
        }

        .action-links a {
            margin: 0 5px;
            text-decoration: none;
            color: #007bff;
        }

        .action-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="index.php">Test1</a>
        <a href="index.php?controller=student&action=list">Sinh Viên</a>
        <a href="index.php?controller=hocphan&action=list">Học Phần</a>
        <a href="index.php?controller=dangky&action=list">Đăng Ký</a>
        <a href="#">Đăng Nhập</a>
    </div>

    <div class="container">