<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

abstract class BaseController extends Controller
{
    protected function __construct()
    {
    }

    /** actionに対して指定したView/Viewに渡すデータを渡す
     *
     * @return mixed
     * @access protected
     */
    protected function render(array $view_vars = [])
    {
        return view($this->getViewRoute(), $view_vars);
    }

    /** ルートからアクション名を取得する
     *
     * @return str 
     * @access protected
     */
    protected function getViewRoute(): string
    {
        $action = class_basename(Route::currentRouteAction());
        return snake_case(str_replace('Controller@','/', $action));
    }

}
