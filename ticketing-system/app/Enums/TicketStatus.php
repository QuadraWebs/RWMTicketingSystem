<?php

namespace App\Enums;

enum TicketStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';
}
