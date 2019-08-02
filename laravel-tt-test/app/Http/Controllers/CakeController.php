<?php

namespace App\Http\Controllers;

use App\Cake;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class CakeController
 * @package App\Http\Controllers
 */
class CakeController extends Controller
{
    /** @var Role */
    protected $role;

    /**
     * CakeController constructor.
     * @param Role $role
     */
    public function __construct(
        Role $role
    ) {
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $isCakeTsar = false;
        $cakes = Cake::all();
            if (Auth::check()) {
                $role = $this->role->getUserRole(Auth::user()->id);
                if ($role == Role::CAKE_TSAR) {
                    $isCakeTsar = true;
                }
            }
      return view('cakes.index', compact('cakes', 'isCakeTsar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('cakes.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'description' => 'required',
                'name' => 'required',
                'image_path' => 'required',
            ]);

            Cake::create(
                request(
                    ['name', 'description', 'image_path']
                )
            );
            return redirect('/cakes')->with('success', 'New cake added.');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Cake $cake
     * @return \Illuminate\Http\Response
     */
    public function show(Cake $cake)
    {
      return view('cakes.show', ['cake' => $cake]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cake $cake
     * @return \Illuminate\Http\Response
     */
    public function edit(Cake $cake)
    {
        return view('cakes.edit')->with('cake', $cake);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Cake $cake
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Request $request, Cake $cake)
    {
        try {
            $this->validate($request, [
                'description' => 'required',
                'name' => 'required',
                'image_path' => 'required',
            ]);

            $cake->name = $request->name;
            $cake->description = $request->description;
            $cake->image_path = $request->image_path;

            $cake->save();

            return redirect('/cakes')->with('success', 'New cake added.');
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Cake $cake
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Cake $cake)
    {
        $cake->delete();
        return redirect('/cakes');
    }
}
