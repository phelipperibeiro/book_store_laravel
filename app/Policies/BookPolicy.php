<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    
    public function before(User $user, $ability)
    {
        if($user->can('book_manage_all')){
            return true;
        }
    }
    
    public function manageBook(User $user, Book $book)
    {
        return $user->id == $book->user_id; // true or false
    }
    
    
    
    
    
    
    
}
