<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Http\Resources\RestaurantResource;
use App\Http\Requests\RestaurantRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class RestaurantApiController extends Controller
{
    public function index() {
        // return Restaurant::all();
        return RestaurantResource::collection(Restaurant::all());
    }

    /** GET(read) */
    public function show(Restaurant $restaurant)
    {
        return new RestaurantResource($restaurant);
    }

    /** POST(create) */
    public function store(RestaurantRequest $request)
    {
        $data = $request->validated();
        $restaurant = Restaurant::create($data);
        return new RestaurantResource($restaurant);
    }

    /** PUT(update) */
    public function update(RestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();
        $restaurant->update($data);
        return new RestaurantResource($restaurant);
    }

    /** DELETE(delete) */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        // 第一引数にはレスポンスボディがありますが、この場合は空の文字列""が指定されています
        // 第二引数の204は、HTTPステータスコードとして「NoContent」を示しており、成功したがレスポンスボディは返さないことを意味しています
        return response("", 204);
    }

    /** 
     * Search restaurants and return list.
     */
    public function search(Request $request)
    {
        $keyword = $request->search;

        if ($keyword == null || $keyword == "") {
            return [];
        }

        $totalList = DB::table('restaurants')
                ->select('id', 'name', 'address')
                ->where('name', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "%{$keyword}%")
                ->orWhere('address', 'like', "%{$keyword}%")
                ->get();

        return $totalList;
    }
}
