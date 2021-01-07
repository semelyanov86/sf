<?php

namespace Domains\Targets\Models;

use Domains\Targets\Factories\TargetCategoryFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Parents\Models\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use \DateTimeInterface;

class TargetCategory extends Model implements HasMedia
{
    use InteractsWithMedia;

    public $table = 'target_categories';

    protected $appends = [
        'target_category_image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TARGET_CATEGORY_TYPE_SELECT = [
        '2' => 'Pay',
        '1' => 'Save',
    ];

    protected $fillable = [
        'target_category_name',
        'target_category_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function targetCategoryTargets()
    {
        return $this->hasMany(Target::class, 'target_category_id', 'id');
    }

    public function getTargetCategoryImageAttribute()
    {
        $file = $this->getMedia('target_category_image')->last();

        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return TargetCategoryFactory
     */
    protected static function newFactory(): TargetCategoryFactory
    {
        return TargetCategoryFactory::new();
    }
}
