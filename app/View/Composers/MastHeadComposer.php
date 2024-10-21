<?php

namespace App\View\Composers;

use Illuminate\View\View;

class MastHeadComposer {

    public function compose(View $view) {
        $mastHeadPhoto = null;
        $routeName = request()->route()->getName();

        switch ($routeName) {
            case 'job-listings.index':
                $mastHeadPhoto = asset('images/listings-bg.jpg');
                break;
        }

        $view->with('mastHeadPhoto', $mastHeadPhoto);
    }
}