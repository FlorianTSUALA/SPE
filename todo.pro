$table->softDeletes();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');

                  https://appdividend.com/2022/02/28/laravel-file-upload/


 $request->validate([
        'title' => 'required:max:255',
        'overview' => 'required',
        'price' => 'required|numeric'
      ]);
$schedule->command('sanctum:prune-expired --hours=24')->daily();



    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at->format('m/d/Y'),
            'updated_at' => $this->updated_at->format('m/d/Y'),
        ];
    }



<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Blog;
use App\Http\Resources\Blog as BlogResource;

class BlogController extends BaseController
{

    public function index()
    {
        $blogs = Blog::all();
        return $this->sendResponse(BlogResource::collection($blogs), 'Posts fetched.');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $blog = Blog::create($input);
        return $this->sendResponse(new BlogResource($blog), 'Post created.');
    }

    public function show($id)
    {
        $blog = Blog::find($id);
        if (is_null($blog)) {
            return $this->sendError('Post does not exist.');
        }
        return $this->sendResponse(new BlogResource($blog), 'Post fetched.');
    }

    public function update(Request $request, Blog $blog)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $blog->title = $input['title'];
        $blog->description = $input['description'];
        $blog->save();

        return $this->sendResponse(new BlogResource($blog), 'Post updated.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return $this->sendResponse([], 'Post deleted.');
    }
}



{{ asset($item->photo) }}


//js/main.js

axios.defaults.headers.common = {
    'X-CSRF-TOKEN': your_csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': 'Bearer ' + yourToken,

};




$validatedData = $request->validate([
       'f_name' => 'required|min:8',
       'l_name' => 'required',
   ],
   [
    'f_name.required'=> 'Your First Name is Required', // custom message
    'f_name.min'=> 'First Name Should be Minimum of 8 Character', // custom message
    'l_name.required'=> 'Your Last Name is Required' // custom message
   ]
);

https://laracasts.com/discuss/channels/laravel/sanctum-api-logout?page=1&replyId=741713






















https://www.youtube.com/watch?v=_twnXKs-My4&t=784s

https://hackthestuff.com/article/laravel-8-sanctum-api-authentication-tutorial
https://www.youtube.com/watch?v=LgD9yyag7Lk
https://www.youtube.com/watch?v=HMyWg5JxrZg&t=286s

https://www.youtube.com/watch?v=ul3t3YpTXM8
https://www.youtube.com/watch?v=_twnXKs-My4
https://readerstacks.com/laravel-ajax-login-and-registration-with-example/
