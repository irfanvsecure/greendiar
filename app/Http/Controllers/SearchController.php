<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

// Header search: matches the query against services, the main pages and the FAQs.
class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Str::limit(trim((string) $request->query('q')), 100, '');
        $terms = array_filter(preg_split('/\s+/', Str::lower($query)));
        $matches = fn (string ...$text) => $terms && collect($terms)->every(
            fn ($term) => Str::contains(Str::lower(implode(' ', $text)), $term)
        );

        $services = collect(config('service_catalog.categories'))
            ->flatMap(fn ($items, $category) => collect($items)->map(fn ($item) => $item + ['category' => $category]))
            ->filter(fn ($item) => $matches($item['title'], $item['summary'], $item['category']));

        $pages = collect([
            ['Home', route('home'), 'Landscaping, swimming pools and home maintenance in Dubai.'],
            ['About Us', route('about'), 'Who we are: landscaping, swimming pool and house maintenance specialists.'],
            ['Services', route('services.index'), 'Every service, including swimming pool construction and its step-by-step process.'],
            ['Contact Us', route('contact'), 'Phone, email, WhatsApp, working hours and the appointment form. Get a quote.'],
        ])->filter(fn ($page) => $matches($page[0], $page[2]));

        $faqs = collect(config('site.faqs'))->filter(fn ($answer, $question) => $matches($question, $answer));

        return view('search', compact('query', 'services', 'pages', 'faqs'));
    }
}
