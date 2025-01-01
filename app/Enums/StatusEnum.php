<?php

namespace App\Enums;

enum StatusEnum: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case IDLE = 'idle';
    case DEFAULT = 'default';
}
