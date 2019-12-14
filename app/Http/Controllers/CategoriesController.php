<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    public function getPopular()
    {
        $query = 'SELECT `categories`.`id` as `id`, `categories`.`name` as `name`, SUM(`posts_likes`.`likes_count`) as `sum`
FROM `categories`
LEFT JOIN `posts_has_categories`
ON `categories`.`id` = `posts_has_categories`.`id_category`
LEFT JOIN (
	SELECT `posts`.`id` AS `id`, COUNT(`likes`.`id`) AS `likes_count`
	FROM `posts`
	LEFT JOIN `likes`
	ON `posts`.`id` = `likes`.`id_post`
	GROUP BY `posts`.`id`) AS `posts_likes`
ON `posts_has_categories`.`id_post` = `posts_likes`.`id`
GROUP BY `categories`.`id`
ORDER BY `sum` DESC';
        
        $categories = DB::select($query);
        return view('pages.categories', ['categories' => $categories]);
    }
}
