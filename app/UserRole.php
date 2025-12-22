<?php

namespace App;

enum UserRole: string
{
    case User = 'user';
    case Mentor = 'mentor';
    case Admin = 'admin';
}
