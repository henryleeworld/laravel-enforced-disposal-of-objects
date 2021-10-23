<?php

namespace App\Using\Disposable;

use RyanChandler\Using\Disposable as UsingDisposable;

class TextFile implements UsingDisposable
{
    public $resource;

    private $file;

    public function __construct(string $file, string $mode)
    {
        $this->file = $file;
        $this->resource = fopen($this->file, $mode);
    }

    public function read(int $length = null)
    {
        return fread($this->resource, $length ?? filesize($this->file));
    }

    public function dispose(): void
    {
        fclose($this->resource);

        $this->resource = null;
    }
}