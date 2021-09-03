<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payments;
use App\Models\DonationsInterval;
use App\Models\Donors;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\isEmpty;

class DonorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payments::select('id', 'name')->get();
        $donationsInterval = DonationsInterval::select('id', 'name')->get();
        return view('index', 
            [
                'payments' => $payments,
                'donationsInterval' => $donationsInterval
        ]);
    }

    /**
     * Save donors data
     *
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        try {
            $getDonors = Donors::where('cpf', '=', $request->cpf)->orWhere('email', '=', $request->email)->get();

            if (!$getDonors->isEmpty()) {
                Session::flash('error', "CPF e/ou e-mail já existente!");
                return Redirect::back()->withInput();
            } 

            $donors = new Donors();

            $donors->name = $request->name;
            $donors->email = $request->email;
            $donors->cpf = $request->cpf;
            $donors->phone = $request->phone;
            $donors->birthdate = $request->birthdate;
            $donors->donation_interval_id = $request->donation_interval_id;
            $donors->address = $request->address;
            $donors->donation_amount = $request->donation_amount;
            $donors->payment_id = $request->payment_id;

            $donors->save();

            Session::flash('success', "Doação cadastrada com sucesso!");
            return redirect()->back();
        } catch (Exception $e) {
            throw new Exception($e->getMessage(), 500);
        }
        
    }

    public function destroy($id)
    {
        //
    }
}
