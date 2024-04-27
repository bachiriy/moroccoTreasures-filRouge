<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MHM New message</title>
</head>
<body>
    <div>
        <p>{{ $infos->message }}</p>
    </div>
    <h4>Sender Information</h4>
    <p>Full Name : {{ $infos->name }}</p>
    <p>Email : {{ $infos->email }}</p>
    <p>Phone : {{ $infos->phone }}</p>
</body>
</html>
