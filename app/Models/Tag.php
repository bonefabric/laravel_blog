<?php

namespace App\Models;

use DateTime;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
	use HasFactory, SoftDeletes;

	protected $fillable = [
		'name',
	];

	/**
	 * @throws Exception
	 */
	public function getCreatedAtAttribute(string $value): string
	{
		return (new DateTime($value))->format('d-m-Y H:i:s');
	}

	/**
	 * @throws Exception
	 */
	public function getUpdatedAtAttribute(string $value): string
	{
		return (new DateTime($value))->format('d-m-Y H:i:s');
	}

	/**
	 * @throws Exception
	 */
	public function getDeletedAtAttribute(?string $value): ?string
	{
		if (!$value) {
			return '';
		}
		return (new DateTime($value))->format('d-m-Y H:i:s');
	}

	/**
	 * @return BelongsToMany
	 */
	public function posts(): BelongsToMany
	{
		return $this->belongsToMany(Post::class, 'post_tags', 'tag_ref', 'post_ref');
	}
}
