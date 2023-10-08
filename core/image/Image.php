<?php

namespace core\image;

class Image
{
    private ?array $properties = null;

    public function uploadImageToDir($from, $to, $permissions): void
    {
        $this->properties['tmp_name'] = $from;
        $this->properties['dir_path'] = $to;

        $full_path = self::getFullPath();

        mkdir($to, $permissions);
        move_uploaded_file($from, "$full_path");
    }

    public function getFullPath(): string
    {
        return $this->properties['dir_path'] . '/' . basename($this->properties['tmp_name']);
    }

    public static function deleteImage($dir): void
    {
        unlink($_SERVER['DOCUMENT_ROOT'] . $dir);
        rmdir($_SERVER['DOCUMENT_ROOT'] . dirname($dir));
    }
}