<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * A two column layout for the space theme.
 *
 * @package   theme_space
 * @copyright 2018 - 2019 Marcin Czaja
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');

$extraclasses = [];
$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
$blockshtml2 = $OUTPUT->blocks('sidebar');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$siteurl = $CFG->wwwroot;

//Top bar style
$topbarstyle = theme_space_get_setting('topbarstyle');
$pluginsettings = get_config("theme_space");
if( $topbarstyle == "topbarstyle-1") { $topbarstyle1 = $topbarstyle; } else { $topbarstyle1 = false; }
if( $topbarstyle == "topbarstyle-2") { $topbarstyle2 = $topbarstyle; } else { $topbarstyle2 = false; }
if( $topbarstyle == "topbarstyle-3") { $topbarstyle3 = $topbarstyle; } else { $topbarstyle3 = false; }
if( $topbarstyle == "topbarstyle-4") { $topbarstyle4 = $topbarstyle; } else { $topbarstyle4 = false; }
if( $topbarstyle == "topbarstyle-5") { $topbarstyle5 = $topbarstyle; } else { $topbarstyle5 = false; }
if( $topbarstyle == "topbarstyle-6") { $topbarstyle6 = $topbarstyle; } else { $topbarstyle6 = false; }
//end

$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'sidebarblocks' => $blockshtml2,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'topbarstyle1' => $topbarstyle1,
    'topbarstyle2' => $topbarstyle2,
    'topbarstyle3' => $topbarstyle3,
    'topbarstyle4' => $topbarstyle4,  
    'topbarstyle5' => $topbarstyle5, 
    'topbarstyle6' => $topbarstyle6,
    'siteurl' => $siteurl
];

// Improve space navigation.
theme_space_extend_flat_navigation($PAGE->flatnav);
$templatecontext['flatnavigation'] = $PAGE->flatnav;
$themesettings = new \theme_space\util\theme_settings();

$templatecontext = array_merge($templatecontext, $themesettings->head_elements());
$templatecontext = array_merge($templatecontext, $themesettings->footer_items());
$templatecontext = array_merge($templatecontext, $themesettings->customnav());
$templatecontext = array_merge($templatecontext, $themesettings->sidebar_custom_block());
$templatecontext = array_merge($templatecontext, $themesettings->top_bar_custom_block());

echo $OUTPUT->render_from_template('theme_space/columns2', $templatecontext);
