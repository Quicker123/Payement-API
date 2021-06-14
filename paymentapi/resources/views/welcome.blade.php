{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
</head>
<body>
    <button id="khalti-pay">Pay with khalti</button>

    <script>
        var config = {

            "publicKey": "test_public_key_06aacf3772e14f7aaefe96388a87acca",
            "productIdentity": "Testing",
            "productName": "Testin",
            "productUrl": "http://localhost/testP",
            "eventHandler": {
                onSuccess (payload) {

                    $.ajax({

                        url: "{{url('/payment/verify/')}}",
                        type: 'POST',
                        data:{
                            amount : payload.amount,
                            trans_token : payload.token,
                            _token: '{{csrf_token()}}',
                        },
                        success: function(res)
                        {
                            $('#dataDisplay').html(res.responsedArray);
                        },
                        error: function(error)
                        {
                            console.log(error.error);
                        }
                    })
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("khalti-pay");
        btn.onclick = function () {

            checkout.show({amount: 1000});
        }

    </script>
<div id="dataDisplay">

</div>
</body>
</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://khalti.com/static/khalti-checkout.js"></script>
</head>
<body>
    <button id="khalti-pay">Pay with khalti</button>

    <script>
        var config = {

            "publicKey": "test_public_key_06aacf3772e14f7aaefe96388a87acca",
            "productIdentity": "Testing",
            "productName": "Testin",
            "productUrl": "http://localhost/testP",
            "eventHandler": {
                onSuccess (payload) {
                    $.ajax({

                        url: "{{url('/payment/verify/')}}",
                        type: 'POST',
                        data:{
                            amount : payload.amount,
                            trans_token : payload.token,
                            _token:'{{csrf_token()}}'
                        },
                        success: function(res)
                        {
                            $('#dataDisplay').html(res.responsedArray.amount);
                            console.log(res);
                        },
                        error: function(error)
                        {
                            console.log(error.error);
                        }
                    })
                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("khalti-pay");
        btn.onclick = function () {
            checkout.show({amount: 1000});
        }
    </script>
<div id="dataDisplay">

</div>

</body>
</html>