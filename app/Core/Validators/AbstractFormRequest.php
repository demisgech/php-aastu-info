<?php

declare(strict_types=1);

namespace App\Core\Validators;

abstract class AbstractFormRequest {
    protected array $errors;
    protected array $validData;

    abstract public function rules(): array;

    /**
     * @throws ValidationException
     */

    public function validate(array $data) {
        $validator = new Validator($data, $this->rules());

        if ($validator->validate()) {
            $this->validData = $validator->validData();

        } else {
            $this->errors = $validator->errors();
            throw new ValidationException("Validation failed!!" . static::class, $this->errors);
        }
    }

    public function validData() {
        return $this->validData;
    }

    public function errors(): array {
        return $this->errors;
    }
}