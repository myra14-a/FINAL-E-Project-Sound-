<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name', 'tagline', 'hero_title', 'hero_subtitle',
        'hero_description', 'phone', 'email', 'footer_text',
        'facebook_url', 'instagram_url', 'twitter_url', 'youtube_url',
    ];

    public static function current(): self
    {
        $settings = static::firstOrCreate(['id' => 1], [
            'site_name' => 'SOUND',
            'tagline' => 'Music for every mood',
            'hero_title' => 'Feel the heart beats',
            'hero_subtitle' => 'New single',
            'hero_description' => 'Discover the latest music, artists, albums and videos.',
            'footer_text' => 'Your music, your vibe.',
        ]);

        // Automatically update the previous template name on existing databases.
        if ($settings->site_name === 'DJoz') {
            $settings->update(['site_name' => 'SOUND']);
        }

        return $settings;
    }
}
