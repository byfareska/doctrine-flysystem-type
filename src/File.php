<?php declare(strict_types=1);

namespace Byfareska\DoctrineFlysystemType;

use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemReader;
use League\Flysystem\UnableToReadFile;
use League\Flysystem\UnableToRetrieveMetadata;

readonly class File
{
    public function __construct(
        private string $path,
    )
    {
    }

    /**
     * @throws FilesystemException
     */
    public function fileExists(FilesystemReader $adapter): bool
    {
        return $adapter->fileExists($this->path);
    }

    /**
     * @throws UnableToReadFile
     * @throws FilesystemException
     */
    public function read(FilesystemReader $adapter): string
    {
        return $adapter->read($this->path);
    }

    /**
     * @return resource
     * @throws UnableToReadFile
     * @throws FilesystemException
     */
    public function readStream(FilesystemReader $adapter)
    {
        return $adapter->readStream($this->path);
    }

    /**
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function visibility(FilesystemReader $adapter): string
    {
        return $adapter->visibility($this->path);
    }

    /**
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function mimeType(FilesystemReader $adapter): string
    {
        return $adapter->mimeType($this->path);
    }

    /**
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function lastModified(FilesystemReader $adapter): int
    {
        return $adapter->lastModified($this->path);
    }

    /**
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function fileSize(FilesystemReader $adapter): int
    {
        return $adapter->fileSize($this->path);
    }

    public function getPath(): string
    {
        return $this->path;
    }
}