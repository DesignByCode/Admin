<?php

namespace DesignByCode\Admin\Http\Controllers\Api\Admin;


use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DesignByCode\Admin\Models\Product;
use DesignByCode\Admin\Models\Category;
use CyrildeWit\EloquentViewable\Support\Period;

class ChartsController extends Controller
{

    public function categories_added($days = 30)
    {
        $day1 = Carbon::parse('now')->subDays($days)->startOfDay();
        $day2 = Carbon::parse('now')->endOfDay();

        $products = Category::select($this->querySelect())
            ->whereBetween('created_at', [$day1, $day2])
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        return $this->dataLoop($products);
    }

    public function users_added($days = 30)
    {
        $day1 = Carbon::parse('now')->subDays($days)->startOfDay();
        $day2 = Carbon::parse('now')->endOfDay();

        $users = User::select($this->querySelect())
            ->whereBetween('created_at', [$day1, $day2])
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        return $this->dataLoop($users);
    }

    public function products_count()
    {
        $day1 = Carbon::parse('now')->subDays(30)->startOfDay();
        $day2 = Carbon::parse('now')->endOfDay();

        $users = Product::select($this->querySelect())
            ->whereBetween('created_at', [$day1, $day2])
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        return $this->dataLoop($users);
    }

    public function single_products_count($id)
    {
        $day1 = Carbon::parse('now')->subDays(30)->startOfDay();
        $day2 = Carbon::parse('now')->endOfDay();

        $product = Product::find($id)->views()
            ->select($this->querySelect('viewed_at'))
            ->whereBetween('viewed_at', [$day1, $day2])
            ->orderBy('date', 'asc')
            ->groupBy('date')
            ->get();

        return $this->dataLoop($product);
    }

    /**
     * @param $model
     * @return \Illuminate\Http\JsonResponse
     */
    protected function dataLoop($model) {

        $labels = [];
        $rows = [];

        foreach ($model as $mod) {
            $labels[] = $mod->date;
            $rows[] = $mod->count;
        }

        $data = [
            'labels' => $labels,
            'rows' => $rows
        ];

        return  response()->json(['data' => $data]);
    }

    /**
     * @return array
     */
    protected function querySelect($type = 'created_at') {
        return [ DB::raw("count(id) as count, DATE_FORMAT($type, '%d %M') as date") ];
    }
}
