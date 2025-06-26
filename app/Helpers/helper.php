<?php 

use App\Models\Portfolio;
if (!function_exists('site_title')) {
    function site_title() {
        return "Seo Tech Master";
    }
}
if (!function_exists('formatDate')) {
    function formatDate($date) {
        if(empty($date)){
            return "";
        } else {
            return date('F j, Y', strtotime($date));
        }
    }
}

if (!function_exists('getLatestPortfolioImages')) {
    function getLatestPortfolioImages(){
        $portfolioImages = Portfolio::where('status', 1) ->orderBy('id', 'DESC')->take(6)->pluck('image');
        return !empty($portfolioImages) ? $portfolioImages : [];
    }
}








    
