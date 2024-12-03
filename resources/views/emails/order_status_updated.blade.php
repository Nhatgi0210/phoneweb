<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo trạng thái đơn hàng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }
            table {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Thông báo trạng thái đơn hàng</h2>
    <p>Đơn hàng của bạn đã được duyệt. Dưới đây là thông tin đơn hàng của bạn:</p>
    
    <table>
        <tr>
            <th>Mã đơn hàng</th>
            <td>{{ $order->id }}</td>
        </tr>
        <tr>
            <th>Trạng thái</th>
            <td>Đã duyệt</td>
        </tr>
        <tr>
            <th>Tổng tiền</th>
            <td>{{ number_format($order->total_price, 0, ',', '.') }} VND</td>
        </tr>
    </table>

    <p>Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi!</p>
</body>
</html>