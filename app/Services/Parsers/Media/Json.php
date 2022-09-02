<?php

namespace App\Services\Parsers\Media;

class Json
{
    /** @var string */
    public $filename;

    /** @var string */
    public $directory;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }

    public function file(string $name): self
    {
        $this->filename = directory($this->directory . $name) . '.json';

        return $this;
    }

    public function get()
    {
        return json_decode(file_get_contents($this->filename));
    }

    public function exists(): bool
    {
        return file_exists($this->filename);
    }

    public function save(array $data): void
    {
        $this->checkDirectory();

        file_put_contents($this->filename, json_encode($data));
    }

    private function checkDirectory(): void
    {
        $directory = pathinfo($this->filename, PATHINFO_DIRNAME);

        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
    }
}
