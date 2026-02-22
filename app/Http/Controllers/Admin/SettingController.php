<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->groupBy('group');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        foreach ($request->settings as $key => $value) {
            $setting = Setting::where('key', $key)->first();
            
            if ($setting) {
                if ($setting->type === 'image' && $request->hasFile("settings.{$key}")) {
                    // Hapus gambar lama
                    if ($setting->value) {
                        Storage::disk('public')->delete($setting->value);
                    }
                    $value = $request->file("settings.{$key}")->store('settings', 'public');
                } elseif ($setting->type === 'boolean') {
                    $value = $request->has("settings.{$key}") ? '1' : '0';
                }
                
                $setting->update(['value' => $value]);
                Cache::forget("setting_{$key}");
            }
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Pengaturan berhasil disimpan!');
    }
}
