<?php

class block_you_chose_edit_form extends block_edit_form {

    protected function specific_definition($mform)
    {
        require_once("/classes/helper_functions.php");
        $helperFunctions = new \block_you_chose\block_you_chose_helper_functions();
        $numberOfChoices = $helperFunctions->getArray();

        $mform->addElement('select', 'config_num', get_string('chalices_options', 'block_you_chose'), $numberOfChoices["optionsArray"]);
        $mform->setType('config_num', PARAM_INT);
        $mform->setDefault('config_num', $numberOfChoices["min"]);
    }
}