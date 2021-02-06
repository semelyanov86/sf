<?php


namespace Parents\ValueObjects;
use Funeralzone\ValueObjects\CompositeTrait;
use Funeralzone\ValueObjects\ValueObject;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageValueObject implements ValueObject
{
    use CompositeTrait;

    public ?string $url = null;
    public ?string $thumbnail;
    public ?string $preview;
    public ?string $file_name = null;
    public ?int $id = null;


    public function __construct(
        Model $file = null
    )
    {
        if ($file) {
            $this->url       = $file->getUrl();
            $this->thumbnail = $file->getUrl('thumb');
            $this->preview   = $file->getUrl('preview');
            $this->file_name = $file->file_name;
            $this->id = $file->id;
        }
    }

    public static function fromNative($native): ImageValueObject
    {
        return new static($native);
    }

    public static function fromString(?string $name): ImageValueObject
    {
        if (!$name || $name == 'undefined') {
            return new static(null);
        }
        $valueObject = new static(null);
        $valueObject->url = $name;
        $valueObject->file_name = $name;
        return $valueObject;
    }

    public function toModel(): Media
    {
        return Media::find($this->id);
    }

    /**
     * @return bool
     */
    public function isNull(): bool
    {
        return is_null($this->url) || is_null($this->file_name);
    }
}
