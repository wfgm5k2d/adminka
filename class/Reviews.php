<?php

class Reviews {
	public static function getReviews()
	{
		$connect = new ACconfig();
        $connections = $connect->connect();

        $sql = 'SELECT * FROM reviews';
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $REVIEWS[$k] = $record;
            $k++;
        }
        if(!empty($REVIEWS))
            return $REVIEWS;
        else
            return false;
	}

    public static function getEditedReviews()
    {
        $connect = new ACconfig();
        $connections = $connect->connect();

        $sql = "SELECT * FROM reviews WHERE hide = '1'";
        $query = $GLOBALS['mysqli']->query($sql);

        $k = 0;
        while($record = mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
            $REVIEWSEDITED[$k] = $record;
            $k++;
        }
        if(!empty($REVIEWSEDITED))
            return $REVIEWSEDITED;
        else
            return false;
    }
}