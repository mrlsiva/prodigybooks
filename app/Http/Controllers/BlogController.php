<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\BlogComments;
use App\BlogCommentReplies;
use App\User;
use App\Mail\CommentMail;
use Auth;
use Session;
use DB;
use Mail;

class BlogController extends Controller
{
    public function viewPosts(Request $request)
    {
        $url_segment = \Request::segment(2);
        // dd($request->path(), $url_segment, "Test");
        $blogData = Blog::where("slug",$url_segment)->first();
        
        $blogComments = BlogComments::with('blogcommentreplies')->where("post_id",$blogData->id)->where('comment_status',1)->get();
        //$comments = App\Post::find(1)->comments()->where('title', 'foo')->first();
        $previous_post = Blog::where("id",$blogData->id-1)->first();
        $categories = DB::table('categories')->get();
        // dd($blogComments);
        // dd($blogData->id-1, $previous_post);
        return view('viewPost')->with('blogData', $blogData)
                ->with('blogComments', $blogComments)
                ->with('categories', $categories);
    }

    public function viewAllPosts(Request $request)
    {
        // dd(Blog::all(), "Test");
        $blogData = Blog::all(); //find(1)
        $categories = DB::table('categories')->get();
        return view('blogPage')->with('blogData', $blogData)->with('categories', $categories);
    }

    public function comments(Request $request){
        
        // dd($request->all(), "Test", BlogComments::all());

        $comments = new BlogComments();
        $comments->comments = $request->input('comment');
        $comments->name = $request->input('name');
        $comments->email = $request->input('email');
        $comments->website = $request->input('website');
        $comments->post_id = $request->input('post_id');
        if(Auth::user()){
            $comments->user_id = Auth::id();
        }        
        $comments->save();
		
		$admin_details = User::where('role_id',1)->first();

        
                $data['email_type'] = 'blog_comment';
                $data['to_email'] = $admin_details->email;
                $data['to_name'] = $admin_details->name;
                /* $data['cc_email'] = $data['to_email'];
                $data['cc_name'] = 'ccSupplier'; */
                $data['subject'] = "New Comment";
                $data['created_by'] = Auth::user()->name;
                $data['comment'] = $request->input('comment');
                sendCommonMail('blog', $data);
        $returnPost = Blog::find($request->input('post_id'));
        
        // dd($returnPost);
        $message = "Comment Created Succesfully!!";
        Session::flash('commentMessage', $message); 
        return redirect('posts/'.$returnPost->slug);
    }

    public function replyComments(Request $request){
        
        // dd($request->all(), "Test");
        try{
            $reply = new BlogCommentReplies();
            $reply->comment_id = $request->input('comment_id');
            $reply->description = $request->input('reply');
            if(Auth::user()){
                $reply->user_id = Auth::id();
            }        
            $reply->save();

            $message = $request->input('reply');
            return $message;
        }
        catch(\Exception $e){
            return $e;
        }
        
    }

}
