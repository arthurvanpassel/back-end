<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {
    public function mark() {
        // If the item is done, we unmark it and it becomes false (=undone). If it's not done, we mark it and it becomes done (=true)
        $this->done = $this->done ? false : true;
        $this->save();
    }

    public function delete() {
        $this->deleted = true;
        $this->save();
    }
}