<?php
/**
 * Repository for Updates Form entries.
 */

namespace SMPLFY\ClientName;
use SMPLFY\ClientName\FormIds;

use SmplfyCore\SMPLFY_BaseRepository;
use SmplfyCore\SMPLFY_GravityFormsApiWrapper;
use WP_Error;

/**
 * @method static UpdatesFormEntity|null get_one( $fieldId, $value )
 * @method static UpdatesFormEntity|null get_one_for_current_user()
 * @method static UpdatesFormEntity|null get_one_for_user( $userId )
 * @method static UpdatesFormEntity[] get_all( $fieldId = null, $value = null, string $direction = 'ASC' )
 * @method static int|WP_Error add( UpdatesFormEntity $entity )
 */
class UpdatesFormRepository extends SMPLFY_BaseRepository {
    public function __construct( SMPLFY_GravityFormsApiWrapper $gravityFormsApi ) {
        $this->entityType = UpdatesFormEntity::class;
        $this->formId     = FormIds::STOCK_UPDATES_ID;
        parent::__construct( $gravityFormsApi );
    }
}
