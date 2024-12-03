<!-- resources/views/emails/order_status_updated.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Thông báo tình trạng đơn hàng</title>
</head>
<body>
    <h1>Đơn hàng của bạn đã được đặt thành công!</h1>
    <p>Mã đơn hàng: {{ $orderCode }}</p>
    <p>Tình trạng đơn hàng: {{ $status }}</p>

    <p>Cảm ơn bạn đã mua sắm tại Big Whale. Chúng tôi sẽ thông báo cho bạn về tình trạng đơn hàng sau khi được duyệt.</p>
</body>
</html>
