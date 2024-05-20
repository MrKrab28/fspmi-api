<?php

namespace App\Http\Resources\Iuran;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IuranResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'total_iuran' => $this->items->sum('nominal'),
            'items' => IuranItemResource::collection($this->items),

        ];
    }
}
