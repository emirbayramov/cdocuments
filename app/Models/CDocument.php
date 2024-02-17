<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string content
 * @property CUser[] users
 * @property CHistory histories
 */
class CDocument extends Model
{
    use HasFactory;

    protected $table = 'cdocuments';
    public function users()
    {
        return $this->belongsToMany(CUser::class, 'cusersdocuments', 'document_id', 'user_id');
    }

    public function histories()
    {
        return $this->hasMany(CHistory::class, 'document_id', 'id');
    }
}
