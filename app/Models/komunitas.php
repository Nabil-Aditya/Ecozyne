<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class komunitas extends Model
{
    use HasFactory;

    protected $table = 'komunitas';
    protected $primaryKey = 'id_komunitas';

    protected $fillable = [
        'id_user',
        'nama',
        'no_telp',
        'alamat',
        'kecamatan',
    ];


  /**
   * Get the user that owns the komunitas
   *
   * @return BelongsTo
   */
  public function user(): BelongsTo
  {
      return $this->belongsTo(User::class, 'id_user', 'id_user');
  }

}
