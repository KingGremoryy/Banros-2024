<?php

namespace App\Enums;

enum ArenaStatus: string
{
    case Aktif = 'Aktif';
    case Tersedia = 'Tersedia'; 
    case Booked = 'Booked'; 
    
}