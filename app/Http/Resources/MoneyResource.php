<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MoneyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'office_send' => $this->office_send,
            'office_receive' => $this->office_receive,
            'money_trans' => $this->money_trans,
            'date_trans' => $this->data_trans,
            'office_id' => $this->office_id
        ];
    }
}
