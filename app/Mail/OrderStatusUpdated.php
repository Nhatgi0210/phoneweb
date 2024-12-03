<?php
namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderStatusUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    // Khởi tạo với thông tin đơn hàng
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    // Xây dựng nội dung email
    public function build()
    {
        return $this->subject('Thông báo trạng thái đơn hàng')
                    ->view('emails.order_status_updated'); // Xác định view sẽ dùng
    }
}


