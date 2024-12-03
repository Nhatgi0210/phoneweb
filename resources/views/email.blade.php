<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật trạng thái đơn hàng</title>
</head>
<body>
    <h2>Xin chào {{ $order->email }}</h2>

    <p>Trạng thái đơn hàng của bạn đã được cập nhật:</p>
    <p>Trạng thái hiện tại: <strong>{{ $order->status == 'approved' ? 'Đã duyệt' : 'Không duyệt' }}</strong></p>

    <p>Xin cảm ơn bạn đã mua sắm tại cửa hàng của chúng tôi!</p>
</body>
</html>
