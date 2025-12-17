<?php
namespace SMPLFY\ClientName;

use SmplfyCore\SMPLFY_Log;

class EventRegistrationSubmissionUsecase {
    private EventRegistrationFormRepository $eventRepository;

    public function __construct(EventRegistrationFormRepository $eventRepository) {
        $this->eventRepository = $eventRepository;
    }

    public function handle_submission($entry) {
        $entity = new EventRegistrationFormEntity($entry);

        // Log submission with all vital fields
        SMPLFY_Log::info("Event registration submitted", [
            'email'     => $entity->email,
            'name'      => $entity->nameFirst . ' ' . $entity->nameLast,
            'phone'     => $entity->phone,
            'event'     => $entity->event,
            'attendees' => $entity->attendees,
            'addons'    => $entity->addons,
            'total'     => $entity->total,
            'tnc'       => $entity->tnc
        ]);

        // Add your business logic here
        // - Register for event with all details
        // - Send confirmation email with all info
        // - Notify event organizers with all fields
        // - etc.
    }
}
