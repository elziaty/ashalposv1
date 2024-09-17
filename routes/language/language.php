<?php

// مسار للحصول على ملفات اللغة كجافاسكريبت
Route::get('/js/lang', function () {

    // تخزين ملفات اللغة في الكاش
    $strings = Cache::rememberForever('lang.js', function () {

        $lang = config('app.locale'); // الحصول على لغة التطبيق الحالية
        $files = glob(resource_path('lang/' . $lang . '/*.php')); // استرجاع جميع ملفات اللغة
        $strings = []; // مصفوفة لتخزين النصوص

        // تكرار على جميع الملفات وجمع النصوص
        foreach ($files as $file) {
            $name = basename($file, '.php'); // الحصول على اسم الملف بدون الامتداد
            if ($name !== "custom" && $name !== "default") { // استبعاد بعض الملفات
                $new_keys = require $file; // استيراد النصوص من الملف
                $strings = array_merge($strings, $new_keys); // دمج النصوص الجديدة مع النصوص السابقة
            }
        }
        return $strings; // إرجاع جميع النصوص
    });

    // إنشاء استجابة جافاسكريبت تحتوي على النصوص
    $contents = 'window.i18n = ' . json_encode(array("lang" => $strings)) . ';';
    $response = \Response::make($contents, 200); // إنشاء استجابة
    $response->header('Content-Type', 'application/javascript'); // تعيين نوع المحتوى
    return $response; // إرجاع الاستجابة

})->name('assets.lang');
