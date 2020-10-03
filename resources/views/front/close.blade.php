<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>closed</title>
</head>

<style>

    .alert {
        width: 600px;
        height: 500px;
        margin: auto;
        box-shadow: 0 0 5px 6px #EEE;
    }

</style>
<body>


<div class="container">

    <div class="alert alert-warning">
        {{ setting()->message_maintenance }}
    </div>

</div>


</body>
</html>
