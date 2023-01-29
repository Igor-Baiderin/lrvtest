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
     * Упрощенная процедура записи, можем соответственно обращаться к любым другим
     * написанным сервисам, классам, репозиториям и т.д., добавив алиас в конфигурацию.
     */
    private function WriteByConfiguration()
    {
        $ways = config('feedback.ways');
        foreach ($ways as $item) {
            switch ($item) {
                case 'local_bd':
                    $this->saveDB();
                    break;
                case 'file':
                    $this->saveFile();
                    break;
            }
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