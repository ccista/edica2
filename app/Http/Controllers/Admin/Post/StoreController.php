<?php

namespace App\Http\Controllers\Admin\Post;
use App\Http\Requests\Admin\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request){
        $data = $request->validated();  
        return $this->service->store($data);        
    }
}
