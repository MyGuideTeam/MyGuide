<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioBook extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getAvatarAttribute(){
        if (!$this->image)
            return url('default.png');
        return url('storage/' . $this->image);
    }

    public function getAudioAttribute(){
        if (!$this->audio_file)
            return null;
        return url('storage/' . $this->audio_file);
    }
}
