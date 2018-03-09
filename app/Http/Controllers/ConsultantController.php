<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Report;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Facades\Mail;
use App\Mail\PDFReport;

class ConsultantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showNewRequests()
    {
        $id = \Auth::user()->id;


        $requests = DB::table('requests')
            ->leftJoin('customers', 'requests.id_customer', '=', 'customers.id_customer')
            ->leftJoin('consultants', 'requests.id_consultant', '=', 'consultants.id_consultant')
            ->where([['requests.id_consultant', '=', $id],
                ['requests.schedule', '=', '0'],
                ['requests.solved', '=', '0']])
            ->get();

        return view ('pages.consultant.newReq') ->with(['requests' => $requests]);
    }

    public function scheduleRequestForm(Request $request)
    {
        $requisition = DB::table('requests')
            ->where('id_request', '=', $request->id_request)
            ->get();
        return view ('pages.consultant.schedReq') ->with(['requisitions' => $requisition]);
    }

    public function scheduleRequest(Request $request)
    {
        DB::table('requests')
            ->where('id_request', $request->id_request)
            ->update(['date_scheduled' => $request->daySched,
                'time_scheduled' => $request->timeSched,
                'schedule' => 1]);

        return redirect('/newReq')->with('success','Cita agendada!');
    }

    public function registerVisitForm(Request $request)
    {
        $requests = DB::table('requests')
            ->where('id_consultant', 0)
            ->get();

        if (isset($request->success)){


            return view ('pages.consultant.regVisit')->with([
                'requests' => $requests,
                'arrivalHour' => '12:00',
                'departureHour' => '13:00',
                'comments' => '',
                'success' => $request->success]);
        }
        else {
            return view ('pages.consultant.regVisit')->with([
                'requests' => $requests,
                'arrivalHour' => '12:00',
                'departureHour' => '13:00',
                'comments' => '']);
        }

    }

    public function checkClientReq(Request $request)
    {
        //getting the ID of the consultant
        $idConsult = \Auth::user()->id;

        //getting the ID of the client searched
        $idClient = DB::table('customers')
            ->where('code', $request->codigo)
            ->orwhere('name', $request->codigo)
            ->orwhere('id_customer', $request->codigo)
            ->value('id_customer');

        //getting the requests not solved and assigned to the consultant
        $requests = DB::table('requests')
            ->where([['id_consultant', $idConsult],
                ['id_customer', $idClient],
                ['solved', 0]])
            ->get();

        if ($request->arrivalHour == null) {
            $arrival = "12:00";
        } else {
            $arrival = $request->arrivalHour;
        }
        if ($request->departureHour == null) {
            $departure = "13:00";
        } else {
            $departure = $request->departureHour;
        }

        return view('pages.consultant.regVisit')->with(['requests' => $requests,
            'arrivalHour' => $arrival, 'departureHour' => $departure,
            'comments' => $request->comments]);
    }

    public function showCalendar()
    {
        $idConsultant = \Auth::user()->id;

        $appointments = DB::table('requests')
            ->leftJoin('customers', 'requests.id_customer', '=', 'customers.id_customer')
            ->where([['id_consultant', '=', $idConsultant],
                ['schedule', '=', '1'],
                ['solved', '=', 0]])
            ->get();
        //echo $appointments;
        return view ('pages.consultant.calendar')->with(['appointments' => $appointments]);
    }

    public function generateReport(Request $request)
    {
        $requests = array();
        $checkboxes = $request->requests;
        foreach ($checkboxes as $checkbox)
        {
            $temp = DB::table('requests')
                ->where('id_request', $checkbox)
                ->get();

            array_push($requests, $temp);
        }

        $horas = array($request->arrivalHour, $request->departureHour);

        if(isset($request->comentarios))
        {
            $comments = $request->comentarios;
        }
        else
        {
            $comments = "--";
        }
        //var_dump($requests);

        $customer = DB::table('customers')->where('id_customer', $requests[0][0]->id_customer)->first();
        $consultant = DB::table('consultants')->where('id_consultant', $requests[0][0]->id_consultant)->first();

        return view('pages.consultant.report')
            ->with(['requests'=> $requests, 'horas'=>$horas, 'comments'=>$comments, 'customer' => $customer, 'consultant'=>$consultant]);

    }

    public function pdf(Request $request){


        // In here, we retrieve the data saved to user it later
        $data = $request->session()->get('pdf_data');

        $horas = $data[0];
        $customer = $data[1];
        $requests = $data[2];
        $comments = $data[3];
        $url_client_sign = $data[4];
        $url_consult_sign = $data[5];


        $pdf = PDF::loadView('pages.consultant.pdf', [
            'horas' => $horas,
            'customer' => $customer,
            'requests' => $requests,
            'comments' => $comments,
            'date' => Carbon::now()->toFormattedDateString(),
            'url_client_sign' => $url_client_sign,
            'url_consult_sign' => $url_consult_sign
        ]);


        // And erase the variable from session
        //$request->session()->forget('pdf_data');

        //Create the string to save the report
        $reportName = 'storage/reporte_' . $customer->code . '_' . Carbon::now()->toFormattedDateString() . '.pdf';
        $pdf->save($reportName);

        $consult = Auth::user();
        $client = User::find($customer->id_customer);

        //reporte_codigoCliente_fecha
        Storage::delete($reportName);

        //Mail::to('eli.emmanuel01@gmail.com')->send(new PDFReport());

        //Get customer email
        //$custEmail = User::find($customer->email);

        //Send to consultant
        Mail::send('emails.email', [], function ($message) use($customer, $client) {
            $consult = Auth::user();
            $reportName = 'storage/reporte_' . $customer->code . '_' . Carbon::now()->toFormattedDateString() . '.pdf';
            $emails = [$consult->email, $client->email];
            $message->to($emails)->subject('Visit Report');
            $message->attach($reportName);
        });

        /*
        //Send to customer
        Mail::send('emails.email', [], function ($message) {

            $message->to('javicruz1994@gmail.com')->subject('Visit Report');

            $message->attach('storage/reporte.pdf');

        });
        */

        return redirect('/regVisit');

        // This return is used if we want to send the http response to download the pdf
        //return $pdf->download();

    }

    public function signReport(Request $request) {
        // First we save de data needed to generate the report and save it in the session

        $horas = json_decode($request->horas);
        $customer = json_decode($request->customer);
        $requests = json_decode($request->requests);
        $comments = $request->comments;
        $url_client_sign = $request->url_client_sign;
        $url_consult_sign = $request->url_consult_sign;

        $pdf_data = [$horas, $customer, $requests, $comments, $url_client_sign, $url_consult_sign ];

        $request->session()->put('pdf_data', $pdf_data);


        // Then, we register it to the db

        $originalArray = json_decode($request->id_request);

        Report::create([
            'comments' => $request->comments,
            'arrival_time' => $request->arrival_time,
            'finishing_time' => $request->finishing_time,
            'registeredBy' => 1
        ]);

        $id_report = DB::table('reports')
            ->where([['comments', $request->comments],
                ['arrival_time',$request->arrival_time],
                ['finishing_time',$request->finishing_time]])
            ->value('id_report');

        //var_dump($originalArray);

        foreach ($originalArray as $original) {
            DB::table('requests')
                ->where('id_request', $original[0]->id_request)
                ->update(['id_report' => $id_report,
                    'solved'=>1]);

        }


        return redirect()->route('regVisit', ['success' => 'Reporte Creado']);
    }

    public function modificar() {
        return redirect()->back()->withInput();
    }
}
