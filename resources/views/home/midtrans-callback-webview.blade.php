<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="{{config('midtrans.client_key')}}"></script>
    <title>Document</title>
</head>
<body>

<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    // payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{$snapToken}}', {
        onSuccess: function (result) {
            /* You may add your own implementation here */
            // alert("payment success!");
            // console.log(result);
            window.location.href = '/home/history'
            // toggleSucces()
        },
        onPending: function (result) {
            /* You may add your own implementation here */
            alert("wating your payment!");
            console.log(result);
        },
        onError: function (result) {
            /* You may add your own implementation here */
            alert("payment failed!");
            console.log(result);
        },
        onClose: function () {
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
        }
        // })
    });
</script>
</body>
</html>
