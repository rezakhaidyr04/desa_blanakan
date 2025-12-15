<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // For now, we'll just flash a success message
        // In production, you would send an email or save to database
        
        // Example: Save to session flash
        return redirect()->route('kontak')->with('success', 'Terima kasih! Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
        
        // Example: Send email (uncomment when email is configured)
        /*
        Mail::send('emails.contact', $validated, function($message) use ($validated) {
            $message->to('admin@blanakan.desa.id')
                    ->subject('Pesan Kontak: ' . $validated['subject']);
        });
        */
    }
}
