<?php
/**
 * Repository for Event Registration Form entries.
 */

namespace SMPLFY\ClientName;
use SMPLFY\ClientName\FormIds;

use SmplfyCore\SMPLFY_BaseRepository;
use SmplfyCore\SMPLFY_GravityFormsApiWrapper;
use WP_Error;

/**
 * @method static EventRegistrationFormEntity|null get_one( $fieldId, $value )
 * @method static EventRegistrationFormEntity|null get_one_for_current_user()
 * @method static EventRegistrationFormEntity|null get_one_for_user( $userId )
 * @method static EventRegistrationFormEntity[] get_all( $fieldId = null, $value = null, string $direction = 'ASC' )
 * @method static int|WP_Error add( EventRegistrationFormEntity $entity )
 */
class EventRegistrationFormRepository extends SMPLFY_BaseRepository {
    public function __construct( SMPLFY_GravityFormsApiWrapper $gravityFormsApi ) {
        $this->entityType = EventRegistrationFormEntity::class;
        $this->formId     = FormIds::EVENT_REGISTRATION_ID;
        parent::__construct( $gravityFormsApi );
    }
}
