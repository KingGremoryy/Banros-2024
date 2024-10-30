<?php

namespace App\Enums;

enum BookStatus: string
{
    case Aktif = 'Aktif';
    case Tersedia = 'Tersedia'; 
    case Booked = 'Booked'; 
    
}