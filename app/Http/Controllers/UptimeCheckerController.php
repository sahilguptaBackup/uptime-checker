<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\FirebaseDB;

class UptimeCheckerController extends Controller
{
    private $fc;

    public function __construct()
    {
        $this->fc = new FirebaseDB();
    }

    public function save(Request $request)
    {
        $inputs = $request->all();
        $inputs['id'] = (int) date('YzHisu');
        $inputs['ip_address'] = @$_SERVER['REMOTE_ADDR'];
        $inputs['created_at'] = date('F d, Y H:i:s') . ' - ' . date('e');
        $inputs['updated_at'] = date('F d, Y H:i:s') . ' - ' . date('e');
        $this->fc->fs('sites', $inputs);
        return redirect()->back();
    }

    public function list()
    {
        $data = [
            'collection' => 'sites',
            'limit' => 10
        ];
        $sites = $this->fc->fr($data);
        return view('welcome', compact('sites'));
    }
}
