<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Role;
use App\Cake;

/**
 * Class CakeTsarController
 * @package App\Http\Controllers
 */
class CakeTsarController extends Controller
{
    /** @var Role */
    protected $role;

    /**
     * CakeTsarController constructor.
     * @param Role $role
     */
    public function __construct(
        Role $role
    ) {
        $this->role = $role;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::check()) {
            $role = $this->role->getUserRole(Auth::user()->id);
            if ($role == Role::CAKE_TSAR) {
                return view('admin/view', [
                    'message' => false
                ]);
            }
        }
        return Redirect::to('/login');
    }

    /**
     * Render the form to add a new cake
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('admin/add', []);
    }

    /**
     * Save a new cake
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function save(Request $request)
    {
        /** @var Cake $cake */
        $cake = new Cake();
        $title = $request->input('title');
        $image = $request->input('image');
        $description = $request->input('description');

        $cake->name = $title;
        $cake->image_path = $image;
        $cake->description = $description;
        $cake->save();

        return view('admin/view', [
           'message' => 'Successfully added new cake.'
        ]);
    }
}
