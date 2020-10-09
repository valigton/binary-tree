<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tree;

class TreeController extends Controller
{
  function index() {
    $tree = Tree::all();
    return view('tree', ['tree' -> $tree]);
  }

  function store(Request $request) {
    $tree = new Tree();
    $id = $request->input('id');
    $score = $request->input('pontos');

    addToTree($tree, $id, $score);
    redirect('/');
  }
  
  function addToTree($tree, $id, $score) {
    if($tree->id) {
      if($id > $tree->id) {
        addToTree($tree, $id, $score);
      } else {
        addToTree($tree, $id, $score);
      }
    } else {
      $tree->id = $id;
      $tree->right = $tree;
      $tree->left = $tree;
    }

  }

}
