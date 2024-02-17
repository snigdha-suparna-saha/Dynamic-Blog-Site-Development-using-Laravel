<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $imageUrl, $imageName, $directory;

    private static function getImageUrl($request)
    {
        self::$image     = $request->file('image'); // keep the image
        self::$imageName = self::$image->getClientOriginalName(); // find the image name
        self::$directory = 'uploads/category-images/';// keep in a folder
        self::$image->move(self::$directory, self::$imageName); // move the image in the directory with the finding name
        self::$imageUrl = self::$directory.self::$imageName; // by concatening these two will keep in url
        return self::$imageUrl;
    }

    public static function newCategory($request)
    {
        self::$imageUrl = self::getImageUrl($request);

        self::$category = new Category(); //model is connected to table, form data is mapped with database table through model and then save it
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = self::$imageUrl;
        self::$category->status = $request->status;
        self::$category->save();

    }

    public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$image = $request->file('image');
            self::$imageName = self::$image->getClientOriginalName();
            self::$directory = 'uploads/category-images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$category->image = self::$directory.self::$imageName;
        }

        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->status = $request->status;
        self::$category->save();

    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if(file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

}
