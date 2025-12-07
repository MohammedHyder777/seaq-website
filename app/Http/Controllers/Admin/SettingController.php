<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    // ABOUT US
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

    // PROFILE
    public function uploadProfilePdf(Request $request)
    {
        $request->validate([
            'profile_pdf' => 'required|mimes:pdf|max:51200', // 50 MB
        ]);

        // Delete the old file if it exists
        $old = Setting::get('profile_pdf');
        if ($old && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }

        // Upload the new file
        $path = $request->file('profile_pdf')->store('pdfs/profile', 'public');

        // Save the new path in settings
        Setting::set('profile_pdf', $path);

        return back()->with('success', 'حُفظ الملف التعريفي الجديد');
    }

    // NEWSLETTER
    public function uploadNewsletterPdf(Request $request)
    {
        $request->validate([
            'newsletter_pdf' => 'required|mimes:pdf|max:51200', // 50 MB
        ]);

        // Delete the old file if it exists
        $old = Setting::get('newsletter_pdf');
        if ($old && Storage::disk('public')->exists($old)) {
            Storage::disk('public')->delete($old);
        }

        // Upload the new file
        $path = $request->file('newsletter_pdf')->store('pdfs/newsletter', 'public');

        // Save the new path in settings
        Setting::set('newsletter_pdf', $path);

        return back()->with('success', 'حُفظ الإصدار الجديد من المجلة');
    }
}
