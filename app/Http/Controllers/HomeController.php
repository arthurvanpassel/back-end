<?php
namespace App\Http\Controllers;
use Request;
use Validator;
use Auth;
use Redirect;
use App\Item;

class HomeController extends Controller {
    public function getIndex() {
        $user = Auth::user();
        $items = $user->items;

        return view('home', array(
            'items' => $items,
            'user' => $user
        ));
    }

    public function postIndex() {
        $id = request::get('id');
        $item = Item::findOrFail($id);
        $userId = Auth::user()->id;

        // Mark item (but only when it's the right user)
        if ($item->owner_id == $userId)
        $item->mark();

        return redirect::route('home');
    }

    public function getDelete(Item $task) {
        $userId = Auth::user()->id;
        
        // (Soft) delete item (but only when it's the right user)
        if ($task->owner_id == $userId)
            $task->delete();

        return redirect::route('home');
    }

    public function getDone() {
        $items = Auth::user()->items;
        $user = Auth::user();

        return view('done', array(
            'items' => $items,
            'user' => $user
        ));
    }

    public function postDone() {
        $id = request::get('id');
        $item = Item::findOrFail($id);
        $userId = Auth::user()->id;

        // Mark item (but only when it's the right user)
        if ($item->owner_id == $userId)
        $item->mark();

        return redirect::route('done');
    }

    public function getNew() {
        $user = Auth::user();

        return view('new', array(
            'user' => $user
        ));
    }

    public function postNew() {
        $rules = array(
            'name' => 'required|min:3|max:255', 
            'due_date' => 'required|date|after:yesterday',
            'comments' => 'max:500'
        );
        $validator = Validator::make(request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('new')->withErrors($validator);
        }

        $item = new Item;
        $item->name = request::get('name');
        $item->due_date = request::get('due_date');
        if (request::get('comments') == null) {
            $item->comments = '';
        }
        else {
            $item->comments = request::get('comments');
        }
        $item->owner_id = Auth::user()->id;
        $item->done = false;
        $item->deleted = false;
        $item->save();

        return redirect::route('home');
    }

    public function getEdit(Item $task) {
        $user = Auth::user();
        
        return view('edit', array(
            'item' => $task,
            'user' => $user
        ));
    }

    public function postEdit(Item $item) {
        $rules = array(
            'name' => 'required|min:3|max:255', 
            'due_date' => 'required',
            'comments' => 'max:255'
        );
        $validator = Validator::make(request::all(), $rules);

        if ($validator->fails()) {
            return Redirect::route('edit', $item->id)->withErrors($validator);
        }
        
        $item->name = request::get('name');
        $item->due_date = request::get('due_date'); 
        if (request::get('comments') == null) {
            $item->comments = '';
        }
        else {
            $item->comments = request::get('comments');
        }
        $item->save();

        return redirect::route('home');
    }
}