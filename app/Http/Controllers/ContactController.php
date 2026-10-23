<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $services = collect(config('service_catalog.categories'))->collapse()->pluck('title')->all();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'location' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'regex:/^[+\d][\d\s()-]{6,}$/', 'max:30'],
            'service' => ['required', Rule::in($services)],
            'address' => ['nullable', 'string', 'max:255'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'hour' => ['required', 'integer', 'between:1,12'],
            'minute' => ['required', Rule::in(['00', '15', '30', '45'])],
            'meridiem' => ['nullable', Rule::in(['AM', 'PM'])],
            'message' => ['nullable', 'string', 'max:3000'],
        ], [
            'name.required' => 'Please enter the owner name.',
            'location.required' => 'Please enter your location.',
            'email.*' => 'Please enter a valid email address.',
            'phone.*' => 'Please enter a valid phone number.',
            'service.*' => 'Please select a service.',
            'date.*' => 'Please choose today or a later date.',
            'hour.*' => 'Please select the hour.',
            'minute.*' => 'Please select the minutes.',
        ]);

        $time = sprintf('%s:%s %s', $data['hour'], $data['minute'], $data['meridiem'] ?? 'AM');

        $body = "New appointment request\n\n"
            . "Owner name: {$data['name']}\n"
            . "Location: {$data['location']}\n"
            . "Email: {$data['email']}\n"
            . "Phone: {$data['phone']}\n"
            . "Service: {$data['service']}\n"
            . 'Address: ' . ($data['address'] ?? '-') . "\n"
            . "Preferred date: {$data['date']} at {$time}\n\n"
            . ($data['message'] ?? '');

        try {
            Mail::raw($body, function ($mail) use ($data) {
                $mail->to(config('site.email'))
                    ->replyTo($data['email'], $data['name'])
                    ->subject("Appointment request: {$data['service']}");
            });
        } catch (\Throwable $e) {
            Log::error('Appointment form mail failed: ' . $e->getMessage());

            $error = 'Sorry, something went wrong. Please call or email us instead.';

            return $request->expectsJson()
                ? response()->json(['message' => $error], 500)
                : back()->withInput()->with('error', $error);
        }

        $status = "Thank you! Your appointment request has been sent. We'll contact you to confirm.";

        return $request->expectsJson()
            ? response()->json(['message' => $status])
            : back()->with('status', $status);
    }
}
