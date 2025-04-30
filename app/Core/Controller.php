<?php

declare(strict_types=1);

namespace App\Core;

use function App\Helpers\view;

class Controller {
    protected function views(string $path, array $data = []): void {
        view("{$path}", $data);
    }
}