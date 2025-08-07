<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/addstudent', [StudentsController::class, 'createStudentPage'])->name('createStudentPage');
Route::get('/showallstudents', [StudentsController::class, 'showAllStudents'])->name('showallstudents');
Route::get('/getstdid/{id}', [StudentsController::class, 'getStudentId'])->name('getstdid');
Route::post('/updatestudent', [StudentsController::class, 'updateStudent'])->name('updateStudent');
Route::post('/storestudent', [StudentsController::class, 'storeStudent'])->name('storeStudent');
Route::get('/deletestd/{id}', [StudentsController::class, 'deleteStudent'])->name('deletestd');
Route::get('/studentedit/{id}', [StudentsController::class, 'editAjex'])->name('editAjex');
Route::get('/deleteStudent', [StudentsController::class, 'deleteAjex'])->name('deleteStudent');

//Subjects Routes
Route::get('/addsubjectPaeg', [SubjectController::class, 'addSubjectPage'])->name('addsubjectPaeg');
Route::post('/storesubject', [SubjectController::class, 'storeSubject'])->name('storeSubject');
Route::get('/showallsubjects', [SubjectController::class, 'showAllSubjects'])->name('showAllSubjects');
Route::get('/getsbjid/{id}', [SubjectController::class, 'getSubjectId'])->name('getsbjid');
Route::post('/updatesubject', [SubjectController::class, 'updateSubject'])->name('updateSubject');







//GET -> Data ko database sy get karny k liye
//POST -> Data ko database me store karny k liye



