<?php


namespace App\Helpers\UploadFile;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class UploadFile
{
    public static function SingleFile($file,$filePathUrl)
    {
        $imagePath = "/{$filePathUrl}/" ."/";
        $filename = self::getNameFile($file);
        $file->move(public_path($imagePath), $filename);
        $path = $imagePath . $filename;
        return $path;
    }

    public static function SingleImage($file,$imagePathUrl)
    {
        $imagePath = "/{$imagePathUrl}/" . Carbon::now()->month . "/";
        $filename = self::getNameFile($file);
        $file->storeAs($imagePath, $filename,'public');
        $path = $imagePath . $filename;
        return $path;
    }

    public static function TwoSizeImage($file,$imagePathUrl)
    {
        $imagePath = "/upload/images/{$imagePathUrl}/" . Carbon::now()->year . "/";
        $filename = self::getNameFile($file);

        $file->storeAs($imagePath, $filename,'public');

        $sizes = ["400", "600"];
        $url['images'] = self::resize($file->getRealPath(), $sizes, $imagePath, $filename);
        $url['thumb'] = [
            'mobile' => $url['images'][$sizes[0]],
            'pc' => $url['images'][$sizes[1]]
        ];
        return $url;
    }

    public static function ThreeSizeImage($file,$imagePathUrl)
    {
        $imagePath = "/upload/images/{$imagePathUrl}/" . Carbon::now()->year . "/";
        $filename = self::getNameFile($file);

        $file->storeAs($imagePath, $filename,'public');

        $sizes = ["150", "250", "600"];
        $url['images'] = self::resize($file->getRealPath(), $sizes, $imagePath, $filename);
        $url['thumb'] = [
            'mobile' => $url['images'][$sizes[0]],
            'pc' => $url['images'][$sizes[1]]
        ];
        return $url;
    }

    public static function ForGallery($file,$imagePathUrl)
    {
        $imagePath = "/upload/images/galleries/{$imagePathUrl}/" . Carbon::now()->year . "/";
        $filename = self::getNameFile($file);
        $file->storeAs($imagePath, $filename,'public');
        $sizes = ["300", "600"];
        $url['images'] = self::resize($file->getRealPath(), $sizes, $imagePath, $filename);
        return $url;
    }

    public static function ForIcon($file,$imagePathUrl,$iconName)
    {
        $imagePath = "/{$imagePathUrl}/" . Carbon::now()->year . "/";
        $filename = $iconName;
        $file->storeAs($imagePath, $filename,'public');
        $url = $imagePath . $filename;
        return $url;
    }

    /**
     * @param $path
     * @param $sizes
     * @param $imagePath
     * @param $filename
     * @return mixed
     */
    public static function resize($path, $sizes, $imagePath, $filename)
    {
        $images['original'] =$imagePath . $filename;
        foreach ($sizes as $size) {
            $images[$size] = $imagePath . "{$size}_" . $filename;

            Image::make($path)->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path($images[$size]));
        }

        return $images;
    }


    /**
     * @param $file
     * @return string
     */
    public static function getNameFile($file)
    {
        return time() . '_' . $file->getClientOriginalName();
    }
}
