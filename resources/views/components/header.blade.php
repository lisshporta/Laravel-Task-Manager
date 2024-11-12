<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<style>
body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        min-height: 100vh;
        background-color: #f4f4f4;
    }

    .container {
        width: 80%;
        max-width: 1200px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 8px;
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    table th, table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    table th {
        background-color: #f4f4f4;
        font-weight: 500;
    }

    table tbody tr:hover {
        background-color: #f9f9f9;
    }

    table td.textbox {
        word-wrap: break-word;
        white-space: normal;
        max-width: 200px;
    }

    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
        text-decoration: none;
        margin-right: 8px;
        transition: background-color 0.3s;
    }

    .btn-warning {
        background-color: #ffbb33;
        color: #fff;
    }

    .btn-warning:hover {
        background-color: #ff9e00;
    }

    .btn-danger {
        background-color: #f44336;
        color: #fff;
    }

    .btn-danger:hover {
        background-color: #d32f2f;
    }

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #333;
    color: #fff;
}

.header h1 {
    margin: 0;
}

.header .btn-logout {
    background-color: #f44336;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
}

.header .btn-logout:hover {
    background-color: #d32f2f;
}

.header .btn-create-task {
    background-color: #4CAF50;
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 4px;
}

.header .btn-create-task:hover {
    background-color: #45a049;
}
</style>
</head>

<div class="header">
<h1>{{ config('app.name', 'Laravel') }}</h1>
<div>
    <a href="{{ route('create') }}" class="btn btn-create-task">Create Task</a>
    <a href="{{ route('logout') }}" class="btn btn-logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>
</div>
