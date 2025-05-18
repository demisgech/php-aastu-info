<?php

declare(strict_types=1);

namespace App\Core\Forms\FileUploads;

class FileUploader {
    private array $file;
    private array $allowedExtensions;
    private string $relativeDir;
    private string $absoluteDir;
    private string $newFileName;
    private string $targetFilePath;
    private int $maxSize;

    public function __construct(
        mixed $file,
        string $relativePath = "/uploads/",
        array $allowedExtensions = ["jpg", "png", "jpeg", "gif"],
        int $maxSize = 2 * 1024 * 1024
    ) {
        if (!isset($file['tmp_name']) || !is_uploaded_file($file['tmp_name'])) {
            throw new FileUploadException("Invalid file upload!!");
        }

        $this->file = $file;
        $this->allowedExtensions = $allowedExtensions;
        $this->maxSize = $maxSize;
        $this->newFileName = time() . "_" . uniqid() . "_" . basename($this->file['name']);

        // Normalize paths
        $this->relativeDir = rtrim($relativePath, "/");
        $this->absoluteDir = rtrim($_SERVER['DOCUMENT_ROOT'] . $this->relativeDir, DIRECTORY_SEPARATOR);

        $this->ensureDirectoryExists();
    }

    private function ensureDirectoryExists() {
        if (!is_dir($this->absoluteDir) && !mkdir($this->absoluteDir, 0777, true)) {
            throw new FileUploadException("Failed to create upload directory.");
        }
    }

    private function validateFile() {
        $fileExtension = strtolower(pathinfo($this->file['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $this->allowedExtensions)) {
            throw new FileUploadException("Invalid file type! Allowed types: " . implode(", ", $this->allowedExtensions));
        }

        if ($this->file['size'] > $this->maxSize) {
            throw new FileUploadException("File size too large. Max allowed: " . number_format($this->maxSize / 1024 / 1024, 2) . "MB");
        }
    }

    public function upload(): string {
        $this->validateFile();

        $targetPath = $this->absoluteDir . DIRECTORY_SEPARATOR . $this->newFileName;

        if (!move_uploaded_file($this->file['tmp_name'], $targetPath)) {
            throw new FileUploadException("Failed to move uploaded file.");
        }

        // Save the relative URL path (for HTML/browser use)
        $this->targetFilePath = $this->relativeDir . '/' . $this->newFileName;

        return $this->getRelativePath();
    }

    public function getFileName(): string {
        return $this->newFileName;
    }

    public function getRelativePath(): string {
        return $this->targetFilePath; // like "/uploads/abc.jpg"
    }

    public function getFullUrl(): string {
        $host = $_SERVER['HTTP_HOST'];
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
        return $protocol . "://" . $host . $this->targetFilePath;
    }
}
