<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

	protected $fillable = [
		'title',
		'content',
	];

	/**
	 * Title mutator
	 * @param string $value
	 */
	public function setTitleAttribute(string $value): void
	{
		$this->attributes['title'] = ucfirst($value);
	}
}
