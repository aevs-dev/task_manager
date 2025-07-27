<?php

namespace App\Http\DTO;

interface DTOInterface
{
    /**
     * Create new instance DTO class from array
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data): self;

    /**
     * Make array in "camel case" from this DTO object
     * @return array
     */
    public function toArray(): array;

    /**
     * Make array in "snake case" from this DTO object
     * @return array
     */
    public function toSnakeCaseArray(): array;

}
