<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function __construct()
  {
  }
  public function all(){
//      dd('asdsad');
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,'https://fakestoreapi.com/products');
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
      $response = curl_exec($ch);
      $data = json_decode($response);
//      dd($data);
      curl_close($ch); // Close the connection
      $partial = (object)null;
      $partial->main_title = 'Products';
      $partial->table_title = 'All Products';
      return view('admin.apiProducts.index' , compact('data','partial'));
  }
}
