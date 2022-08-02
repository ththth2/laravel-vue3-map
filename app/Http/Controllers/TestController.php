<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use SKAgarwal\GoogleApi\PlacesApi;
use Illuminate\Http\Request;
use Redirect;



class TestController extends BaseController
{

      public function create()
      {
          return view('create');
      }
      // function ดึงค่าจาก google map api
      public function store(Request $request){
        $data = $request->title;
        $query = $request->title;
        if($data != ""){
          $query = $data;
        } else {
          $query = "Bang Sue";
        }
        $next_page_token = "";
        $params = [
          'types' => 'restaurant',
          'language' => 'en',
          'pagetoken' => $next_page_token
      ];
        $googlePlaces = new PlacesApi('AIzaSyD3KIHgynG4jULm9FEWISLvYiv1cMcfheI');
        $response = $googlePlaces->textSearch($query, $params);
        $results = $response->all()['results']->all();
        return $results;
      }  
}
