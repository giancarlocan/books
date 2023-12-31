<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'isbn',
        'title',
        'pages',
        'affiliate_link',
        'open_library'
    ];

    public static function search($isbn)
    {
        $count = Book::where('isbn', $isbn)->count('id');

        // get book info from openlibrary API
        if ($count != 1) {
            $endpoint = 'https://openlibrary.org/search.json?';
            $url = $endpoint . 'isbn=' . $isbn;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.1.2) Gecko/20090729 Firefox/3.5.2 GTB5');
            curl_setopt($ch, CURLOPT_URL, $url);
            $result = curl_exec($ch);

            if (!$result) {
                return 'connection failure';
            }

            curl_close($ch);
            $book = json_decode($result, true);

            // store openlibrary info to database
            Book::create([
                'isbn' => $isbn,
                'title' => $book['docs'][0]['title'],
                'pages' => $book['docs'][0]['number_of_pages_median'],
                'affiliate_link' => 'https://bookshop.org/a/100045/' . $isbn,
                'open_library' => $result,
            ]);
        }

        // return database info
        return Book::where('isbn', $isbn)->first();
    }
}
