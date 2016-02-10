<?php

namespace App\Services;

use App\Models\BookInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BookService
{

    public function storeCover(BookInterface $book, $cover)
    {
        #/conifg/filesystems.php 
        
        $ebook_path = "{$book->id}/Resources/Templates/ebook/cover.jpg";
        $print_path = storage_path("books/{$book->id}/Resources/Templates/print");
        
        
        Storage::disk('book_local')->put($ebook_path, 
                File::get($cover));
        
        Storage::disk('book_local')->put("{$book->id}/Resources/Templates/cover.jpg", 
                File::get($cover));
        
        if(!is_dir($print_path)){
            mkdir($print_path, 0775,true); // argumento true criar pastas recursivamente
        }
        
        $img = new \Imagick($ebook_path);
        $img->setimageformat("pdf");
        $img->writeimage($print_path.'/cover.pdf');
    }

}
