<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TvshowCard extends Component
{
    public $tvShow;

    public function __construct($tvShow)
    {
        $this->tvShow = $tvShow;
    }

    public function render()
    {
        return view('components.tvshow-card');
    }
}
