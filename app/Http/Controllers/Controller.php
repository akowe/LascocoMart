<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\FcmgProduct;
use App\Models\Reviews;
use App\Models\Categories;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingDetail;
use Auth;
use Validator;
use Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



}//class
