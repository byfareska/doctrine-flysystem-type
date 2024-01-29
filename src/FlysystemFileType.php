<?php declare(strict_types=1);

namespace Byfareska\DoctrineFlysystemType;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

final class FlysystemFileType extends Type
{
    public const NAME = 'flysystem_file';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform)
    {
        return $platform->getStringTypeDeclarationSQL($column);
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): File
    {
        return new File((string)$value);
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if ($value instanceof File) {
            return $value->getPath();
        }

        return null;
    }
}