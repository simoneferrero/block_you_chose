<?php

require_once("../../config.php");

global $CFG, $PAGE, $OUTPUT;

require_once("/classes/db_info.php");

$chalice = required_param('chalice', PARAM_INT);
$course_id = required_param("course_id", PARAM_INT);
$tot = required_param("tot", PARAM_INT);
$rightOne = rand(1, $tot);

$PAGE->set_url('/blocks/you_chose/choice.php', array('chalice' => $chalice, 'course_id' => $course_id, 'tot' => $tot));
$PAGE->set_pagelayout('standard');

$context = context_course::instance($course_id);
$PAGE->set_context($context);

$dbinfo = new \block_you_chose\block_you_chose_database_info();

$course_name = $dbinfo->get_course_shortname($course_id);
$PAGE->set_title(get_string('you_chose', 'block_you_chose'));

$configNum = get_config('block_you_chose');
var_dump($configNum);

$PAGE->navbar->add($course_name, new moodle_url('/course/view.php',array('id'=>$course_id)));
$PAGE->navbar->add(get_string('pluginname','block_you_chose'));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('you_chose', 'block_you_chose'));

if ($chalice === $rightOne)
{
    echo '<h4>' . get_string('wisely', 'block_you_chose') . '</h4><br />';
    echo '<img src="images/wisely.jpg" /><br /><br />';
} else {
    echo '<h4>' . get_string('poorly', 'block_you_chose') . '</h4><br />';
    echo '<img src="images/poorly.jpg" /><br /><br />';
}

echo '<h3><a href="../../course/view.php?id=' . $course_id . '">Click here to return to the course</a></h3>';

echo $OUTPUT->footer();