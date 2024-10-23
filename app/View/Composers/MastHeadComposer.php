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
            case 'job-listings.show':
                $mastHeadPhoto = asset('images/details-bg.jpg');
                break;
            case 'job-listings.application.create':
                $mastHeadPhoto = asset('images/application-bg.jpg');
                break;
            case 'my-job-listings-application.index':
                $mastHeadPhoto = asset('images/my-application-bg.jpg');
                break;
        }

        $view->with('mastHeadPhoto', $mastHeadPhoto);
    }
}
