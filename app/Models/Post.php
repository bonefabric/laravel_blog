<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use DateTimeImmutable;
use Exception;
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
}
