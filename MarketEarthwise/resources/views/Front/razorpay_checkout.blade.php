<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Razorpay Checkout</title>

</head>

<body>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        const options = {
            key: "{{ env('RAZORPAY_KEY') }}",
            amount: "{{ session('razorpay_amount') }}", // Amount in paise
            currency: "INR",
            name: "{{ session('payment_name') }}",
            description: "Razorpay Payment",
            prefill: {
                name: "{{ session('payment_name') }}",
                email: "{{ session('payment_email') }}",
            },
            order_id: "{{ session('razorpay_order_id') }}",
            handler: function(response) {
                console.log("Payment Response: ", response);

                const queryParams =
                    `oid={{ session('ORDER_ID') }}&rp_payment_id=${response.razorpay_payment_id}&rp_signature=${response.razorpay_signature}&rp_order_id=${response.razorpay_order_id}&payment_status={{ session('payment_status') }}`;

                window.location.href = "{{ route('razorpay.checkout') }}?" + queryParams ?? null;
            },
            modal: {
                ondismiss: function() {
                    const queryParams =
                        `oid={{ session('ORDER_ID') }}`;
                    window.location.href = "{{ route('order.failed') }}" + queryParams ??
                        null;
                }
            }
        };

        const rzp = new Razorpay(options);
        rzp.open();
    </script>


</body>

</html>
