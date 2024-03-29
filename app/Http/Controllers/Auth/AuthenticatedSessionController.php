<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();
        $url = '';
        if ($request->user()->role === 'admin') {
            $url = '/admin/dashboard';
        }

        // Send Telegram notification
        $this->sendTelegramNotification(auth()->user()->name, auth()->user()->email);

        return redirect()->intended($url);
    }


    /**
     * Send Telegram notification.
     */
    private function sendTelegramNotification($userName, $userEmail)
    {

        $botToken = env('TELEGRAM_BOT_TOKEN_LOGIN');
        $chatId = env('TELEGRAM_CHAT_ID_LOGIN');

        $telegramMessage = "UserName: $userName \nWith email $userEmail Has been logged in.";
        $telegramUrl = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=" . urlencode($telegramMessage);

        $response = file_get_contents($telegramUrl);
        if ($response === false) {

            \Log::error('Failed to send message to Telegram');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
