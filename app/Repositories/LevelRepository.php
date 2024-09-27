<?php

namespace App\Repositories;

use App\Models\Level;

class LevelRepository
{
    public function getAll()
    {
        return Level::all();
    }

    
}