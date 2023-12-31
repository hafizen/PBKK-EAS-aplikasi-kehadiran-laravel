<?php

declare(strict_types=1);

namespace App\Core\Models\Pertemuan;

use InvalidArgumentException;

class ModePertemuan
{
    const ONLINE = 'D';
    const OFFLINE = 'L';
    const HYBRID = 'H';

    private string $mode;

    public function __construct(string $mode)
    {
        if ($mode != self::ONLINE &
            $mode != self::OFFLINE &
            $mode != self::HYBRID) {
            throw new InvalidArgumentException('mode_pertemuan_tidak_sesuai');
        }

        $this->mode = $mode;
    }

    public function getMode(): string
    {
        return $this->mode;
    }

    public function equals(ModePertemuan $modePertemuan): bool
    {
        return $this->mode === $modePertemuan->getMode();
    }

    public function isOnline(): bool
    {
        if ($this->mode === self::ONLINE) {
            return true;
        }

        return false;
    }

    public function isOffline(): bool
    {
        if ($this->mode === self::OFFLINE) {
            return true;
        }

        return false;
    }

    public function isHybrid(): bool
    {
        if ($this->mode === self::HYBRID) {
            return true;
        }

        return false;
    }

    public static function online(): ModePertemuan
    {
        return new ModePertemuan(self::ONLINE);
    }

    public static function offline(): ModePertemuan
    {
        return new ModePertemuan(self::OFFLINE);
    }

    public static function hybrid(): ModePertemuan
    {
        return new ModePertemuan(self::HYBRID);
    }

}
