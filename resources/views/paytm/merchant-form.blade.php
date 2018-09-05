<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Merchant Check Out Page</title>
</head>
<body>
<center><h2>Please do not refresh this page...</h2></center>
<form method="post" action="{{ $paytm_txn_url }}" name="f1">
    @csrf
    <table border="1">
        <tbody>
                <?php
                    foreach($paramList as $name => $value) {
                        echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
                    }
                ?>
        <input type="hidden" name="CHECKSUMHASH" value="{{ $checkSum }}">
        </tbody>
    </table>
    <script type="text/javascript">
                document.f1.submit();
    </script>
</form>
</body>
</html>