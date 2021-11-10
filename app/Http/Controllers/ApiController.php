<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    function apiwork()
    {
        $search_key = ($_GET['search'] ?? '');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "http://www.omdbapi.com/?s={{$search_key}}&apikey=20f68bdb");
        $movies =  json_decode($response->getBody(), true);
        // print_r($movies);
        // print_r(json_decode($response->getBody(), true));
        // die();
        return view('forntend.apisearch', compact('movies'));
    }
    function productwork()
    {
        $productinfo = Product::all();
        return ProductResource::collection($productinfo);
    }
}
