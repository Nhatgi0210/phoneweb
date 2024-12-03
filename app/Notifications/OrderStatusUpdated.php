<?php
namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusUpdated extends Notification
{
    use Queueable;

    protected $order;

    // Nhận đơn hàng trong constructor
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    // Chọn kênh gửi thông báo (ở đây là email)
    public function via($notifiable)
    {
        return ['mail']; // Gửi qua email
    }

    // Cấu hình email
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Cập nhật trạng thái đơn hàng')
            ->line('Trạng thái đơn hàng của bạn đã thay đổi.')
            ->line('Mã đơn hàng: ' . $this->order->id)
            ->line('Trạng thái hiện tại: ' . $this->order->status)
            ->action('Xem chi tiết đơn hàng', url('/orders/' . $this->order->id));
    }

    // Tùy chọn, bạn có thể trả về mảng thông tin nếu cần
    public function toArray($notifiable)
    {
        return [
            'order_id' => $this->order->id,
            'status' => $this->order->status,
        ];
    }
}
