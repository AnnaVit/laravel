<?php


namespace App\Http\Controllers;


class NewsController extends Controller
{
    private $categories = [
        'sport' =>['sport_news1', 'sport_news2'],
        'art' => ['art_news1', 'art_news2'],
        'science' => ['science_news1', 'science_news2'],
    ];


    public function categories(){
        $categories = "<ul>";
        foreach ($this->categories as $category=>$val){
            $url = route('news::category::nameCategory', ['nameCategory' => $category]);
            $categories.= "<li><a href='$url'>{$category}</a></li>";
        }
        $categories.="</ul>";
        echo $categories;
    }

    public function news(string $category){
        echo $category;
        $news = "<ul>";
        foreach ($this->categories[$category] as $newsCategory=>$value){
            $url = route('news::category::nameCategory::id',
                ['nameCategory' => $category, 'id' => $newsCategory]);
            $news.= "<li><a href='$url'>{$value}</a></li>";
        }
        $news.="</ul>";
        echo $news;

    }

    public function article(string $category, int $id){
        $article = $this->categories[$category][$id];
        echo $article;
    }
}
