<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Şifre Sıfırla</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.5;
            font-weight: normal;
            font-size: 15px;
            color: #2F3044;
            min-height: 100%;
            margin: 0;
            padding: 0;
            width: 100%;
            background-color: #edf2f7;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 6px;
            text-align: center;
        }

        .reset-form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .reset-button {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            background-color: #009EF7;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Şifrenizi Sıfırlayın</h2>
    <p>Şifrenizi sıfırlamak için aşağıdaki formu doldurun.</p>

    <form class="reset-form">
        <div class="form-group">
            <label for="email">E-posta Adresiniz:</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Yeni Şifreniz:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Yeni Şifre Tekrar:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="reset-button">Şifreyi Sıfırla</button>
    </form>
</div>

</body>
</html>
