<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function editAboutUs()
    {
        $content = Setting::get('about_us_content', '');
        $content_en = Setting::get('about_us_content_en', '');

        return view('admin.aboutusEdit', compact(['content', 'content_en']));
    }

    public function updateAboutUs(Request $request)
    {
        $request->validate([
            'content' => 'nullable|string',
            'content_en' => 'nullable|string',
        ]);

        Setting::set('about_us_content', $request['content']);
        Setting::set('about_us_content_en', $request['content_en']);

        return back()->with('success', 'حُفظ محتوى صفحة (من نحن؟)');
    }
}
