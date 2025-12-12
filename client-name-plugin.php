<?php
/**
 * Plugin Name: SMPLFY Boiler Plate
 * Version: 1.0.0
 * Description: Starter plugin with custom plugin framework to get started
 * Author: Raphael Shawn Taurai
 * Author URI: https://simplifybiz.com/
 * Requires PHP: 7.4
 * Requires Plugins:  smplfy-core
 *
 * @package Bliksem
 * @author Raphael Shawn Taurai
 * @since 0.0.1
 */

namespace SMPLFY\ClientName ;

prevent_external_script_execution();

define( 'SITE_URL', get_site_url() );
define( 'SMPLFY_NAME_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SMPLFY_NAME_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

//Load files and run function that initialise the whole plugin
require_once SMPLFY_NAME_PLUGIN_DIR . 'admin/utilities/smplfy_require_utilities.php';
require_once SMPLFY_NAME_PLUGIN_DIR . 'includes/smplfy_bootstrap.php';

bootstrap_boilerplate_plugin();

// Load all classes
require_utilities(__DIR__ . '/public/php/types');
require_utilities(__DIR__ . '/public/php/entities');
require_utilities(__DIR__ . '/public/php/repositories');
require_utilities(__DIR__ . '/public/php/usecases');
require_utilities(__DIR__ . '/public/php/adapters');

function prevent_external_script_execution(): void {
	if ( ! function_exists( 'get_option' ) ) {
		header( 'HTTP/1.0 403 Forbidden' );
		die;
	}
}

// Initialize plugin
add_action('plugins_loaded', function() {
	$gravityFormsApi = new \SmplfyCore\SMPLFY_GravityFormsApiWrapper();

	// Repositories
	$contactRepository = new \SMPLFY\ClientName\ContactFormRepository($gravityFormsApi);
	$eventRepository = new \SMPLFY\ClientName\EventRegistrationFormRepository($gravityFormsApi);
	$updatesRepository = new \SMPLFY\ClientName\UpdatesFormRepository($gravityFormsApi);

	// Use Cases
	$contactSubmissionUsecase = new \SMPLFY\ClientName\ContactFormSubmissionUsecase($contactRepository);
	$eventSubmissionUsecase = new \SMPLFY\ClientName\EventRegistrationSubmissionUsecase($eventRepository);
	$updatesSubmissionUsecase = new \SMPLFY\ClientName\UpdatesFormSubmissionUsecase($updatesRepository);

	// Adapter
	$gfAdapter = new \SMPLFY\ClientName\GravityFormsAdapter(
		$contactSubmissionUsecase,
		$eventSubmissionUsecase,
		$updatesSubmissionUsecase
	);

	// Register hooks
	$gfAdapter->register_hooks();
}, 20);