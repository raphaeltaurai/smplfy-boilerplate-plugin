<?php

namespace SMPLFY\ClientName;
use SMPLFY\ClientName\FormIds;

use SmplfyCore\SMPLFY_BaseEntity;

/**
 *
 * @property $nameFirst
 * @property $nameLast
 * @property $email
 * @property $phone
 * @property $event
 * @property $attendees
 * @property $addons
 * @property $total
 * @property $tnc
 */

class EventRegistrationFormEntity extends SMPLFY_BaseEntity
{
    public function __construct( $formEntry = array() ) {
        parent::__construct( $formEntry );
        $this->formId = FormIds::EVENT_REGISTRATION_ID;
    }

    protected function get_property_map(): array {
        return array(
            'nameFirst' => '1.3',
            'nameLast'  => '1.6',
            'email'     => '2',
            'phone'     => '3',
            'event'   => '38',
            'attendees' => '36',
            'addons' => '39',
            'total' => '31',
            'tnc' => '34'
        );
    }
}