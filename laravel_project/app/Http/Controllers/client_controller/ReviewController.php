<?php

namespace App\Http\Controllers\client_controller;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    function add(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s', time());
        $review = new Review;
        $review->product_id = $request->product_id;
        $review->parent_path = '/';
        $review->name = $_COOKIE['name'];
        $review->email = $_COOKIE['email'];
        $review->phone_number = $_COOKIE['phone'];
        $review->content = $request->content;
        $review->created_at = $date;
        $review->save();
        $response = " <div class='review' data-id='$review->id'>
                        <strong><span class='name'>$review->name</span><span class='review-time'>$review->created_at</span></strong>
                        <p class='content'>$review->content</p>
                        <div>
                            <a class='reply-btn' href='javascript:void(0)' onclick=showformreply($review->id)>Reply</a>
                        </div>
                     </div>";
        $response .= "<div id='r$review->id' class='reply-list hide-list'></div>";
        $response .= " <div class='inputreply'>
                            <form method='post' autocomplete='off' id='r$review->id'>
                                 <input type='hidden' name='_token' value='$request->_token'>
                                <div class='mb-3'>
                                    <textarea class='form-control' name='reply_content' rows='3'></textarea>
                                </div>
                                <input type='hidden' name='product_id' value='$request->product_id'>
                                <a href='javascript:void(0)' class='sendreply-btn' onclick='sendreply($review->id)'>Send</a>
                                <a href='javascript:void(0)' onclick='closereplyform(this)'>Cancel</a>
                            </form>
                        </div>";
        return $response;
    }

    function addreply(Request $request)
    {
        $content = $request->reply_content;
        $review_id = $request->review_id;
        $product_id = $request->product_id;
        $name = $_COOKIE['name'];
        $email = $_COOKIE['email'];
        $phone_number = $_COOKIE['phone'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s', time());
        $review = new Review;
        $review->product_id = $product_id;
        $review->parent_id = $review_id;
        $review->parent_path = "/" . $review_id;
        $review->name = $name;
        $review->email = $email;
        $review->phone_number = $phone_number;
        $review->content = $content;
        $review->created_at = $date;
        $review->save();
        $response = "<div class='reply-content' data-id='$review->id' data-product='$product_id' data-parent='$review_id'>
                                <strong><span class='name'>$review->name</span><span class='review-time'>$review->created_at</span></strong>
                                <p class='content'>$review->content</p>
                                <a class='child-reply-btn' href='javascript:void(0)'>Reply</a>
                            </div>";
        return response()->json(array("response" => $response, "review_id" => $review_id));
    }

    function addchildreply(Request $request)
    {
        $content = $request->childreply_content;
        $review_id = $request->review_id;
        $reply_id = $request->reply_id;
        $parent_path = Review::where('id', $reply_id)->first()->parent_path;
        $product_id = $request->product_id;
        $name = $_COOKIE['name'];
        $email = $_COOKIE['email'];
        $phone_number = $_COOKIE['phone'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date('Y-m-d H:i:s', time());
        $review = new Review;
        $review->product_id = $product_id;
        $review->parent_id = $reply_id;
        $review->parent_path = $parent_path . '/' . $reply_id;
        $review->name = $name;
        $review->email = $email;
        $review->phone_number = $phone_number;
        $review->content = $content;
        $review->created_at = $date;
        $review->save();
        $response = "<div class='reply-content' data-id='$review->id' data-product='$product_id' data-parent='$review_id'>
                                <strong><span class='name'>$review->name</span><span class='review-time'>$review->created_at</span></strong>
                                <p class='content'>$review->content</p>
                                <a class='child-reply-btn' href='javascript:void(0)'>Reply</a>
                            </div>";
        return response()->json(array("response" => $response, "review_id" => $request->review_id));
    }

    function testtoken(Request $request)
    {
        return $request->_token;
    }
}
