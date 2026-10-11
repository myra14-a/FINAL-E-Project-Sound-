<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contactdetail;
use App\Models\videoupload;

class admincontroller extends Controller
{
    public function datatransfer(Request $req)
    {
        $data = $req->validate([
            'username' => ['required', 'string', 'max:255'],
            'useremail' => ['required', 'email', 'max:255'],
            'userreason' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string', 'max:5000'],
        ]);

        Contactdetail::create([
            'name' => $data['username'],
            'email' => $data['useremail'],
            'reason' => $data['userreason'],
            'comment' => $data['comment'],
        ]);

        return redirect()->back()->with('message', 'Message Sent Succesfully');
    }

    public function showusers()
    {
        $allusers = Contactdetail::latest()->get();
        return view('admin', compact('allusers'));
    }

public function videouplaod(Request $req)
{
    $data = $req->validate([
        'video' => ['required', 'file', 'mimes:mp4,webm,mov,avi,mkv', 'max:204800'],
        'name' => ['required', 'string', 'max:255'],
    ]);

    $file = $req->file('video');

    // Public uploads/videos folder
    $folder = public_path('uploads/videos');

    // Folder create karo agar exist nahi karta
    if (!is_dir($folder)) {
        if (!mkdir($folder, 0777, true) && !is_dir($folder)) {
            return back()->withErrors([
                'video' => 'Videos folder create nahi ho saka.'
            ])->withInput();
        }
    }

    // Folder writable hai ya nahi check karo
    if (!is_writable($folder)) {
        return back()->withErrors([
            'video' => 'Videos folder writable nahi hai. Windows folder permissions check karein.'
        ])->withInput();
    }

    // Unique filename ke saath video save karo
    $filename = uniqid('video_', true) . '.' . $file->getClientOriginalExtension();

    $file->move($folder, $filename);

    // Database mein path aur heading save karo
    \App\Models\videoupload::create([
        'video' => 'uploads/videos/' . $filename,
        'heading' => $data['name'],
    ]);

    return redirect()->route('songvideo')
        ->with('message', 'Video Uploaded Successfully');
}

}
