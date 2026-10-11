<?php

namespace App\Support;

/**
 * Decides whether a cover image is a REAL cover.
 * Not real = empty path, file missing on disk, or the SOUND logo / default placeholder
 * (detected by file name AND by file content, so a renamed copy of the logo is caught too).
 */
class CoverImage
{
    private const PLACEHOLDER_NAMES = ['weblogo.png', 'logo.png', 'play-default.png', 'play.png', 'pause.png'];

    private static ?array $placeholderHashes = null;

    private static function placeholderHashes(): array
    {
        if (self::$placeholderHashes === null) {
            self::$placeholderHashes = [];
            foreach (self::PLACEHOLDER_NAMES as $name) {
                $file = public_path('users/img/' . $name);
                if (is_file($file)) {
                    self::$placeholderHashes[] = md5_file($file);
                }
            }
        }

        return self::$placeholderHashes;
    }

    /** $absolutePath = full path of the image file on disk; $storedPath = value saved in the database. */
    public static function isReal(?string $storedPath, ?string $absolutePath): bool
    {
        $storedPath = trim((string) $storedPath);
        if ($storedPath === '' || $absolutePath === null) {
            return false;
        }
        if (in_array(strtolower(basename($storedPath)), self::PLACEHOLDER_NAMES, true)) {
            return false;
        }
        if (! is_file($absolutePath) || filesize($absolutePath) < 500) {
            return false;
        }

        return ! in_array(md5_file($absolutePath), self::placeholderHashes(), true);
    }

    /** Cover stored in public/users/img (songs table). */
    public static function isRealSongCover(?string $image): bool
    {
        return self::isReal($image, $image ? public_path('users/img/' . ltrim($image, '/')) : null);
    }

    /** Cover uploaded through the admin panel (public/storage). */
    public static function isRealUpload(?string $thumbnailPath): bool
    {
        return self::isReal($thumbnailPath, $thumbnailPath ? public_path('storage/' . ltrim($thumbnailPath, '/')) : null);
    }
}
