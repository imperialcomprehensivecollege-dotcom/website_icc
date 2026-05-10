Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('news', Admin\NewsController::class);
    Route::resource('results', Admin\ResultsController::class);
    Route::resource('gallery', Admin\GalleryController::class);
    Route::resource('faculty', Admin\FacultyController::class);
    Route::resource('notices', Admin\NoticeController::class);
    Route::get('enquiries', [Admin\EnquiryController::class, 'index'])->name('enquiries.index');
});
