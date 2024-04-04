<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationCon extends Controller
{
    public function createNotification(Request $request)
    {
        $request->validate([
            'destinateur' => 'required|in:profs,etudiants,toutes',
            'titre' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
    
        $notification = new Notification();
        $notification->destinateur = $request->destinateur;
        $notification->titre = $request->titre;
        $notification->message = $request->message;
        $notification->save();
    
        return redirect('/admin/notifications')->with('success', 'Notification envoyé avec succès.');
    }

    public function showNotifications()
{
    $userType = Auth::user()->type;

    if ($userType === 'prof') {
        $notifications = Notification::whereIn('destinateur', ['profs', 'toutes'])
        ->orderByDesc('created_at')
        ->get();
        return view('prof.notificationadmin', ['notifications' => $notifications]);

    } elseif ($userType === 'etudiant') {
        $notifications = Notification::whereIn('destinateur', ['etudiants', 'toutes'])
        ->orderByDesc('created_at')
        ->get();
        return view('etudiant.notifications', ['notifications' => $notifications]);

    } else  {
        $notifications = Notification::orderBy('created_at', 'desc')->get();;
        return view('admin.notificationadmin', ['notifications' => $notifications,'userType' => $userType,]);
    }
}

public function delete($id)
{
    $notification = Notification::findOrFail($id);
    $notification->delete();

    return redirect()->back()->with('success', 'Notification supprimé avec succès.');
}
}
