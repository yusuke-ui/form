<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Contact;
use App\Mail\ContactMail;

class ContactsController extends Controller
{
    //
    public function index() 
    {
        return view('contacts.index');
    }

    public function confirm(Request $request) 
    {
        $request->validate([
            'name' => 'required|max:10',
            'email' => 'required|email',
            'tel' => 'nullable|numeric',
            'gender' => 'required',
            'contents' => 'required',
        ]);

        //フォームから受け取った全てのinputの値を取得
        $inputs = $request->all();

        return view('contacts.confirm', ['inputs' => $inputs]);
    }

    public function process(Request $request) 
    {
        $action = $request->get('action', 'return');
        $input = $reqeust->except('action');

        if($action === 'submit') {

            // DBにデータを保存
            $contact = new Contact();
            $contact->fill($input);
            $contact->save();

            // メール送信
            Mail::to($input['email'])->send(new ContactMail('mails.contact', 'お問い合わせありがとうございます', $input));

            return redirect()->route('complete');
        } else {
            return redirect()->route('contact')->withInput($input);
        }
    }

    public function complete() {
        return view('contacts.complete');
    }
}
