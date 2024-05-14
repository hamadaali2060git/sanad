<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\ImageUploadTrait;

class InstructorResource extends JsonResource
{
    use ImageUploadTrait;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'mobile'=>$this->mobile,
            'detail'=>$this->detail,
            'photo'=>$this->getFile('/img/profiles/instructor/', $this->photo,'/img/profiles/')
           
        ];
    }
}
