<?php
namespace SMPLFY\ClientName;

use SmplfyCore\SMPLFY_Log;

class ContactFormSubmissionUsecase {
    private ContactFormRepository $contactRepository;

    public function __construct(ContactFormRepository $contactRepository) {
        $this->contactRepository = $contactRepository;
    }

    public function handle_submission($entry) {
        $entity = new ContactFormEntity($entry);

        // Debug output
        error_log("Email: " . $entity->email);
        error_log("Name: " . $entity->nameFirst . " " . $entity->nameLast);
        error_log("Full entry: " . print_r($entity->to_array(), true));

        // Log submission with all vital fields
        SMPLFY_Log::info("Contact form submitted", [
            'email'   => $entity->email,
            'name'    => $entity->nameFirst . ' ' . $entity->nameLast,
            'phone'   => $entity->phone,
            'comment' => $entity->comment
        ]);

        // Add your business logic here
        // - Send to CRM with all fields
        // - Send email notification with all details
        // - Update other records as needed
        // - etc.
    }
}
