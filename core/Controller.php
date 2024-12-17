<?php

class Controller {
    protected function loadView($view, $data = []) {
        $viewFile = __DIR__ . '/../app/views/' . $view . '.php';

        // Periksa apakah file view ada
        if (file_exists($viewFile)) {
            // Ekstrak data agar bisa digunakan di view
            extract($data);
            // Memasukkan file view
            include $viewFile;
        } else {
            // Jika file tidak ada, tampilkan pesan error
            ErrorHandler::handle("View yang dipanggil tidak ada atau belum dibuat: view/<b>{$view}.php</b>");
        }
    }

    protected function loadModel($model) {
        require_once __DIR__ . '/../app/models/' . $model . '.php';
        return new $model();
    }
}
