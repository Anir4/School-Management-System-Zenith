<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\admin\profController;
use App\Http\Controllers\admin\etudiantcontroller;
use App\Http\Controllers\admin\notecontroller;
use App\Http\Controllers\admin\classcontroller;
use App\Http\Controllers\admin\matierecontroller;
use App\Http\Controllers\admin\niveaucontroller;
use App\Http\Controllers\admin\fraiscontroller;
use App\Http\Controllers\admin\absencecontroller;
use App\Http\Controllers\admin\parametrecontroller;
use App\Http\Controllers\admin\emploicontroller;
use App\Http\Controllers\admin\class_matierecontroller;
use App\Http\Controllers\clendarcontroller;
use App\Http\Controllers\matiereetudiant;
use App\Http\Controllers\dashbordetudiant;
use App\Http\Controllers\NotificationCon;
use App\Http\Controllers\examcontroller;
use App\Http\Controllers\AbssenceController;
use App\Http\Controllers\ProfControl;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('welcome');
});



Route::post('/', [LoginController::class,'login']);
Route::get('', [LoginController::class,'showLoginForm']);
Route::get('/logout', [LoginController::class,'logout']);



Route :: group(['middleware' => 'admin'], function () {
    Route:: get('admin/dashboard', function () {
        return view('admin.admin');});
        

    Route:: get('admin/enseignants', function () {
        return view('admin.enseignantadmin');});

    Route:: get('admin/notes', function () {
        return view('admin.noteadmin');});

    Route:: get('admin/classes', function () {
        return view('admin.classadmin');});

    Route:: get('admin/matieres', function () {
        return view('admin.matiereadmin');});

    Route:: get('admin/niveaux', function () {
        return view('admin.niveauadmin');});

    Route:: get('admin/frais', function () {
        return view('admin.fraisadmin');});

    Route:: get('admin/absences', function () {
        return view('admin.absenceadmin');});

    Route:: get('admin/devoires', function () {
        return view('admin.devoiradmin');});

    Route:: get('admin/raportEtudiants', function () {
        return view('admin.etudiantadmin');});

    Route:: get('admin/exams', function () {
        return view('admin.examadmin');});


    Route:: get('admin/parametres', function () {
        return view('admin.parametreadmin');});

        Route:: get('admin/Emploi', function () {
            return view('admin.emploiadmin');});

        Route:: get('admin/class_matiereadmin', function () {
                return view('admin.class_matiereadmin');});

                Route::post('admin/create-notification', [NotificationCon::class, 'createNotification'])->name('notifications.create');
    Route::delete('admin/delete-notification/{id}', [NotificationCon::class, 'delete'])->name('notifications.delete');
    Route:: get('admin/notifications',[NotificationCon::class, 'showNotifications']);

                Route::get('admin/dashboard', [admincontroller::class, 'index'])->name('users.index');
                Route::post('admin/dashboard', [admincontroller::class, 'store'])->name('users.store');
                Route::post('/admin/dashboard/update', [admincontroller::class, 'update'])->name('users.update');
                Route::get('delete/{id}', [admincontroller::class, 'destroy'])->name('users.destroy');
                
                Route::get('admin/enseignants', [profController::class, 'index'])->name('profs.index');
                Route::post('admin/enseignants', [profController::class, 'store'])->name('profs.store');
                Route::post('/admin/enseignants/update', [profController::class, 'update'])->name('profs.update');
                Route::get('deleteprof/{ID_Prof}', [profController::class, 'destroy'])->name('profs.destroy');
                
                Route::get('admin/raportEtudiants', [etudiantcontroller::class, 'index'])->name('etudiants.index');
                Route::post('admin/raportEtudiants', [etudiantcontroller::class, 'store'])->name('etudiants.store');
                Route::post('/admin/etudiant/update', [etudiantcontroller::class, 'update'])->name('etudiants.update');
                Route::get('deleteetudiant/{ID_Etudiant}', [etudiantcontroller::class, 'destroy'])->name('etudiants.destroy');
            
                Route::get('admin/notes', [notecontroller::class, 'index'])->name('notesc.index');
                Route::post('admin/notes', [notecontroller::class, 'store'])->name('notesc.store');
                Route::post('/admin/note/update', [notecontroller::class, 'update'])->name('notesc.update');
                Route::get('deletenote/{ID_Notes}', [notecontroller::class, 'destroy'])->name('notesc.destroy');
            
                Route::get('admin/classes', [classcontroller::class, 'index'])->name('classp.index');
                Route::post('admin/classes', [classcontroller::class, 'store'])->name('classp.store');
                Route::post('/admin/class/update', [classcontroller::class, 'update'])->name('classp.update');
                Route::get('deleteclass/{ID_Class}', [classcontroller::class, 'destroy'])->name('classp.destroy');
            
                Route::get('admin/matieres', [matierecontroller::class, 'index'])->name('matieres.index');
                Route::post('admin/matieres', [matierecontroller::class, 'store'])->name('matieres.store');
                Route::post('/admin/matiere/update', [matierecontroller::class, 'update'])->name('matieres.update');
                Route::get('deletematiere/{ID_Matiere}', [matierecontroller::class, 'destroy'])->name('matieres.destroy');
            
                Route::get('admin/niveaux', [niveaucontroller::class, 'index'])->name('niveaux.index');
                Route::post('admin/niveaux', [niveaucontroller::class, 'store'])->name('niveaux.store');
                Route::post('/admin/niveau/update', [niveaucontroller::class, 'update'])->name('niveaux.update');
                Route::get('deleteniveau/{ID_Niveau}', [niveaucontroller::class, 'destroy'])->name('niveaux.destroy');
            
                Route::get('admin/frais', [fraiscontroller::class, 'index'])->name('frai.index');
                Route::post('admin/frais', [fraiscontroller::class, 'store'])->name('frai.store');
                Route::post('/admin/frais/update', [fraiscontroller::class, 'update'])->name('frai.update');
                Route::get('deletefrais/{ID_Frais}', [fraiscontroller::class, 'destroy'])->name('frai.destroy');
            
            
                Route::get('admin/parametres', [parametrecontroller::class, 'setting']);
                Route::post('admin/parametres', [parametrecontroller::class, 'updateSetting']);
                
                Route::get('admin/Emploi', [emploicontroller::class, 'list']);
                Route::post('/admin/Emploi/get_matiere', [emploicontroller::class, 'get_matiere']);
                Route::post('/admin/Emploi/add', [emploicontroller::class, 'insert_update']);
            
                Route::get('admin/absences', [absencecontroller::class, 'affiche'])->name('absence.affiche');
                Route::post('/admin/absences', [absencecontroller::class, 'update']);
                Route::get('deleteabsence/{id}', [absencecontroller::class, 'destroy'])->name('absence.destroy');
            
                Route::get('admin/exams', [examcontroller::class, 'index'])->name('exams.index');
                Route::post('admin/exams', [examcontroller::class, 'store'])->name('exams.store');
                Route::post('/admin/exam', [examcontroller::class, 'update'])->name('exams.update');
                Route::get('deleteexams/{ID_Exam}', [examcontroller::class, 'destroy'])->name('exams.destroy');
            
                Route::get('admin/class_matiereadmin', [class_matierecontroller::class, 'add']);
                 Route::post('admin/class_matiereadmin', [class_matierecontroller::class, 'insert']);
                Route::post('admin/class_matiereadmin/update', [class_matierecontroller::class, 'update'])->name('assign_subject.add.update');
                 Route::get('deleteclasssub/{ID_Class_matiere}', [class_matierecontroller::class, 'destroy'])->name('assign_subject.add.destroy');
    });

Route :: group(['middleware' => 'prof'], function () {

    Route:: get('prof/dashboard', [ProfControl::class,"dashboard"]);

    Route:: get('prof/absence', function () {
        return view('prof.abssence');});
    Route::post('/fetch-abssance', [AbssenceController::class, 'fetchStudents']);
    Route::post('/update-all-absences', [AbssenceController::class, 'updateAll']);
    
    Route:: get('prof/report', function () {
        return view('prof.absenceReport');});
    Route::post('/search-student', [AbssenceController::class, 'searchStudent']);


    Route:: get('prof/devoires', [ProfControl::class, 'showProfResources']);
    Route::delete('/resources/delete', [ProfControl::class, 'destroy'])->name('resources.delete');

    Route::get('/fetch-responses/{resourceId}', [ProfControl::class, 'fetchStudentResponses']);

    Route::post('/update-status/{resourceId}', 'App\Http\Controllers\ProfControl@updateStatus');
    Route::get('/resscount', 'App\Http\Controllers\ProfControl@resscount');





    Route::post('/upload-files', [ProfControl::class, 'upload'])->name('upload.files');


    Route:: get('prof/notifications',[NotificationCon::class, 'showNotifications']);

    Route:: post('/updateCompte',[ProfControl::class, 'updateCompte']);
    Route:: post('update-profile-image',[ProfControl::class, 'updateProfileImage']);
    Route:: get('prof/compte', [ProfControl::class,'compte']);


    Route:: get('prof/notes', function () {
        return view('prof.notes');});
        
    Route::post('/fetch-students', [ProfControl::class, 'fetchStudents']);
    Route::post('/update-student-notes', [ProfControl::class, 'updateStudentNotes']);
    Route::get('/get-matiere/{id}', [ProfControl::class,'getMatiere']);



    });

Route :: group(['middleware' => 'etudiant'], function () {

    Route:: get('etudiant/dashboard', function () {
    return view('etudiant.dashboard');});

    Route:: get('etudiant/Emploi', function () {
        return view('etudiant.emploi');});

    Route:: get('etudiant/devoir', function () {
        return view('etudiant.devoir');});

    Route:: get('etudiant/absence', function () {
        return view('etudiant.absence');});

    Route:: get('etudiant/exam', function () {
        return view('etudiant.exam');});

    Route:: get('etudiant/examresultat', function () {
        return view('etudiant.examresultat');});

    Route:: get('etudiant/cours', function () {
        return view('etudiant.cours');});
        
    Route:: get('etudiant/calendrie', function () {
        return view('etudiant.calendrie');});
    

    });



     
     Route::get('etudiant/dashboard', [dashbordetudiant::class, 'index']);

     Route::get('etudiant/examresultat', [notecontroller::class, 'index']);

     Route::get('etudiant/Emploi', [emploicontroller::class, 'mytimetable']);

     Route:: get('etudiant/calendrie', [clendarcontroller::class, 'clendar']);

     Route:: get('etudiant/cours', [matiereetudiant::class, 'showmatiereetudiant']);
     Route:: get('etudiant/devoir', [matiereetudiant::class, 'showmatiereetudiantdevoir']);

     Route:: get('etudiant/notification', [NotificationCon::class, 'showNotifications']);


     Route:: post('/get_Studentcours', [matiereetudiant::class, 'getStudentCours']);
     Route:: post('/reponse_etudiant', [matiereetudiant::class, 'uploadResponse']);

     

     Route::get('etudiant/absence', [absencecontroller::class, 'index']);
