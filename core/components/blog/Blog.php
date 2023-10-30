<?php
namespace core\components\blog;
require_once 'vendor/autoload.php';

use core\image\Image;

class Blog
{
    private \PDO|null $conn = null;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public static function getSortedList($conn, $sortType = 'DESC'): array
    {
        $stm = $conn->query("SELECT * FROM blog ORDER BY date $sortType");

        $arResult = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $arResult;
    }

    public function insertBlogElement($title, $alt, $text, Image $image): void
    {
        $full_path = $image->getFullPath();
        $img_path = substr("$full_path", strpos("$full_path", '/uploads'));

        $sth = $this->conn->prepare("insert into blog(title, img, img_alt, text) values (:title, :img_path, :alt, :text)");
        $sth->execute([
            'title' => $title,
            'img_path' => $img_path,
            'alt' => $alt,
            'text' => $text
        ]);
    }
 
    public function updateBlogElement($id, $title, $alt, $text, Image|bool $image): void
    {
        if($image)
        {
            $full_path = $image->getFullPath();
            $img_path = substr("$full_path", strpos("$full_path", '/uploads'));

            if(file_exists($_SERVER['DOCUMENT_ROOT'] . self::getImagePath($id)))
            {
                Image::deleteImage(self::getImagePath($id));
            }

            $sth = $this->conn->prepare("update blog set title = :title, img = :img, img_alt = :alt, text = :text where id = :id");
            $sth->execute([
                'title' => $title,
                'img' => $img_path,
                'alt' => $alt,
                'text' => $text,
                'id' => $id
            ]);
        }else
        {
            $sth = $this->conn->prepare("update blog set title = :title, img_alt = :alt, text = :text where id = :id");
            $sth->execute([
                'title' => $title,
                'alt' => $alt,
                'text' => $text,
                'id' => $id
            ]);
        }

    }

    public function deleteBlogElementById($id): void
    {
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . self::getImagePath($id)))
        {
            Image::deleteImage(self::getImagePath($id));
        }
        $sth = $this->conn->prepare("DELETE FROM blog WHERE id = :id");
        $sth->execute(['id' => $id]);
    }

    public function getImagePath($id)
    {
        $res = self::getBlogElementById($id, 'img');
        return $res['img'];
    }

    public function getBlogElementById($id, $field = '*'): mixed
    {
        $stm = $this->conn->query("SELECT $field FROM blog WHERE id = $id");
        $res = $stm->fetch(\PDO::FETCH_ASSOC);
        return $res;
    }
}