<?php

namespace App\Validation;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class CorrectFormat extends Constraint
{

    public $message = 'The link "{{ link }}" does not contain an audio or video file';

}