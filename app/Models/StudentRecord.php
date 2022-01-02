<?php

namespace App\Models;

use App\Models\MyClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentRecord extends Model
{
    use HasFactory;

    protected $fillable = ['admission_number', 'admission_date', 'my_class_id', 'section_id'];
    /**
     * Get the MyClass that owns the Section
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function MyClass()
    {
        return $this->belongsTo(MyClass::class);
    }

   /**
    * Get the user that owns the StudentRecord
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function user()
   {
       return $this->belongsTo(User::class);
   }
}