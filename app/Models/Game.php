<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $table = 'games';

    protected $fillable = ['name', 'slug', 'category_id', 'image', 'image_thumb',
        'description', 'active', 'new'];

    protected $casts = [
        'active' => 'boolean',
        'new' => 'boolean',
    ];

    /**
     * Returns category of game
     *
     * @return App\Models\Category
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }



    /**
     * Model events
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        /**
         * Triggered when Game model is saved
         */
        static::saving(function ($model) {

            /**
             * If discounted price is empty string, set it to null
             */
/*            if (empty(trim($model->discounted_price))) {
                $model->discounted_price = null;
            }*/
        });
    }

    public function games()
    {
        return $this->belongsToMany('App\Models\Order', 'order_game');
    }
}
