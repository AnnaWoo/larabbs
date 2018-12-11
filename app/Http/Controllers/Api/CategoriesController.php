<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Transformers\CategoryTransformer;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        // 分类数据是集合，所以我们使用 $this->response->collection 返回数据
        return $this->response->collection(Category::all(), new CategoryTransformer());
    }
}
