<?php
/**
 * Adapter for handling Gravity Forms events
 */

namespace SMPLFY\ClientName;
class GravityFormsAdapter {
	private ContactFormSubmissionUsecase $contactSubmissionUsecase;
	private EventRegistrationSubmissionUsecase $eventSubmissionUsecase;
	private UpdatesFormSubmissionUsecase $updatesSubmissionUsecase;

	public function __construct(
		ContactFormSubmissionUsecase $contactSubmissionUsecase,
		EventRegistrationSubmissionUsecase $eventSubmissionUsecase,
		UpdatesFormSubmissionUsecase $updatesSubmissionUsecase
	) {
		$this->contactSubmissionUsecase = $contactSubmissionUsecase;
		$this->eventSubmissionUsecase = $eventSubmissionUsecase;
		$this->updatesSubmissionUsecase = $updatesSubmissionUsecase;

		$this->register_hooks();
		$this->register_filters();
	}

	/**
	 * Register gravity forms hooks to handle custom logic
	 *
	 * @return void
	 */
	public function register_hooks() {
		add_action(
			'gform_after_submission_' . FormIds::CONTACT_FORM_ID,
			[$this->contactSubmissionUsecase, 'handle_submission'],
			10,
			2
		);
		add_action(
			'gform_after_submission_' . FormIds::EVENT_REGISTRATION_ID,
			[$this->eventSubmissionUsecase, 'handle_submission'],
			10,
			2
		);
		add_action(
			'gform_after_submission_' . FormIds::STOCK_UPDATES_ID,
			[$this->updatesSubmissionUsecase, 'handle_submission'],
			10,
			2
		);
	}

	/**
	 * Register gravity forms filters to handle custom logic
	 *
	 * @return void
	 */
	public function register_filters() {
		// Add custom filters here if needed
	}
}