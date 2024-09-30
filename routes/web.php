<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\EximController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KaryawanController;

Route::get("/", [IndexController::class,"index"]);
Route::get("karyawan", [IndexController::class,"karyawan"]);
Route::get("datatables", [IndexController::class,"datatables"]);

// Route::get("karyawan", [KaryawanController::class,"karyawan"]);
Route::get("edit_karyawan-{id}", [KaryawanController::class,"edit_karyawan"]);
Route::get("hapus_karyawan-{id}", [KaryawanController::class,"hapus_karyawan"]);
Route::get("cari_karyawan-{nama}", [KaryawanController::class, "cari_karyawan"]);
Route::get("download_template", [EximController::class, "download_template"]);
Route::get("export_file_excel", [EximController::class,"export_file_excel"]);
// Route::get("/export_file_excel", [EximController::class,"export_file_excel"])->name('export_file_excel');
Route::get("export_file_pdf", [EximController::class,"export_file_pdf"]);
Route::get("export_file_csv", [EximController::class,"export_file_csv"]);
// Route::get("/export_file_pdf", [EximController::class,"export_file_pdf"])->name("export_file_pdf");

    

Route::post("tambah_karyawan", [KaryawanController::class,"tambah_karyawan"]);
Route::post("update_karyawan", [KaryawanController::class,"update_karyawan"]);
Route::post("upload_karyawan", [EximController::class,"upload_karyawan"]);

// data tables
Route::post("/data", [DataController::class, 'getData'])->name('data');
Route::post("update_datatables", [DataController::class, 'update_datatables']);
Route::post("delete_datatables", [DataController::class, 'delete_datatables']);
// Route::post("editModal", [DataController::class, 'editModal']);

