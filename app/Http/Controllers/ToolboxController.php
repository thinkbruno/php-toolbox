<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Toolbox\Api\CepService;
use Toolbox\Utils\UptimeChecker;

class ToolboxController extends Controller
{
    public function index()
    {
        return view('toolbox');
    }

    public function checkCep(Request $request, CepService $service)
    {
        $request->validate(['cep' => 'required']);
        try {
            $data = $service->find($request->cep);
            return back()->with('cep_result', $data);
        } catch (\Exception $e) {
            return back()->withErrors(['cep' => $e->getMessage()]);
        }
    }

    public function checkUptime(Request $request, UptimeChecker $checker)
    {
        $request->validate(['url' => 'required|url']);
        $result = $checker->check($request->url);
        return back()->with('uptime_result', $result);
    }
}