<?php
namespace App\Http\Traits;

use Illuminate\Support\Carbon;

trait DTBtnTrait{
    public function modalEditBtn($id,$message="",$color="primary",$text="Edit"){
        $btn="<a onclick='showModal(\"$message\",$id); return false' class='btn btn-$color text-white'>$text</a>";
        return $btn;
    }

    public function deleteBtn($id="",$url="",$color="danger",$text="Hapus"){
        $btn="<a onclick='deleteData("."\"".url($url)."\"".",$id); return false' class='btn btn-$color text-white'>$text</a>";
        return $btn;
    }

    public function plainAnchor($url,$color="primary",$text="", $target=""){
        $btn="<a href='$url' class='btn btn-$color' target=$target>$text</a>";

        return $btn;
    }
}