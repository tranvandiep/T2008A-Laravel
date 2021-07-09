<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class PermissionController extends Controller {
	// public function __construct() {
	// 	$this->middleware('auth');
	// 	$this->middleware('permission');
	// }

	public function viewRoles(Request $request) {
		$roleList = DB::table('roles')->get();

		return view('permission.role')->with([
				'roleList' => $roleList,
				'index'    => 0
			]);
	}

	public function viewSetting(Request $request) {
		$routeList = DB::table('routes')->get();

		$permissionList = DB::table('permission')
			->where('role_id', $request->id)
			->get();

		$list = [];
		foreach ($routeList as $item) {
			$status = 0;
			foreach ($permissionList as $item2) {
				if ($item2->route_id == $item->id) {
					$status = $item2->status;
					break;
				}
			}
			$list[] = [
				'route_id'    => $item->id,
				'route_title' => $item->route_title,
				'route_name'  => $item->route_name,
				'status'      => $status
			];
		}

		return view('permission.setting')->with([
				'index'          => 0,
				'permissionList' => $list,
				'role_id'        => $request->id
			]);
	}

	public function test(Request $request) {
		$routeList = DB::table('routes')->get();

		return view('permission.test')->with([
				'routeList' => $routeList,
				'index'     => 0
			]);
	}

	public function save(Request $request) {
		$status   = $request->status;
		$role_id  = $request->role_id;
		$route_id = $request->route_id;

		$data = DB::table('permission')
			->where('route_id', $route_id)
			->where('role_id', $role_id)
			->get();

		if ($data != null && count($data) > 0) {
			//update
			DB::table('permission')
				->where('route_id', $route_id)
				->where('role_id', $role_id)
				->update([
					'status' => $status
				]);
		} else {
			//insert
			DB::table('permission')->insert([
					'route_id' => $route_id,
					'role_id'  => $role_id,
					'status'   => $status
				]);
		}
	}
}
