<?php

namespace Smarch\Watchtower\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class WatchtowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \Shinobi::can( config('watchtower.acl.watchtower.index', false) ) ) {
            $links = config('watchtower.dashboard');
            return view('watchtower::watchtower.index')
                    ->with('dashboard', $links)
                    ->with('title', config('watchtower.site_title') );
        }

        return view( config('watchtower.views.layouts.unauthorized'), [ 'message' => 'view the dashboard' ]);
    }
}
