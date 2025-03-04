<?php

namespace App;

enum UserType: string
{
    case ADMIN = 'admin';
    case SUPER_ADMIN = 'super_admin';
}
