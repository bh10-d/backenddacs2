<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    //
    public function load_comment(Request $request)
    {
        $id_product = $request->id;
        $comment = Comment::where('id_product', $id_product)->get();
        $output = '';
        foreach ($comment as $key => $comm) {
            $output .= '
            <div class="comment">
                        <div class="media style_comment">
                            <a class="pull-left mr-2" href="#">
                                  <img class="media-object" src="https://1.bp.blogspot.com/-m3UYn4_PEms/Xnch6mOTHJI/AAAAAAAAZkE/GuepXW9p7MA6l81zSCnmNaFFhfQASQhowCLcBGAsYHQ/s1600/Cach-Lam-Avatar-Dang-Hot%2B%25281%2529.jpg" alt="Image" width="60">
                            </a>
                            <div class="media-body">
                                <h5><b>' . $comm->comment_name . '</b></h5>
                                <p>' . $comm->comment_date . '</p>
                                <p>' . $comm->comment . '</p>
                                <p>
                                <button class="btn btn-secondary btn-sm" type="submit" hidden data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Phản hồi
                                </button>
                                </p>
                                <div id="notify_comment_replay"></div>
                                <input type="hidden" name="replay_sach_id" class="replay_sach_id" value="{{$sach->id}}">
                                <div class="collapse" id="collapseExample">
                                <textarea style="resize:none;width:90%;" class="input xlarge replay_content" rows="4" id="comment-box" name="comment-box" placeholder="Nhập nội dung..."></textarea>
                                <button style="margin-right:30px;" id="submit_comment" class="btn btn-primary pull-right btn-sm send-comment-replay" name="submit_comment" type="submit" onClick="">Bình luận</button>
                                </div>
                            </div>
                        </div>
            </div><p></p>
            ';
        }
        echo $output;
    }
    public function send_comment(Request $request)
    {
        $id_product = $request->id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->id_product = $id_product;
        $comment->save();
        // DB::insert('insert into comment (comment, comment_name, id_product) values (?, ?, ?)', [$comment_content, $comment_name, $id_product]);
        // dd($request);
    }
}
