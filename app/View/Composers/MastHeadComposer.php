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
            case 'employer.create':
                $mastHeadPhoto = asset('images/employer-bg.jpg');
                break;
            case 'my-job-listings.index':
                $mastHeadPhoto = asset('images/employer-jobs-bg.jpg');
                break;
            case 'my-job-listings.show':
                $mastHeadPhoto = asset('images/employer-jobs-bg.jpg');
                break;
            case 'my-job-listings.create':
                $mastHeadPhoto = asset('images/employer-add-jobs-bg.jpg');
                break;
            case 'my-job-listings.edit':
                $mastHeadPhoto = asset('images/employer-add-jobs-bg.jpg');
                break;
            case 'profile.edit':
                $mastHeadPhoto = asset('images/employer-bg.jpg');
                break;
        }

        $view->with('mastHeadPhoto', $mastHeadPhoto);
    }
}
