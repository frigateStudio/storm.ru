<?php


class ReviewController
{

    public function actionReview($page = 1)
    {
        $idActiveMenu = 5;

        $reviewBestList = Review::getBestListReviews();
        $reviewList = Review::getActiveListReviews($page);
        $total = Review::getTotalStocks();
        $pagination = new Pagination($total, $page, Review::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/review.php');
        return true;
    }
}