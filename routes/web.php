<?php
use Toolbox\Utils\UptimeChecker;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolboxController;

Route::get('/', [ToolboxController::class, 'index']);
Route::post('/cep', [ToolboxController::class, 'checkCep'])->name('toolbox.cep');
Route::post('/uptime', [ToolboxController::class, 'checkUptime'])->name('toolbox.uptime');
