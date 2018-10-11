<?php

declare(strict_types=1);

namespace LauLamanApps\eCurring\Resource\Curser;

use LauLamanApps\eCurring\Resource\Exception\NonExistentPageNumberException;

final class Page
{
    /**
     * @var int
     */
    private $size;

    /**
     * @var int
     */
    private $number;

    /**
     * @throws NonExistentPageNumberException
     */
    public function __construct(int $size, ?int $number = 1)
    {
        if ($number < 1) {
            throw new NonExistentPageNumberException('Page number can not be lower than 1');
        }

        $this->size = $size;
        $this->number = $number;
    }

    public function getSize(): int
    {
        return $this->size;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    public function getQueryOptions(): array
    {
        return [
            'page' => [
                'number' => $this->number,
                'size' => $this->size,
            ]
        ];
    }
}
