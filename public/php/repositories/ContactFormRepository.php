<?php
/**
 * Repository for Contact Form entries.
 */

namespace SMPLFY\ClientName;
use SMPLFY\ClientName\FormIds;

use SmplfyCore\SMPLFY_BaseRepository;
use SmplfyCore\SMPLFY_GravityFormsApiWrapper;
use WP_Error;

/**
 * @method static ContactFormEntity|null get_one( $fieldId, $value )
 * @method static ContactFormEntity|null get_one_for_current_user()
 * @method static ContactFormEntity|null get_one_for_user( $userId )
 * @method static ContactFormEntity[] get_all( $fieldId = null, $value = null, string $direction = 'ASC' )
 * @method static int|WP_Error add( ContactFormEntity $entity )
 */
class ContactFormRepository extends SMPLFY_BaseRepository {
    public function __construct( SMPLFY_GravityFormsApiWrapper $gravityFormsApi ) {
        $this->entityType = ContactFormEntity::class;
        $this->formId     = FormIds::CONTACT_FORM_ID;
        parent::__construct( $gravityFormsApi );
    }
}
