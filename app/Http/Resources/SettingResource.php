<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
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
            'title'=>$this->title,
            'desc'=>$this->desc,
            'phone'=>$this->phone,
            'mail'=>$this->mail,
            'logo'=>url('/img/settings/' . $this->logo),
            'image'=>url('/img/settings/' . $this->image),
            'favicon'=>url('/img/settings/' . $this->favicon),
            'twitter'=>$this->twitter,
            'facebook'=>$this->facebook,
            'linkedin'=>$this->linkedin,
            'instagram'=>$this->instagram,
            'whatsapp'=>$this->whatsapp,
        ];
    }
}
