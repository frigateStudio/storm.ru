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

    public function actionAddReview()
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $review = $_POST['review'];
        Review::recordReview($name, $email, $review);
        echo "Благодарим за отзыв! Ваше мнение очень важно для нас! Он будет опубликован
        в ближайшее время.";
        return true;
    }
}