<?php

require_once("../../config.php");

global $CFG, $PAGE, $OUTPUT;

require_once($CFG->dirroot . "/blocks/you_chose/classes/db_info.php");

$chalice = required_param('chalice', PARAM_INT);
$course_id = required_param("course_id", PARAM_INT);

$PAGE->set_url('/blocks/you_chose/choice.php', array('chalice' => $chalice, 'course_id' => $course_id));
$PAGE->set_pagelayout('standard');

$context = context_course::instance($course_id);
$PAGE->set_context($context);

$dbinfo = new \block_you_chose\block_you_chose_database_info();

$course_name = $dbinfo->get_course_shortname($course_id);
$PAGE->set_title(get_string('you_chose', 'block_you_chose'));

$PAGE->navbar->add($course_name, new moodle_url('/course/view.php',array('id'=>$course_id)));
$PAGE->navbar->add(get_string('pluginname','block_you_chose'));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('you_chose', 'block_you_chose'));

if ($chalice === 3)
{
    echo '<h4>' . get_string('wisely', 'block_you_chose') . '</h4><br />';
    echo '<img src="http://earnthis.net/wp-content/uploads/2013/10/55658.jpg" /><br /><br />';
} else {
    echo '<h4>' . get_string('poorly', 'block_you_chose') . '</h4><br />';
    echo '<img src="http://3.bp.blogspot.com/_cvFfOEje0HM/TJeQnssblLI/AAAAAAAAAPs/KCtQx6ZMlZo/s1600/Grail-wrong.jpg" /><br /><br />';
}

echo '<h3><a href="../../course/view.php?id=' . $course_id . '">Click here to return to the course</a></h3>';

echo $OUTPUT->footer();