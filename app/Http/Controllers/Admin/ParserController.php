<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;
use App\Queries\QueryBuilderSources;
use App\Services\Contract\Parser;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Parser $parser
     * @param QueryBuilderSources $sources
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request, Parser $parser, QueryBuilderSources $sources)
    {
        $urls = $sources->getSourcesUrls();
        foreach($urls as $url) {
            dispatch(new NewsParsing($url['url']));
        }

        return back()->with('success', 'News added to queue');
    }
}
