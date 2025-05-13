<?php

declare(strict_types=1);

namespace App\Core\Validators;


class Validator {
    private array $data;
    private array $rules;
    private array $sanitizedData = [];
    private array $errors = [];

    public function __construct(array $data, array $rules) {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function validate(): bool {
        foreach ($this->rules as $field => $ruleString) {
            $value = $this->data[$field] ?? null;

            // Extract sanitizers and validators from the given string as array of the following
            [$sanitizers, $validators] = $this->extractSanitizeAndValidateRules($ruleString);

            // Apply sanitization
            foreach ($sanitizers as $sanitizer)
                $value = $this->sanitize($value, $sanitizer);
            // store sanitizedData value
            $this->sanitizedData[$field] = $value;

            // Apply validation
            foreach ($validators as $rule)
                $this->applyRule($field, $value, $rule);

        }
        return empty($this->errors);
    }

    public function extractSanitizeAndValidateRules(string $ruleString): array {
        $rules = explode("|", $ruleString);
        $sanitizers = [];
        $validators = [];

        foreach ($rules as $rule) {
            if (str_starts_with($rule, "sanitize:")) {
                $sanitizers = array_merge(
                    $sanitizers,
                    explode(",", substr($rule, strlen("sanitize:")))
                ); //  strlen("sanitize:") = 9
            } else {
                $validators[] = $rule;
            }
        }

        return [$sanitizers, $validators];
    }

    private function sanitize($value, string $sanitizer) {
        if (!is_string($value))
            return $value;
        return match ($sanitizer) {
            "trim" => trim($value),
            "strip" => strip_tags($value),
            "email" => filter_var($value, FILTER_SANITIZE_EMAIL),
            "int" => filter_var($value, FILTER_SANITIZE_NUMBER_INT),
            "float" => filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT),
            "url" => filter_var($value, FILTER_SANITIZE_URL),
            "escape" => htmlspecialchars($value, ENT_QUOTES, "UTF-8"),
            "upper" => strtoupper($value),
            "lower" => strtolower($value),
            default => $value,
        };
    }

    private function applyRule($field, $value, string $rule): void {
        if ($rule === "required" && ($value == '' || $value == null))
            $this->errors[$field][] = "{$field} is required";

        if ($rule === "email" && !filter_var($value, FILTER_VALIDATE_EMAIL))
            $this->errors[$field][] = "{$field} must be valid email";

        if (str_starts_with($rule, "min:")) {
            $min = (int) explode(":", $rule)[1];
            if (strlen($value) < $min)
                $this->errors[$field][] = "{$field} must be at least {$min} characters";
        }

        if (str_starts_with($rule, "max:")) {
            $max = (int) explode(":", $rule)[1];
            if (strlen($value) > $max)
                $this->errors[$field][] = "{$field} must be at most {$max} characters";

        }

        if ($rule === "url" && !filter_var($value, FILTER_VALIDATE_URL))
            $this->errors[$field][] = "{$field} must be valid url";
    }

    public function errors(): array {
        return $this->errors;
    }

    public function validData(): array {
        return $this->sanitizedData;
    }
}


// example to test the above rule

// $data = [
//     "email" => "demis@domain.com",
//     "password" => "  MyPassword!",
//     "profile_url" => "https://codewithdemis.com/profile"
// ];

// $rules = [
//     "email" => "sanitize:trim,strip,email|required|email",
//     "password" => "sanitize:trim,strip,required|min:8|max|20",
//     "profile_url" => "sanitize:trim,strip,escape,url|url"
// ];

// $validator = new Validator($data, $rules);

// if ($validator->validate()) {
//     $validData = $validator->validData();
//     echo json_encode($validData, JSON_PRETTY_PRINT);
// } else {
//     $errors = $validator->errors();
//     echo json_encode($errors, JSON_PRETTY_PRINT);
// }