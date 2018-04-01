<?php

namespace App\Http\Controllers;

use App\Payment;
use App\UserPayment;
use App\User;
use App\Rules\Amount;
use App\Rules\Date_at;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Payment::paginate(5);
        return view('payments.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['users'] = User::get()->pluck('user', 'id');
        return view('payments.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'user_id.required' => 'El Usuario es un campo requerido',
            'date_at.required' => 'La Fecha es un campo requerido',
            'amount.required' => 'El Monto es un campo requerido',
            'amount.numeric' => 'El Monto debe ser un número',
        ];
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'date_at' => ['required', new Date_at],
            'amount' => ['required', 'numeric', new Amount],
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        # Request
        $user_id = $request->input('user_id');
        $date_at = explode('/', $request->input('date_at'));
        $date_at = date($date_at[2].'-'.$date_at[1].'-'.$date_at[0]);
        $amount = $request->input('amount');
        # Insert
        $Payment = New Payment;
        $Payment->date_at = $date_at;
        $Payment->amount = $amount;
        $Payment->save();
        $UserPayment = New UserPayment;
        $UserPayment->user_id = $user_id;
        $UserPayment->payment_id = $Payment->id;
        $UserPayment->save();
        return redirect('payments/create')->with('success', 'Registro Guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $count = Payment::where('id', $id)->count();
        if ($count>0) {
            # Show
            $data['row'] = Payment::where('id', $id)->first();
            return view('payments.show', ['data' => $data]);
        }else{
            # Error
            return redirect('/payments/index')->with('info', 'No se puede Ver el registro');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $count = Payment::where('id', $id)->count();
        if ($count>0) {
            # Edit
            $data['users'] = User::get()->pluck('user', 'id');
            $data['row'] = Payment::where('id', $id)->first();
            return view('payments.edit', ['data' => $data]);
        }else{
            # Error
            return redirect('/payments/index')->with('info', 'No se puede Editar el registro');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'user_id.required' => 'El Usuario es un campo requerido',
            'date_at.required' => 'La Fecha es un campo requerido',
            'amount.required' => 'El Monto es un campo requerido',
            'amount.numeric' => 'El Monto debe ser un número',
        ];
        $validator = Validator::make($request->all(), [
            'user_id' => ['required'],
            'date_at' => ['required', new Date_at],
            'amount' => ['required', 'numeric', new Amount],
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        # Request
        $user_id = $request->input('user_id');
        $date_at = explode('/', $request->input('date_at'));
        $date_at = date($date_at[2].'-'.$date_at[1].'-'.$date_at[0]);
        $amount = $request->input('amount');
        # Insert
        $Payment = Payment::where('id', $id)->first();
        $Payment->date_at = $date_at;
        $Payment->amount = $amount;
        $Payment->save();
        $UserPayment = UserPayment::where('payment_id', $Payment->id)->first();
        $UserPayment->user_id = $user_id;
        $UserPayment->save();
        return redirect('payments/edit/'.$id)->with('success', 'Registro Guardado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $count = Payment::where('id', $id)->count();
        if ($count>0) {
            # Destroy
            Payment::destroy($id);
            return redirect('/payments/index')->with('success', 'Registro Eliminado');
        }else{
            # Error
            return redirect('/payments/index')->with('info', 'No se puede Editar el registro');
        }
    }
}
