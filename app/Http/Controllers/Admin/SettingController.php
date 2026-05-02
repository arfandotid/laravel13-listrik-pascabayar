<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\FileUploadTrait;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class SettingController extends Controller implements HasMiddleware
{
    // Menggunakan trait untuk menangani upload dan penghapusan file, khususnya untuk logo aplikasi.
    use FileUploadTrait;

    /**
     * Mendaftarkan middleware untuk mengatur akses berdasarkan izin pengguna.
     * Setiap metode memiliki izin yang berbeda untuk memastikan keamanan dan kontrol akses yang tepat.
     */
    public static function middleware()
    {
        return [
            new Middleware(['permission:settings.index'], only: ['index']),
            new Middleware(['permission:settings.update'], only: ['update', 'deleteLogo']),
        ];
    }

    // Menampilkan halaman pengaturan aplikasi dengan data setting yang ada, 
    // khususnya untuk menampilkan logo aplikasi jika sudah diunggah.
    public function index()
    {
        // setting hanya 1 data
        $setting = Setting::first();

        // return inertia
        return Inertia::render('Admin/Settings/Index', compact('setting'));
    }

    // Memperbarui data setting aplikasi yang sudah ada di database setelah validasi, termasuk menangani upload logo aplikasi jika ada file baru yang diunggah.
    public function update(Request $request)
    {
        // setting hanya 1 data
        $setting = Setting::firstOrFail();

        // set validation
        $request->validate([
            'app_name'  => 'required|string',
            'app_logo'  => 'nullable',
        ]);

        $data = $request->only([
            'app_name',
            'app_logo',
        ]);

        // upload logo desa jika ada
        if ($request->hasFile('app_logo')) {

            // hapus logo lama
            if ($setting->app_logo) {
                $this->deleteFile($setting->app_logo);
            }

            // simpan logo baru
            $data['app_logo'] = $this->uploadFile($request, 'app_logo', 'uploads/settings/logo');
        } else {
            // jika tidak ada file baru, tetap gunakan logo lama
            $data['app_logo'] = $setting->app_logo;
        }

        // update setting
        $setting->update($data);

        // kembali ke halaman setting
        return redirect()->to('/admin/settings')->with('success', 'Setting updated successfully.');
    }

    /**
     * Menghapus logo aplikasi dari penyimpanan dan memperbarui data setting untuk mengosongkan field logo, 
     * kemudian kembali ke halaman pengaturan dengan pesan sukses.
     */
    public function deleteLogo()
    {
        // setting hanya 1 data
        $setting = Setting::firstOrFail();

        // hapus logo desa jika ada
        if ($setting->app_logo) {
            $path  = 'uploads/settings/logo/';
            $this->deleteFile($path . $setting->app_logo);
        }

        // update setting dengan logo kosong
        $setting->update([
            'app_logo' => null,
        ]);

        // kembali ke halaman setting
        return redirect()->to('/admin/settings')->with('success', 'Logo aplikasi berhasil dihapus.');
    }
}
