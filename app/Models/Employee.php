<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'email',
        'phone',        
    ];

    public function companyName($id)
    {
        $copany = Company::select('name')->where('id', $id)->first();
        return $copany->name;
    }

}



