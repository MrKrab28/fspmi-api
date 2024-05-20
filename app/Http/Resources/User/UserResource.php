<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => $this->password,
            'no_hp' => $this->no_hp,
            'jk' => $this->jk,
            'foto_ktp' => $this->foto_ktp,
            'foto_profile' => $this->foto_profile,
            'level' => $this->level,
            'timestamp' => $this->timestamp,
        ];
    }
}
