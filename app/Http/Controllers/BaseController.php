<?php
namespace App\Http\Controllers;
use App\AppConst\Constants;
use Assets;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;
use WindowsAzure\MediaServices\Models\Asset;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class BaseController extends Controller
{
    protected $view;
    protected $limit;
    protected $model;
    protected $controller;
    protected  $action;
    public function __construct()
    {
        if(!is_null(Route::getCurrentRoute())) {
            $route = class_basename(Route::getCurrentRoute()->getActionName());
            list($controller, $action) = explode('@', $route);
            $controller = str_replace('controller', '', strtolower($controller));
            $action = strtolower($action);
            $this->controller = $controller;
            $this->action = $action;
            $this->view = $this->getViewDir() . '.' . $controller . '.' . $action;
            $this->view =  $this->getViewDir() . '.' . $controller . '.' . $action;
            $this->limit = Constants::PAGE_RECORD;
            if(($limit = request('limit')) && intval($limit) > 0 ){
                $this->limit = $limit;
            }
        }
    }
    protected function view($data = null)
    {
        echo view($this->view)->with($data);
    }
    protected function getViewDir()
    {
        return Constants::VIEW_DIR;
    }
    public function index()
    {
        $this->view();
    }
    public function form($id = null)
    {
        return response()->view(Constants::VIEW_DIR . '.errors.404', [], '404');
    }
    public function complete()
    {
    }
    public function delete()
    {
        if($data = request()->input())
        {
            $model = $this->model;
            $ids = explode(',', $data['id']);
            if ($model::whereIn('id', $ids)->update(['deleted' => 1])){
                return redirect(route($this->controller . '.index'))->with('success', trans('lang.success'));
            }
        }
    }

    public function deleteRecord($modelName)
    {
        $model = '\App\Models\\' . $modelName;
        $data  = Input::all();
        $id = $data['id'];
        if($record = $model::where('id',$id )->first()) {
            DB::transaction(function () use ($record) {
                try {
                    $record->update(['deleted' => 1]);
                } catch (\PDOException $e) {
                    throw $e;
                }
            });
        }
    }

}