<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AttestationRessource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'qr_code' => $this->qr_code,
            'student_name' => $this->student_name,
            'percentage' => $this->percentage,
            'file' => asset('/storage/' . $this->file),
        ];
    }
}
