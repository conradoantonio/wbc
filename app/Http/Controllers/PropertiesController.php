<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\Project;
use \App\Models\Property;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    /**
     * Show the main view.
     *
     */
    public function index(Request $req)
    {
        $menu = "Propiedades";
        $title = "Propiedades";
        $filters = [ 
            'user' => auth()->user(), 
            'limit' => 100, 
            'ordenar_fecha' => null,
        ];

        $items = Property::filter( $filters )->orderBy('id', 'desc')->get();
        $projects = Project::all();
        $owners = User::where('role_id', 2)->get();

        if ( $req->ajax() ) {
            return view('properties.table', compact('items'));
        }
        return view('properties.index', compact('items', 'projects', 'owners', 'menu', 'title'));
    }

    /**
     * Show the form for creating/editing a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function form($id = 0)
    {
        $title = "Formulario de Propiedades";
        $menu = "Propiedades";
        $item = null;
        $filters = [ 'user' => auth()->user(), 'roles' => [2] ];
        $owners = User::filter( $filters )->get();
        $projects = Project::all();

        if ( $id ) {
            $item = Property::find($id);
        }
        return view('properties.form', compact('item', 'projects', 'owners', 'menu', 'title'));
    }

    /**
     * Show the rows acording to the filters given for user.
     *
     */
    public function filter( Request $req )
    {
        $extraFilters = [ 
            'user' => auth()->user(), 
        ];

        $req->request->add( $extraFilters );
        
        $items = Property::filter( $req->all() )->orderBy('id', 'desc')->get();

        return view('properties.table', compact('items'));
    }

    /**
     * Get the state account from a property
     *
     */
    public function stateAccount( Request $req )
    {
        $extraFilters = [ 
            'user' => auth()->user(),
        ];

        $req->request->add( $extraFilters );
        
        $item = Property::filter( $req->all() )->where('id', $req->id)->with(['owner', 'payments.status', 'installments.status'])->first();

        if( !$item ) { return response(['msg' => 'Seleccione una propiedad válida para continuar', 'status' => 'error'], 404); }

        return $item;
    }

    /**
     * Save a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $req)
    {
        $owner = User::where('id', $req->owner_id)->where('role_id', 2)->first();

        $project = Project::find($req->project_id);
        if (! $project ) { return response(['msg' => 'Seleccione un proyecto para continuar', 'status' => 'error'], 404); }

        $photo = $this->uploadFile($req->file('photo'), 'img/propiedades', true);

        $item = New Property;

        $owner ? $item->user_id = $owner->id : '';
        $item->project_id       = $project->id;
        $item->name             = $req->name;
        $item->description      = $req->description;
        $photo ? $item->photo   = $photo : '';
        $item->price            = $req->price;
        $item->monthly_payment  = $req->monthly_payment;

        $item->save();

        return response(['msg' => 'Registro guardado correctamente', 'url' => url('propiedades'), 'status' => 'success', 'data' => $item ], 200);
    }

    /**
     * Edit a resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $item = Property::find($req->id);
        if (! $item ) { return response(['msg' => 'No se encontró el registro a editar', 'status' => 'error'], 404); }

        $project = Project::find($req->project_id);
        if (! $project ) { return response(['msg' => 'Seleccione un proyecto para continuar', 'status' => 'error'], 404); }

        $photo = $this->uploadFile($req->file('photo'), 'img/propiedades', true);

        // $owner ? $item->user_id = $owner->id : '';// El usuario no se puede editar, esto se hará en otro proceso de asignación de usuario
        $item->project_id       = $project->id;
        $item->name             = $req->name;
        $item->description      = $req->description;
        $photo ? $item->photo   = $photo : '';
        $item->price            = $req->price;
        $item->monthly_payment  = $req->monthly_payment;

        $item->save();

        return response(['msg' => 'Registro actualizado correctamente', 'url' => url('propiedades'), 'status' => 'success', 'data' => $item], 200);
    }

    /**
     * Change the status of the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $req)
    {
        $url = 'eventos?vigencia=';
        $item = Evento::whereIn('id', $req->ids)
        ->first();

        if ( $item ) {
            $url .= $item->fecha_proxima ? 'activos' : 'pasados';

            $item->delete();
            return response(['msg' => 'Éxito eliminando '.$msg, 'url' => url($url), 'status' => 'success'], 200);
        } else {
            return response(['msg' => 'Error al cambiar el status de '.$msg, 'status' => 'error', 'url' => url($url)], 404);
        }
    }
}
