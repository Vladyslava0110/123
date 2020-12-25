<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model 
{


    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg, jpeg, png']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->image = $file;
        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);
            return $this->saveFile();
        }
    }

    private function getFolder()
    {
        return Yii::getAlias('@app/web') . '/uploads/';
    }

    private function generateFileName()
    {
        return strtolower(md5(uniqid($this->image->basename)) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage($currentImage)
    {
        if (
            file_exists($this->getFolder() . $currentImage)
            && !empty($currentImage)
            && $currentImage != null
        ) {
            unlink($this->getFolder() . $currentImage);
        }
    }

    public function saveFile()
    {
        $filename = $this->generateFileName();
        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }
}