<?php

class block_you_chose_edit_form extends block_edit_form {

    protected function specific_definition($mform)
    {
        $mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        $optionsArray = array();
        $min = 3;
        $max = 10;

        for ($i = $min; $i <= $max; $i++)
        {
            $optionsArray[$i] = $i;
        }

        $mform->addElement('select', 'config_num', get_string('chalices_options', 'block_you_chose'),
            $optionsArray);
        $mform->setType('config_num', PARAM_INT);
        $mform->setDefault('config_num', $min);

    }
}