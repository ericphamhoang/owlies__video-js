<?php
/**
 * Before using it
 * Install gifsicle
 * gifsicle -I fallback_gif.gif - get the info of gif file
 * If the frame delay is < 0.06 - round it up to 0.06
 */

namespace Owlies;

use Timber;

class VideoJS
{
    var $id;
    var $src;
    var $type;
    var $fallback_gif;
    var $fallback_gif_frame_count;

    public function __construct($id, $src, $fallback_gif, $fallback_gif_frame_count, $type = 'video/mp4')
    {
        $this->id = $id;
        $this->src = $src;
        $this->fallback_gif = $fallback_gif;
        $this->fallback_gif_frame_count = $fallback_gif_frame_count;
        $this->type = $type;
    }

    public function render()
    {
        Timber\Timber::$locations = __DIR__ . '/views';

        $context = Timber\Timber::get_context();

        $context['this'] = $this;

        Timber\Timber::render('videojs.twig', $context);
    }
}