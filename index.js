paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: document.getElementById("sub_total_price").value
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            window.location.replace("http://localhost/eshopper/success.php")
        })
    },
    onCancel: function (data) {
        window.location.replace("http://localhost/eshopper/Oncancel.php")
    }
}).render('#paypal-payment-button');