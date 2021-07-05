<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class PeopleViewModel extends ViewModel
{
    public $popularPeople, $page;

    public function __construct($popularPeople, $page)
    {
        $this->popularPeople = $popularPeople;
        $this->page = $page;
    }

    public function popularPeople()
    {
        return collect($this->popularPeople)->map(function ($person) {
            return collect($person)->merge([
                'profile_path' => $person['profile_path'] ? 'https://image.tmdb.org/t/p/w235_and_h235_face/' . $person['profile_path'] : asset('img/no-profile-image-sm.png'),
                'known_for' => collect($person['known_for'])->where('media_type', 'tv')->pluck('name')->union(
                    collect($person['known_for'])->where('media_type', 'movie')->pluck('title')
                )->implode(', '),
            ])->only(['id', 'name', 'profile_path', 'known_for']);
        });
    }
 
    public function previous()
    {
        return $this->page > 1 ? $this->page - 1 : null;
    }

    public function next()
    {
        return $this->page < 500 ? $this->page + 1 : null;
    }
}
