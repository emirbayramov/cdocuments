<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int id
 * @property string name
 * @property string content
 * @property int document_id
 * @property CDocument $document
 */
class CHistory extends Model
{
    use HasFactory;

    protected $table = 'cdocument_histories';

    public function document()
    {
        return $this->belongsTo(CDocument::class, 'document_id', 'id');
    }
}
