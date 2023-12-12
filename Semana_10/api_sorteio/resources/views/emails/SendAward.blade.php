<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupom iFood</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #e44d26;
        }

        p {
            color: #333333;
        }

        .coupon-code {
            display: inline-block;
            padding: 10px;
            background-color: #e44d26;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            border-radius: 4px;
            margin-top: 20px;
        }

        .validity {
            color: #999999;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Desconto Especial!</h1>
        <p>Prezado {{$client->name}},</p>
        <p>Agradecemos por escolher o iFood! Como forma de agradecimento, temos o prazer de oferecer a você um cupom especial para o seu próximo pedido.</p>
        <div class="coupon-code">Valor do Cupom: {{$award->value}}</div>
        <div class="coupon-code">Local do Cupom: {{$award->local}}</div>
        <p>Utilize este código no momento do pagamento e aproveite o desconto!</p>

        <p>Aproveite sua refeição!</p>
        <p>Atenciosamente,<br>[Seu Nome]<br>[Seu Cargo]<br>iFood</p>
    </div>
</body>
</html>
