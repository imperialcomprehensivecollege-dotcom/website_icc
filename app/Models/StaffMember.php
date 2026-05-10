<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    protected $fillable = [
        'name',
        'role_en',
        'role_fr',
        'department',
        'qualification',
        'is_gce_examiner',
        'is_active',
        'photo',
        'bio_en',
        'bio_fr',
        'sort_order',
    ];

    protected $casts = [
        'is_gce_examiner' => 'boolean',
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeByDepartment($query, $department)
    {
        return $query->where('department', $department);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeExaminers($query)
    {
        return $query->where('is_gce_examiner', true);
    }

    public function scopeOrderBySort($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    // Accessors
    public function getPhotoUrlAttribute()
    {
        if ($this->photo) {
            return asset('storage/staff/' . $this->photo);
        }
        return asset('images/avatar-placeholder.jpg');
    }

    public function getInitialsAttribute()
    {
        $names = explode(' ', $this->name);
        $initials = '';
        foreach ($names as $name) {
            $initials .= strtoupper(substr($name, 0, 1));
        }
        return substr($initials, 0, 2);
    }
}
