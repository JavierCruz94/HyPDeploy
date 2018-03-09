<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Customer;
use App\Consultant;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function watchCustomers()
    {
        $customers = DB::table('customers')
            ->select('customers.id_customer', 'customers.name', 'customers.code', 'customers.created_at', DB::raw('SUM(if(requests.solved=0,1,0)) as cantReq'), DB::raw('max(requests.created_at)as ultReq'))
            ->leftjoin('requests', 'customers.id_customer', '=', 'requests.id_customer')
            ->groupby('code')
            ->orderby('code', 'asc')
            ->get();

        return view('pages.admin.watch') ->with(['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCustomerForm()
    {
        return view('pages.admin.addCustomer');
    }

    public function addCustomer(Request $request)
    {
        //Check if user or email is already taken
        $takenUser = DB::table('users')
            ->where('username', $request->username)
            ->orwhere('email', $request->email)
            ->get();

        //Check different client code and name in customers
        $takenCust = DB::table('customers')
            ->where('code', $request->code)
            ->orwhere('name', $request->nombre)
            ->get();

        //If there is some duplicated user with some data
        if (sizeof($takenUser)>0 || sizeof($takenCust)>0)
        {
            //echo json_encode(sizeof($takenUser));
            return redirect('/adminAddCustomer')->with('fail','ERROR: Verificar datos, existen duplicados');
        }
        else
        {
            //Create user
            User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'role' => 'customer'
            ]);

            //Find new user ID
            $userID = DB::table('users')->where('username', $request->username)->value('id');

            //Create the customer with the ID previously found
            Customer::create([
                'id_customer' => $userID,
                'code' => $request->code,
                'name' => $request->nombre,
                'registeredBy' => 1
            ]);

            return redirect('/adminAddCustomer')->with('success', 'Cliente agregado!');
        }
    }

    public function addConsultantForm() {
        return view('pages.admin.addConsultant');
    }

    public function addConsultant(Request $request) {

        //Check if user or email is already taken
        $takenUser = DB::table('users')
            ->where('username', $request->username)
            ->orwhere('email', $request->email)
            ->get();
        //Check if consultant is already added
        $takenCons = DB::table('consultants')
            ->where([['firstname', $request->firstname],
                    ['lastname', $request->lastname]])
            ->get();
        if (sizeof($takenUser)>0 || sizeof($takenCons)>0)
        {
            return redirect('/adminAddConsultant')->with('fail','ERROR: Verificar datos, existen duplicados');
        }
        else{
            User::create([
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'email' => $request->email,
                'role' => 'consultant'
            ]);

            //encontrar su ID
            $userID = DB::table('users')->where('username', $request->username)->value('id');

            Consultant::create([
                'id_consultant' => $userID,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'level' => $request->nivel,
                'registeredBy' => 1
            ]);

            return redirect('/adminAddConsultant')->with('success','Consultor agregado!');
        }

    }

    public function getRequestsConsultants() {
        $requests = DB::table('requests')
            ->join('customers', 'requests.id_customer', '=', 'customers.id_customer')
            ->where('id_consultant', '=', null)
            ->get();
        $consultants = DB::table('consultants')
            ->select('consultants.id_consultant', 'consultants.firstname', 'consultants.lastname', DB::raw('SUM(if(requests.solved=0,1,0)) as cantidad'))
            ->leftjoin('requests', 'consultants.id_consultant', '=', 'requests.id_consultant')
            ->groupby('consultants.id_consultant')
            ->get();

        $requestsAssigned = DB::table('requests')
            ->join('customers', 'requests.id_customer', '=', 'customers.id_customer')
            ->join('consultants', 'requests.id_consultant', '=', 'consultants.id_consultant')
            ->where([['requests.id_consultant', '<>', null],
                    ['solved','<>', 1]])
            ->get();
        return view('pages.admin.assignReq') ->with(['consultants' => $consultants, 'requests' => $requests, 'requestsAssigned' => $requestsAssigned]);
    }

    public function assignRequestToConsultant(Request $request) {

        DB::table('requests')
            ->where('id_request', $request->id_request)
            ->update(['id_consultant' => $request->selectCons]);


        return redirect('/adminAssignReq')->with('success','Consultor asignado!');
    }

    public function changeConsultant(Request $request) {
       DB::table('requests')
            ->where('id_request', $request->id_request)
            ->update(['id_consultant' => null]);


        return redirect('/adminAssignReq')->with('success','Vuelva a asignar el consultor');
    }
}
