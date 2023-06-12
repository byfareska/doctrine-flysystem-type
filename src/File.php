<?php declare(strict_types=1);

namespace Byfareska\DoctrineFlysystemType;

use League\Flysystem\Config;
use League\Flysystem\FileAttributes;
use League\Flysystem\FilesystemAdapter;
use League\Flysystem\FilesystemException;
use League\Flysystem\InvalidVisibilityProvided;
use League\Flysystem\UnableToCheckExistence;
use League\Flysystem\UnableToCopyFile;
use League\Flysystem\UnableToDeleteFile;
use League\Flysystem\UnableToMoveFile;
use League\Flysystem\UnableToReadFile;
use League\Flysystem\UnableToRetrieveMetadata;
use League\Flysystem\UnableToWriteFile;

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
    public function fileExists(FilesystemAdapter $adapter): bool
    {
        return $adapter->fileExists($this->path);
    }

    /**
     * @throws FilesystemException
     * @throws UnableToCheckExistence
     */
    public function directoryExists(FilesystemAdapter $adapter): bool
    {
        return $adapter->directoryExists($this->path);
    }

    /**
     * @throws UnableToWriteFile
     * @throws FilesystemException
     */
    public function write(FilesystemAdapter $adapter, string $contents, Config $config): void
    {
        $adapter->write($this->path, $contents, $config);
    }

    /**
     * @param resource $contents
     *
     * @throws UnableToWriteFile
     * @throws FilesystemException
     */
    public function writeStream(FilesystemAdapter $adapter, $contents, Config $config): void
    {
        $adapter->writeStream($this->path, $contents, $config);
    }

    /**
     * @throws UnableToReadFile
     * @throws FilesystemException
     */
    public function read(FilesystemAdapter $adapter): string
    {
        return $adapter->read($this->path);
    }

    /**
     * @return resource
     *
     * @throws UnableToReadFile
     * @throws FilesystemException
     */
    public function readStream(FilesystemAdapter $adapter)
    {
        return $adapter->readStream($this->path);
    }

    /**
     * @throws UnableToDeleteFile
     * @throws FilesystemException
     */
    public function delete(FilesystemAdapter $adapter): void
    {
        $adapter->delete($this->path);
    }

    /**
     * @throws InvalidVisibilityProvided
     * @throws FilesystemException
     */
    public function setVisibility(FilesystemAdapter $adapter, string $visibility): void
    {
        $adapter->setVisibility($this->path, $visibility);
    }

    /**
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function visibility(FilesystemAdapter $adapter): FileAttributes
    {
        return $adapter->visibility($this->path);
    }

    /**
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function mimeType(FilesystemAdapter $adapter): FileAttributes
    {
        return $adapter->mimeType($this->path);
    }

    /**
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function lastModified(FilesystemAdapter $adapter): FileAttributes
    {
        return $adapter->lastModified($this->path);
    }

    /**
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function fileSize(FilesystemAdapter $adapter): FileAttributes
    {
        return $adapter->fileSize($this->path);
    }

    /**
     * @throws UnableToMoveFile
     * @throws FilesystemException
     */
    public function move(FilesystemAdapter $adapter, string $destination, Config $config): void
    {
        $adapter->move($this->path, $destination, $config);
    }

    /**
     * @throws UnableToCopyFile
     * @throws FilesystemException
     */
    public function copy(FilesystemAdapter $adapter, string $destination, Config $config): void
    {
        $adapter->copy($this->path, $destination, $config);
    }

    public function getPath(): string
    {
        return $this->path;
    }
}