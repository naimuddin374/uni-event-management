<?php

namespace App\Enums;

enum MemberType: string
{
    case LIFE_LONG_MEMBER = 'Life Long Member';
    case EXECUTIVE_MEMBER = 'Executive Member';
    case GENERAL_MEMBER = 'General Member';
}