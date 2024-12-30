<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <h3>Car Rental Notification of ID #{{ $id }}</h3>
    <p>Dear Admin,</p>
    <p>A car has been rented by the following customer:</p>
    <ul>
        <li><strong>Customer Name:</strong> {{ $customerName }}</li>
        <li><strong>Customer Email:</strong> {{ $customerEmail }}</li>
        <li><strong>Customer Phone:</strong> {{ $customerPhone }}</li>
    </ul>
    <p>Here are the details of the rental:</p>
    <ul>
        <li><strong>Car Name:</strong> {{ $carName }}</li>
        <li><strong>Car brand:</strong> {{ $carBrand }}</li>
        <li><strong>Car Model:</strong> {{ $carModel }}</li>
        <li><strong>Car Type:</strong> {{ $carType }}</li>
        <li><strong>Car Info:</strong> {{ $messageContent }}</li>
        <li><strong>Total Cost:</strong> ${{ $cost }}</li>
    </ul>
</body>

</html>
