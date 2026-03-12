<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class LoginController extends Controller
{



public function login(Request $request)
{

    $google2fa = new Google2FA();

    // ==========================
    // STEP 1 LOGIN EMAIL PASSWORD
    // ==========================
    if (!$request->has('otp')) {

        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {

            return back()->withErrors([
                'email' => 'Email atau password salah.'
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // ==========================
        // JIKA BELUM AKTIF 2FA
        // ==========================
        if (!$user->google2fa_enabled) {

            if (!$user->google2fa_secret) {

                $user->google2fa_secret = $google2fa->generateSecretKey();
                $user->save();

            }

            $qrUrl = $google2fa->getQRCodeUrl(
                'SIAP Bandarsono',
                $user->email,
                $user->google2fa_secret
            );

            $QR_Image = QrCode::size(200)->generate($qrUrl);

            return view('admin.login',[
                'step'=>'setup2fa',
                'QR_Image'=>$QR_Image
            ]);
        }

        // ==========================
        // JIKA SUDAH AKTIF
        // ==========================

        return view('admin.login',[
            'step'=>'verify2fa'
        ]);
    }

    // ==========================
    // STEP 2 VERIFIKASI OTP
    // ==========================

    $user = Auth::user();

    if ($user->otp_attempt >= 5) {

        Auth::logout();

        return redirect('/masuk')
            ->with('error','Terlalu banyak percobaan OTP');
    }

    $valid = $google2fa->verifyKey(
        $user->google2fa_secret,
        $request->otp
    );

    if (!$valid) {

        $user->otp_attempt += 1;
        $user->save();

        return back()->with('error','Kode OTP salah');
    }

    // reset attempt
    $user->otp_attempt = 0;

    // aktifkan jika pertama kali
    if (!$user->google2fa_enabled) {

        $user->google2fa_enabled = 1;

    }

    $user->save();

    if($valid){

    $request->session()->regenerate();

$request->session()->put('2fa_passed', true);

return redirect()->intended('/anggota');

        // $request->session()->regenerate();

        // session(['2fa_passed'=>true]);
        // return redirect()->intended('/anggota');
    }
    
    
}
   

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return redirect('/masuk');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function setup2FA()
    {
        $google2fa = new Google2FA();

        $user = Auth::user();

        if (!$user->google2fa_secret) {

            $secret = $google2fa->generateSecretKey();

            $user->google2fa_secret = $secret;
            $user->save();

        }

        $QR_Image = $google2fa->getQRCodeInline(
            'SIAP Bandarsono',
            $user->email,
            $user->google2fa_secret
        );

        return view('auth.2fa_setup', compact('QR_Image'));
    }

    public function enable2FA(Request $request)
    {
        $google2fa = new Google2FA();

        $user = Auth::user();

        $valid = $google2fa->verifyKey(
            $user->google2fa_secret,
            $request->otp
        );

        if ($valid) {

            $user->google2fa_enabled = true;
            $user->save();

            return redirect('/anggota');
        }

        return back()->with('error','Kode OTP salah');
    }

    public function check2FA(Request $request)
    {
        $google2fa = new Google2FA();

        $user = Auth::user();

        $valid = $google2fa->verifyKey(
            $user->google2fa_secret,
            $request->otp
        );

        if ($valid) {

            session(['2fa_passed' => true]);

            return redirect('/anggota');

        }

        return back()->with('error','Kode OTP salah');
    }
}
