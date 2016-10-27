<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use common\models\Country;

class CountryController extends Controller
{
	public function actionIndex()
	{
		$query = Country::find();

		$pagination = new Pagination([
			'defaultPageSize' => 5,
			'totalCount' => $query->count(),
		]);

		$countries = $query->orderBy('name')
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();

		// get the row whose primary key is "US"
		$country = Country::findOne('US');
		
		// modifies the country name to be "U.S.A." and save it to database
		$country->name = 'U.S.A.';
		$country->save();

		return $this->render('index', [
				'countries'=>$countries,
				'pagination'=>$pagination,
				'country'=>$country,
		]);
	}
}

?>