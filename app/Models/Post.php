<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'content', 'user_id', 'category_id',
    ];

    /**
     * Get the category of the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the author of the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Html attribute contains content of post but parsed.
     *
     * @return mixed
     */
    public function getHtmlAttribute()
    {
        $parsedown = new Parsedown();
        return $parsedown->text($this->content);
    }

    /**
     * Get a resume of content post.
     *
     * @param  int  $max_words
     * @param  string  $ending
     * @return string
     */
    public function getExcept($max_words = 100, $ending = "...")
    {
        $text = strip_tags($this->html);
        $words = explode(' ', $text);

        if (count($words) > $max_words) {
            return implode(' ', array_slice($words, 0, $max_words)) . $ending;
        }

        return $text;
    }
}
