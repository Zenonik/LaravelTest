<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     *
     */
    public function complete(){
        $this->completed_at = date_timezone_get();
        $this->save();
}
}
