<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnvSetupController extends Controller
{
    public function step1()
    {
        return view('env-setup.step1');
    }

    public function postStep1(Request $request)
    {
        $request->validate(['APP_NAME' => 'required|string|max:255']);
        session(['APP_NAME' => $request->APP_NAME]);
        return redirect()->route('env.step2');
    }

    public function step2()
    {
        return view('env-setup.step2');
    }

    public function postStep2(Request $request)
    {
        $request->validate(['DATABASE_NAME' => 'required|string|max:255']);
        session(['DATABASE_NAME' => $request->DATABASE_NAME]);
        return redirect()->route('env.step3');
    }

    public function step3()
    {
        return view('env-setup.step3');
    }

    public function postStep3(Request $request)
    {
        $request->validate(['USER_NAME' => 'required|string|max:255']);
        session(['USER_NAME' => $request->USER_NAME]);
        return redirect()->route('env.step4');
    }

    public function step4()
    {
        return view('env-setup.step4');
    }

    public function postStep4(Request $request)
    {
        $request->validate(['PASSWORD' => 'required|string']);
        session(['PASSWORD' => $request->PASSWORD]);

        // Update the .env file
        try {
            $this->updateEnv([
                'APP_NAME' => session('APP_NAME'),
                'DB_DATABASE' => session('DATABASE_NAME'),
                'DB_USERNAME' => session('USER_NAME'),
                'DB_PASSWORD' => session('PASSWORD'),
                'INSTALLED' => "true",
            ]);

            return redirect('/')->with('success', 'Environment setup complete!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update environment variables.']);
        }
    }

    private function updateEnv($data)
    {
        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);

        foreach ($data as $key => $value) {
            $envContent = preg_replace(
                "/^$key=.*$/m",
                "$key=\"$value\"",
                $envContent
            );
        }

        file_put_contents($envPath, $envContent);

        // Clear the config cache
        // \Artisan::call('config:clear');
    }
}
