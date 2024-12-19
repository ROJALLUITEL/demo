<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Installation Process</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: cornsilk;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: cyan;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
        }
        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .cancel-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none; /* Remove underline */
            display: inline-block;
            margin-top: 10px;
        }
        .cancel-button:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Installation process</h1>
<form method="POST" action="{{ route('env.postStep2') }}">
    @csrf
    <label for="database_name">Database Name</label>
    <input type="text" id="database_name" name="DATABASE_NAME" value="{{ old('DATABASE_NAME', session('DATABASE_NAME')) }}" required>
    <button type="submit">OK</button>
    <a href="{{ route('env.step1') }}" class="cancel-button">Cancel</a>

</form><br>
<div>click OK to proceed.</div>

    
</div>

</body>
</html>
