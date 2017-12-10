<?php

namespace App\Validation;

use GuzzleHttp\Client;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CorrectFormatValidator extends ConstraintValidator
{
    /**
     * Checks if the passed value is valid.
     *
     * @param mixed $value The value that should be validated
     * @param Constraint $constraint The constraint for the validation
     */
    public function validate($value, Constraint $constraint)
    {
        $client = new Client();
        $response = $client->request('GET', $value);

        if ($response->getStatusCode() !== 200) {
            $this->context->buildViolation("There is a problem with this link :(")
                ->addViolation();
        }

        $contentType = $response->getHeaderLine('content-type');

        if ( $contentType !== 'audio/mpeg' && $contentType !== 'video/mp4') {
            $this->context->buildViolation("Unsupported video or audio file :(")
                ->addViolation();
        }
    }
}
