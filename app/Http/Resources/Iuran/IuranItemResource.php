<?php

namespace App\Http\Resources\Iuran;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IuranItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nominal' => $this->nominal,
            'tgl_bayar' => $this->tgl_bayar,
        ];
    }
}
