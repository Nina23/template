<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;
use App\User;

class MenusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $menu;


	public function __construct(Menu $menu)
	{

		$this->menu = $menu;


	}
	public function index()
	{
		$items = $this->menu->orderBy('order', 'asc')->where('lang', 'en')->get();
		$menus = $this->menu->getMenuHTML($items);

		return view('admin.menus.index', compact('menus'));

	}

	public function save() {
		$this->menu->changeParentById($this->menu->parseJsonArray(json_decode(Input::get('json'), true)));

		return Response::json(array('result' => 'success'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.menus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		menu::create($request->all());
		return redirect('admin/menus')->with('success', Lang::get('message.success.create'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$menu = Menu::findOrFail($id);
		return view('admin.menus.show', compact('menu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menu = Menu::findOrFail($id);
		return view('admin.menus.edit', compact('menu'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		//$this->validate($request, ['name' => 'required']); // Uncomment and modify if needed.
		$menu = Menu::findOrFail($id);
		$menu->update($request->all());
		return redirect('admin/menus')->with('success', Lang::get('message.success.update'));
	}

	/**
    	 * Delete confirmation for the given Menu.
    	 *
    	 * @param  int      $id
    	 * @return View
    	 */
    	public function getModalDelete($id = null)
    	{
            $error = '';
            $model = '';
            $confirm_route =  route('admin.menus.delete',['id'=>$id]);
            return View('admin/layouts/modal_confirmation', compact('error','model', 'confirm_route'));

    	}

    	/**
    	 * Delete the given Menu.
    	 *
    	 * @param  int      $id
    	 * @return Redirect
    	 */
    	public function getDelete($id = null)
    	{
    		$menu = Menu::destroy($id);

            // Redirect to the group management page
            return redirect('admin/menus')->with('success', Lang::get('message.success.delete'));

    	}



}