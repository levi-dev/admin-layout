<?php

//namespace App\Http\Controllers;
namespace OctopusOsc\AdminLayout\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    const PREFIX = "admin";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $view = theme()->getOption('pages', 'view');
        $pathPage = theme()->getOption('pages', 'page') ?: \App\Page\Dashboard::class;
        $callback = '\\' .  $pathPage . '@execute';
        return app()->call($callback, []);
    }

    /**
     * Temporary function to replace icon duotone
     */
    public function replaceIcons()
    {
        $fileContent = file_get_contents(public_path('icon_replacement.txt'));
        $lines       = explode("\n", $fileContent);

        $patterns     = [];
        $replacements = [];
        foreach ($lines as $line) {
            $el = explode(' - ', $line);
            if (empty($line)) {
                continue;
            }
            $patterns[]     = trim($el[0]);
            $replacements[] = trim($el[1]);
        }

        $files    = File::allFiles(resource_path());
        $filtered = array_filter($files, function ($str) {
            return strpos($str, ".php") !== false;
        });

        foreach ($filtered as $file) {
            $bladeFileContent = file_get_contents($file->getPathname());

            $bladeFileContent = str_replace($patterns, $replacements, $bladeFileContent);

            file_put_contents($file->getPathname(), $bladeFileContent);
        }
    }
}
