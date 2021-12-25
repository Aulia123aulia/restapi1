<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DaftarBuku extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'kode' => $this->kode,
            'judul' => $this->judul,
            'pengarang' => $this->pengarang,
            'tahun' => $this->tahun,
            'deskripsi' => $this->deskripsi,
            'stock' => $this->stock
        ];
    }
}
