<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $data['title'] }}</title>
</head>

<body>

    <p>{{ $data['body'] }}</p>
    <br>
    <p>Thank You!</p>
    <script>
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 8000);
    </script>
</body>

</html>
