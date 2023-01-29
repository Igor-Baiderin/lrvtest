<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class FeedbackSend
{
    private $data;
    /**
     * @param $data
     * @return void
     */
    public function send($data)
    {
        $this->data = $data;
        $this->WriteByConfiguration();
    }

    /**
     * @return void
     */
    private function WriteByConfiguration()
    {
        $ways = config('feedback.ways');
        $this->saveDB();
        $this->saveFile();
        foreach ($ways as $item) {
            var_dump($item);
        }
    }

    /**
     * @return void
     */
    private function saveDB()
    {
        // Запись в БД
        Order::create($this->data);
    }

    /**
     * @return void
     */
    private function saveFile()
    {
        // Запись в файл
        $path = 'orders/order_' . date('d-m-Y_H.i');
        Storage::disk('public')->put($path . '.json', json_encode($this->data));
    }
}