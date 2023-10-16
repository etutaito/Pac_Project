<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
   
        public function definitions() {
            return $this->belongsToMany(Definition::class, 'worddefinitions');
        }

        public function translations() {
            return $this->hasMany(Translation::class);
        }
    
    // public function scopeFilter($query, array $filters) {

    //     if($filters['search'] ?? false) {
    //         $query->where('word', 'like', '%' . request('search') . '%');
    //     }
    // }

    public function scopeFilter($query, array $filters) {
        if ($filters['search'] ?? false) {
            $query->where('word', 'like', '%' . $filters['search'] . '%');
        }
    }

    // public function scopeFilter($query, array $filters) {
    //     $query->when(isset($filters['search']), function ($query) use ($filters) {
    //         $search = $filters['search'];
    //         return $query->where('word', 'like', '%' . $search . '%')
    //             ->orWhereHas('definitions', function ($query) use ($search) {
    //                 $query->where('definitions', 'like', '%' . $search . '%');
    //             });
    //     });
    // }
    
    
    
}