<?php

namespace Classes;

use Classes\dbCon;

class Advertisment extends dbCon
{


	//Get adverts that correspond to user function

	public function getAdvert($userName)
	{
		$parameters = [
		 ':userName' => $userName, 
		];

		return $this->fetchAll('SELECT * FROM advert WHERE userName = :userName', $parameters);
	}

	// //Add advert method function

	public function addAdvert ( $userName, $price, $area, $availableFor, $squareMeters)
	{
		$parameters = [
			':userName' => $userName,
			':price' => $price,
			':area' => $area,
			':available_for' => $availableFor,
			':square_meters' => $squareMeters,
		];

		return $this->execute('INSERT INTO advert (userName, price, area, available_for, square_meters) 
		VALUES (:userName, :price, :area, :available_for, :square_meters)', $parameters); 
	}

	//Remove advert function

	public function removeAdvert ( $advId, $userName)
	{
		$parameters = [
			':adv_id' => $advId,
			':userName' => $userName,
		];

		return $this->execute('DELETE FROM advert WHERE adv_id = :adv_id AND userName = :userName', $parameters); 
	}
}